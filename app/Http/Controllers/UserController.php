<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumAccount;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePremiumRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function storePremium(StorePremiumRequest $request){
        $premium = PremiumAccount::create($request->all());
        $user = Auth::user();
        $user->premium_id = $premium->id;
        $user->update();
    }

    public function getPremium(){
        return Auth::user()->premiumAccount;
    }
}
