<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->word).' '.$this->faker->word.' '.$this->faker->word,
            'description' => $this->faker->sentence,
            'body' => $this->faker->text.' '.$this->faker->text.' '.$this->faker->text.'<br /><br />'
                .$this->faker->text.' '.$this->faker->text.' '.$this->faker->text.'<br /><br />'
                .$this->faker->text.' '.$this->faker->text.' '.$this->faker->text,
            //'user_id' => rand(1, User::count()),
        ];
    }
}
