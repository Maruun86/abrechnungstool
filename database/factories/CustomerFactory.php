<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'vorname' =>fake()->firstName(),
            'nachname' =>fake()->lastname(),
            'email' =>fake()->email(),
            'rfid_nr' => rand(000000,999999),
            'active' => true
        ];
    }
}
