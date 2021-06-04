<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumAccount;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePremiumRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\PremiumAccountResource;
use Carbon\Carbon;

class PremiumAccountController extends Controller
{
    public function storePremium(StorePremiumRequest $request){
        $premium = PremiumAccount::create($request->all() + ['premium_expiration_date' => Carbon::now()->addMonthNoOverflow()]);
        $user = Auth::user();
        $user->premium_id = $premium->id;
        $user->update();
    }

    public function getPremium(){
        return new PremiumAccountResource(Auth::user()->premiumAccount);
    }

    public function cancelPremium(){
        $user = Auth::user();
        $user->premiumAccount->active = false;
        $user->premiumAccount->update();
    }
}
