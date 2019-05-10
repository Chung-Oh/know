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
        $challenge = $request->input('challenge_id');
        $levelChallenge = LevelChallenge::find($request->input('challenge_id'))
            ->with(['levels', 'experiences', 'opportunities', 'times'])->get();
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
}
