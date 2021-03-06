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
    /**
     * Method Using AJAX for Forms, Displaying Alternates in tag Detail.
     *
     * @param int $idQuestion
     * @return JSON
     */
    public function alternatives($idQuestion)
    {
        return response()->json(Alternative::all()->where('question_id', $idQuestion));
    }

    /**
     * Using AJAX for to get informations about Level Challenges.
     *
     * @param int $idLevelChallenge
     * @return JSON
     */
    public function levelChallenge($idLevelChallenge)
    {
        return response()->json(
            LevelChallenge::where('id', $idLevelChallenge)
                ->with(['levels', 'experiences', 'opportunities', 'times'])->get()
        );
    }

    /**
     * Takes to Challenge Manager page.
     *
     * @return view /admin/challenges
     */
    public function index()
    {
        $categories = Category::all();
        $questions = Question::with(['levels', 'categories', 'users'])->get();
        $challenges = Challenge::with(['users', 'level_challenges'])->get();
        $levelChallenges = LevelChallenge::with(['levels', 'experiences', 'opportunities', 'times'])->get();

        return view('admin\challenges')
            ->with([
                'categories' => $categories,
                'questions' => $questions,
                'challenges' => $challenges,
                'levelChallenges' => $levelChallenges,
            ]);
    }

    /**
     * Create a new Challenge.
     *
     * @param array $request
     * @return view /admin/challenges
     */
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

        $level = LevelChallenge::find($request->input('level_challenge_id'));
        $request->session()
            ->flash('status', $level->levels[0]->name . ' challenge successfully registered!');

        return redirect()
            ->action('Admin\ChallengeController@index');
    }


    /**
     * Update the Challenge.
     *
     * @param array $request
     * @return view /admin/challenges
     */
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
