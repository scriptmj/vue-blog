<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //TODO
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id|numeric',
            'post_id' => 'required|exists:posts,id|numeric',
            'body' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'body.required' => 'You didn\'t write anything',
            'user_id.exists' => 'This user doesn\'t exist',
            'post_id.exists' => 'This post doesn\'t exist',
        ];
    }
}
