<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Alternative;
use App\Question;
use App\Challenge;
use App\LevelChallenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChallengeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $questions = Question::with(['levels', 'categories', 'users'])->get();
        $challenges = Challenge::with(['users', 'level_challenges'])->get();
        $levelChallenges = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();

    	return view('admin\challenge')
    		->with([
                'categories' => $categories,
                'questions' => $questions,
                'challenges' => $challenges,
    			'levelChallenges' => $levelChallenges,
    		]);
    }

    public function create(Request $request)
    {
        echo '<pre>';
        dd($request->all());
    }
    // Method for Ajax
    public function alternatives($idQuestion)
    {
        return response()->json(Alternative::all()->where('question_id', $idQuestion));
    }
}
