<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePremiumRequest extends FormRequest
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
            'ccname' => 'required|string',
            'ccnumber' => 'required|string',
            'ccexpdate' => 'required|string|size:5',
            'cccvv' => 'required|string|size:3'
        ];
    }

    public function messages() {
        return [
            'ccname.required' => 'You need to enter the name as written on your credit card.',
            'ccnumber.required' => 'You need to enter the credit card number as written on your credit card.',
            'ccexpdate.required' => 'You need to enter the expiration date as written on your credit card.',
            'ccexpdate.size' => 'The expiration date you entered is invalid.',
            'cccvv.required' => 'You need to enter the CVV code as written on the back of your credit card.',
            'cccvv.size' => 'The CVV code you entered is an invalid format.',
        ];
    }
}
