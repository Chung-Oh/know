<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ChallengeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'level_challenge_id' => 'required|numeric',
            'question_1' => 'required|numeric|different:question_2',
            'question_2' => 'required|numeric',
            'question_3' => 'required|numeric|different:question_4',
            'question_4' => 'required|numeric',
            'question_5' => 'required|numeric|different:question_6',
            'question_6' => 'required|numeric',
            'question_7' => 'required|numeric|different:question_8',
            'question_8' => 'required|numeric',
            'question_9' => 'required|numeric|different:question_10',
            'question_10' => 'required|numeric'
        ];
    }
}
