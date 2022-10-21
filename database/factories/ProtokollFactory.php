<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Protokoll>
 */
class ProtokollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
         $customerAction = ['erstellt', 'löscht', 'editiert'];
        $buildString = [
            fake()->name." " .$customerAction[0]." ".fake()->country(),
            fake()->name." " .$customerAction[1]." ".fake()->country(),
            fake()->name." " .$customerAction[2]." ".fake()->country()
        ];
        return [
            'action' =>  $buildString[rand(0,2)]
        ];
    }
}
