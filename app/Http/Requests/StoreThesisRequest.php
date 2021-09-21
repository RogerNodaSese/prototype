<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThesisRequest extends FormRequest
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
            'lastname' => 'required|min:3|max:30|regex:/^[a-zA-Z\s]*$/',
            'firstname' => 'required|min:3|max:30|regex:/^[a-zA-Z\s]*$/',
            'title' => 'required|min:10|max:255',
            'publisher' => 'required|min:3|max:30',
            'subject' => 'required',
            'keywords' => 'required',
            'abstract' => 'required|min:30|max:4000',
            'thesis' => 'required|file|mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'thesis.required' => 'File is required.',
            'thesis.mimes' => 'File type must be pdf.',
            'firstname.regex' => 'Name must not contain numbers and symbols',
            'lastname.regex' => 'Name must not contain numbers and symbols'
        ];
    }
}
