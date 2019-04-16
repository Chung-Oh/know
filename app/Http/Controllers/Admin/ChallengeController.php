<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Alternative;
use App\Question;
use App\Challenge;
use App\LevelChallenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChallengeRequest;

class ChallengeController extends Controller
{
    // Method using AJAX in Detail on Form
    public function alternatives($idQuestion)
    {
        return response()->json(Alternative::all()->where('question_id', $idQuestion));
    }

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

    public function create(ChallengeRequest $request)
    {
        $challenge = new Challenge;
        $challenge->user_id = $request->input('user_id');
        $challenge->level_challenge_id = $request->input('level_challenge_id');
        $challenge->save();

        // Getting challenge id to insert on question
        $challengeCurrent = Challenge::orderBy('id', 'desc')->first();

        for ($q = 1; $q <= 10; $q++) {
            $question = Question::find($request->input('question_' . $q));
            $question->challenge_id = $challengeCurrent->id;
            $question->save();
        }

        $request->session()
            ->flash('status', 'Challenge successfully registered!');

        return redirect()
            ->action('Admin\QuestionController@index');
    }
}
