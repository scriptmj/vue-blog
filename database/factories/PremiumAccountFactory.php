<?php

namespace Database\Factories;

use App\Models\PremiumAccount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class PremiumAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PremiumAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'premium_expiration_date' => Carbon::now()->addMonthNoOverflow(),
            'ccname' => $this->faker->name,
            'ccnumber' => $this->faker->creditCardNumber,
            'ccexpdate' => $this->faker->creditCardExpirationDateString,
            'cccvv' => '737',
        ];
    }
}