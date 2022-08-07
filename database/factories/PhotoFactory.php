<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Course;
use App\Models\Photo;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PhotoFactory extends Factory
{
 
    public function definition()
    {

        $userid=User::all()->random()->id;
        $courseid=Course::all()->random()->id;
        $photoable_id = $faker -> randomElement([$userid,$courseid]);
        $photoable_type = $photoable_id == $userid ? 'App\Models\User' : 'App\Models\Course';
        return [
            'filename' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg',]),
            'photoable_id'=>  $photoable_id ,
            'photoable_type' => $photoable_type,
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
