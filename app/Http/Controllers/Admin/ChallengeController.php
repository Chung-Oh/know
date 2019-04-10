<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Challenge;
use App\Alternative;
use App\LevelChallenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChallengeController extends Controller
{
    public function index()
    {
    	$questions = Question::with(['levels', 'categories', 'users'])->get();
    	$challenges = Challenge::with(['users', 'level_challenges'])->get();
    	$alternatives = Alternative::with(['questions'])->get();
    	$levelChallenges = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();

    	// echo '<pre>';
    	// print_r($levelChallenges);
    	// die();

    	return view('admin\challenge')
    		->with([
    			'questions' => $questions,
    			'challenges' => $challenges,
    			'alternatives' => $alternatives,
    			'levelChallenges' => $levelChallenges,
    		]);
    }
}
