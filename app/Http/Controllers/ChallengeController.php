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

    public function accept(Request $request)
    {
        $users = User::all();
        $challenge = Challenge::find($request->input('challenge_id'));
        $levelChallenge = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();
        $questions = Question::all()->where('challenge_id', $request->input('challenge_id'));
        $alternatives = Alternative::all();

        // dd($request->all());
        // dd($challenge->level_challenge_id);
        // dd($levelChallenge->where('id', $challenge->level_challenge_id)[$challenge->level_challenge_id]);

    	return view('app.challenges-accept')
            ->with([
                'users' => $users,
                'challenge' => $challenge,
                'levelChallenge' => $levelChallenge,
                'questions' => $questions,
                'alternatives' => $alternatives
            ]);
    }

    public function finish(Request $request)
    {
        dd($request->all());
    }
}
