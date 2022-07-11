<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=> 'required|min:3|max:255',
            'description'=> 'required|min:5|max:255',
            'content'=> 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo del titolo é obbligatorio',
            'title.min' => 'Il campo del titolo deve avere almeno :min caratteri',
            'title.max' => 'Il campo del titolo deve essere lungo massimo :max caratteri',
            'description.required' => 'Il campo della descrizione é obbligatorio',
            'description.min' => 'Il campo della descrizione deve avere almeno :min caratteri',
            'description.max' => 'Il campo della descrizione deve essere lungo massimo :max caratteri',
            'content.required' => 'Il contenuto é obbligatorio',
            'content.min' => 'Il contenuto deve avere almeno :min caratteri'
        ];
    }
}
