<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:120|min:2',
            'client_name' => 'required|max:90|min:2',
            'summary' => 'max:255|min:2',
            //'cover_image' => 'max:255|min:1'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il Nome è un campo obbligatorio',
            'name.max' => 'Il Nome può avere massimo :max caratteri',
            'name.min' => 'Il Nome deve avere minimo :min carattere',

            'client_name.required' => 'Il nome del cliente è un campo obbligatorio',
            'client_name.max' => 'Il nome del cliente può avere massimo :max caratteri',
            'client_name.min' => 'Il Nome deve avere minimo :min carattere',

            'summary.max' => 'La descrizione può avere massimo :max caratteri',
            'summary.min' => 'La descrizione deve avere minimo :min carattere',

            //'cover_image.max' => 'Il link può avere massimo :max caratteri',
            //'cover_image.min' => 'il link deve avere minimo :min carattere',
        ];
    }
}
