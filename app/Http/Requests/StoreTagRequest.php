<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTagRequest extends FormRequest
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
            'name' => 'required|string|min:2|unique:tags,name',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'A name for the tag is required.',
            'name.min' => 'The name of the tag needs to be at least 2 characters long.',
            'name.string' => 'The tag needs to be a string.',
            'name.unique' => 'This tag already exists',
        ];
    }
}
