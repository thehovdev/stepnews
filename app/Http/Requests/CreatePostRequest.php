<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
        $rules;
        foreach (config('app.locales') as $local) {
            $rules['category'] = 'required';
            $rules[$local . '.title'] = 'required|string';
            $rules[$local . '.content'] = 'required|string';
        }
        return $rules;
    }
    public function messages(){
        return [
            'title.required' => 'A title is required to system',
            'content.required' => 'A content is requires to system',
        ];
    }
}
