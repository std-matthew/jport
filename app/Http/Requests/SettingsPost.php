<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsPost extends FormRequest
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
            'og_title' => 'required',
            'og_description' => 'required',
            'og_image' => 'image|nullable',
            'favicon' => 'image|dimensions:ratio=1/1|nullable',
        ];
    }

    public function messages()
    {
        return [
            'favicon.dimensions' => 'Image size ratio must by 1x1',
        ];
    }
}
