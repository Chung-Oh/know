<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Category;
use App\Question;
use App\Alternative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        $categories = Category::all()->sortBy('name');
        $questions = Question::with(['levels', 'categories', 'users'])->get();
        $alternatives = Alternative::with('questions')->get();

        return view('admin\question')
            ->with([
                'levels' => $levels,
                'categories' => $categories,
                'questions' => $questions,
                'alternatives' => $alternatives
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(QuestionRequest $request)
    {
        $validated = $request->validated();
        $question = new Question;
        $question->content = $request->input('question');
        $question->category_id = $request->input('category_id');
        $question->level_id = $request->input('level_id');
        $question->user_id = $request->input('user_id');
        $question->save();

        for ($alt = 1; $alt <= 5; $alt++) {

            $alternative = new Alternative;

            if ($alt == $request->input('radioAlternativeCorrect')) {
                $alternative->content = $request->input('alternative_' . $alt);
                $alternative->type = true;
                $question = Question::orderBy('created_at', 'desc')->first();
                $alternative->question_id = $question->id;
                $alternative->save();
            } else {
                $alternative->content = $request->input('alternative_' . $alt);
                $question = Question::orderBy('created_at', 'desc')->first();
                $alternative->question_id = $question->id;
                $alternative->save();
            }
        }

        $request->session()->flash('status', 'Question successfully registered!');

        return redirect()
            ->action('Admin\QuestionController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
