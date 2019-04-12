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
    	$alternatives = Alternative::with(['questions'])->get();
        $questions = Question::with(['levels', 'categories', 'users'])->get();
        $levelChallenges = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();
        $challenges = Challenge::with(['users', 'level_challenges'])->get();

    	// echo '<pre>';
    	// // print_r($levelChallenges[0]->levels[0]->name);
     //    foreach ($levelChallenges as $l) :
     //        print_r($l->levels[0]->name);
     //    endforeach;
    	// die();

    	return view('admin\challenge')
    		->with([
    			'questions' => $questions,
    			'challenges' => $challenges,
    			'alternatives' => $alternatives,
    			'levelChallenges' => $levelChallenges,
    		]);
    }

    public function create(Request $request)
    {
        echo 'Challenge successfully registered!';
    }
}
