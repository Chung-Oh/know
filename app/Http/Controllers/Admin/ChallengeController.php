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
    // Method Using AJAX for Forms, Displaying Alternates in tag Detail
    public function alternatives($idQuestion)
    {
        return response()->json(Alternative::all()->where('question_id', $idQuestion));
    }

    // Using AJAX for to get informations about Level Challenges
    public function levelChallenge($idLevelChallenge)
    {
        return response()->json(
            LevelChallenge::where('id', $idLevelChallenge)
                ->with(['levels', 'experiences', 'opportunities', 'times'])->get()
        );
    }

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
            ->action('Admin\ChallengeController@index');
    }

    public function update(ChallengeRequest $request)
    {
        $challenge = Challenge::find($request->input('id_challenge'));
        $allQuestions = Question::all();
        $filteredQuestions = $allQuestions->where('challenge_id', $challenge->id);

        // Removing challenge id and putting it as null in the questions that pertained to that challenge
        foreach ($filteredQuestions as $q) {
            $q->challenge_id = null;
            $q->save();
        }

        // Adding challenge id in selected questions
        for ($i = 1; $i <= 10; $i++) {
            $question = Question::find($request->input('question_' . $i));
            $question->challenge_id = $challenge->id;
            $question->save();
        }

        $request->session()
            ->flash('status', 'Challenge with ID ' . $challenge->id . ' successfully updated!');

        return redirect()
            ->action('Admin\ChallengeController@index');
    }
}
