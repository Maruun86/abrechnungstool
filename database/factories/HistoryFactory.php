<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customerAction = ['kauft', 'lädt auf', 'hebt ab'];
        $buildString = [
            fake()->name." " .$customerAction[0]." ".fake()->country()." für ".rand(1,20)."€",
            fake()->name." " .$customerAction[1]." ".rand(1,20)."€",
            fake()->name." " .$customerAction[2]." ".rand(1,20)."€"
        ];
        return [
            'transaction' =>  $buildString[rand(0,2)]
        ];
    }
}
