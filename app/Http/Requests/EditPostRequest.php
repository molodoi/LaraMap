<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
        $id = $this->post ? ',' . $this->post->id : '';
        return [
            'title' => 'bail|required|max:255',
            'content' => 'bail|required|max:65000',
            'slug' => 'bail|required|max:255|unique:posts,slug' . $id,
        ];
    }
}
