<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    $answers = $faker->paragraph; 
    $right_answer = $faker->randomElement(explode(' ', $answers));
    
    return [
        'title' => $faker->paragraph,
        'answers' => $answers,
        'right_answer' => $right_answer,
        'score' => $faker->randomElement([1,5,10,15,20]),
        'quiz_id' => Quiz::all()->random()->id,
    ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
