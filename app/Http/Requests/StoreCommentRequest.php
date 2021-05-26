<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => 'required|exists:posts,id|numeric',
            'body' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'body.required' => 'You didn\'t write anything',
            'post_id.exists' => 'This post doesn\'t exist',
        ];
    }
}
