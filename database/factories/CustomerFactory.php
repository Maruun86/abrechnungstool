<?php

namespace Database\Factories;

use App\Models\RFID;
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
        $nr = RFID::factory()->create();
        $rfid = RFID::where('rfid_nr',  $nr->rfid_nr)->first();
        return [
            'vorname' =>fake()->firstName(),
            'nachname' =>fake()->lastname(),
            'email' =>fake()->email(),
            'rfid_id' => $rfid->id,
            'active' => true
        ];
    }
}
