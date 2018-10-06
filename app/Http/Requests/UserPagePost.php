<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPagePost extends FormRequest
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
            'tab_label' => 'required|sometimes',
            'header' => 'required|sometimes',
            'content' => 'required|sometimes',
            'image_path' => 'image|nullable',
        ];
    }
}
