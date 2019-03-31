<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
    public function rules()
    {
        return [
            'question' => 'required|unique:questions,content|min:1|max:1000',

            'alternative_1' => 'required|different:alternative_2|different:alternative_3|different:alternative_4|different:alternative_5|min:1|max:255',

            'alternative_2' => 'required|different:alternative_3|different:alternative_4|different:alternative_5|min:1|max:255',

            'alternative_3' => 'required|different:alternative_4|different:alternative_5|min:1|max:255',

            'alternative_4' => 'required|different:alternative_5|min:1|max:255',

            'alternative_5' => 'required|min:1|max:255'
        ];
    }

    public function messages()
    {
        // Exemple bellow
        return [
            // 'required' => 'O campo :attribute não pode ficar vazio!',
            // 'min' => 'O campo :attribute não pode ser menor que 1!',
            // 'nome.max' => 'O campo :attribute não pode ser maior que 100!',
            // 'descricao.max' => 'O campo :attribute não pode ser maior que 250!'
        ];
    }
}
