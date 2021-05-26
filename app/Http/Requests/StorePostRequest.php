<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|min:2',
            'description' => 'required|string|min:3',
            'body' => 'required|string|min:3',
            'premium' => 'boolean',
            'tags' => 'required|array',

            //TODO Images
        ];
    }

    public function messages() {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'Your title is too short',
            'description.required' => 'A description is required',
            'description.min' => 'Your description is too short',
            'body.required' => 'A body is required',
            'body.min' => 'Your body is too short',
            'tags.required' => 'You need at least one category',
        ];
    }
}
