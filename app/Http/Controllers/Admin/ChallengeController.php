<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
        $categories = Category::all();
    	$alternatives = Alternative::with(['questions'])->get();
        $questions = Question::with(['levels', 'categories', 'users'])->get();
        $challenges = Challenge::with(['users', 'level_challenges'])->get();
        $levelChallenges = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();

    	return view('admin\challenge')
    		->with([
                'categories' => $categories,
    			'alternatives' => $alternatives,
                'questions' => $questions,
                'challenges' => $challenges,
    			'levelChallenges' => $levelChallenges,
    		]);
    }

    public function create(Request $request)
    {
        echo 'Challenge successfully registered!';
    }
}
