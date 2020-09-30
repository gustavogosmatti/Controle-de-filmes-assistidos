<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalhesFormRequest extends FormRequest
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
            'quem_indicou' => 'required | min:2',
            'data'=> 'required',
            'avaliacao' => 'required',
            'comentario' => 'required'
        ];
    }
    public function messages(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'quem_indicou.min'=> 'O campo "Quem indicou" precisa ter pelo menos dois caracteres!'
        ];
    }
}
