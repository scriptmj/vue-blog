<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumAccount extends Model
{
    use HasFactory;

    protected $fillable = ['premium_expiration_date', 'ccname', 'ccnumber', 'ccexpdatemm', 'ccexpdateyy', 'cccvv'];
}