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

    public function create(QuestionRequest $request)
    {
        $question = new Question;
        $question->content = $request->input('question');
        $question->type = $request->input('type');
        $question->category_id = $request->input('category_id');
        $question->level_id = $request->input('level_id');
        $question->user_id = $request->input('user_id');
        $question->save();

        // Loop to know what alternative is correct
        for ($alt = 1; $alt <= 5; $alt++) {

            $alternative = new Alternative;
            // Function Eloquent orderBy to get last database row
            if ($alt == $request->input('radioAlternativeCorrect')) {
                $alternative->content = $request->input('alternative_' . $alt);
                $alternative->type = true;
                $question = Question::orderBy('id', 'desc')->first();
                $alternative->question_id = $question->id;
                $alternative->save();
            } else {
                $alternative->content = $request->input('alternative_' . $alt);
                $question = Question::orderBy('id', 'desc')->first();
                $alternative->question_id = $question->id;
                $alternative->save();
            }
        }

        $category = Category::find($request->input('category_id'));

        $request->session()
            ->flash('status', $category->name . " question successfully registered!");

        return redirect()
            ->action('Admin\QuestionController@index');
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $question = Question::find($request->id_question);
        $question->content = $request->question;
        $question->category_id = empty($request->category_id) ? $question->category_id : $request->category_id;
        $question->level_id = empty($request->level_id) ? $question->level_id : $request->level_id;
        $question->save();

        // Here it takes Array of the Alternatives of the question to go and treat
        $alternatives = Alternative::where('question_id', $request->id_question)->get();
        $running = 1; // This variable is used to cover each alternative
        foreach ($alternatives as $alt) :

            $alternative = Alternative::find($alt->id);

            if ($running == $request->input('radioAlternativeCorrect')) {
                $alternative->content = $request->input('alternative_' . $running);
                $alternative->type = true;
                $alternative->save();
            } else {
                $alternative->content = $request->input('alternative_' . $running);
                $alternative->type = false;
                $alternative->save();
            }

            $running++;
        endforeach;

        $request->session()
            ->flash('status', "Question with ID <span class='font-weight-bold'>$request->id_question</span> successfully updated!");

        return redirect()
            ->action('Admin\QuestionController@index');
    }

    public function destroy(Request $request, Question $question)
    {
        // $question = Question::find($request->input('id_question'));
        // For soft delete use delete() or destroy(). For delete permanently use forceDelete()
        $question->destroy($request->input('id_question'));

        $request->session()
            ->flash('status', "Question with ID <span class='font-weight-bold'>$request->id_question</span> was successfully removed!");

        return redirect()
            ->action('Admin\QuestionController@index');
    }
}
