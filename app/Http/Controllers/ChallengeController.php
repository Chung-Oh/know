<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use App\Result;
use App\Question;
use App\Challenge;
use App\Alternative;
use App\LevelChallenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Takes to Application Challenge page.
     *
     * @return view /app/challenges
     */
    public function index()
    {
    	$levels = Level::all();
        $results = Result::all();
    	$challenges = Challenge::with(['level_challenges'])->get();
    	$levelChallenge = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();

    	return view('app.challenges')
    		->with([
    			'levels' => $levels,
                'results' => $results,
    			'challenges' => $challenges,
    			'levelChallenge' => $levelChallenge
    		]);
    }

    /**
     * User accepted Challenge.
     *
     * @param array $request
     * @return view /app/challenges-accept
     */
    public function accept(Request $request)
    {
        $users = User::all();
        $challenge = Challenge::find($request->input('challenge_id'));
        $levelChallenge = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();
        $questions = Question::all()->where('challenge_id', $request->input('challenge_id'));
        $alternatives = Alternative::all();

    	return view('app.challenges-accept')
            ->with([
                'users' => $users,
                'challenge' => $challenge,
                'levelChallenge' => $levelChallenge,
                'questions' => $questions,
                'alternatives' => $alternatives
            ]);
    }

    /**
     * When the Challenge is completed.
     *
     * @param array $request
     * @return view /app/challenges
     */
    public function finish(Request $request)
    {
        dd($request->all());
    }
}
