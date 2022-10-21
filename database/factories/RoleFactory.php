<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roleNames = ['Admin', 'Verkäufer', 'Bedienung', 'Super-Verkäufer'];
        return [
            'name' => $roleNames[rand(0,3)]
        ];
    }
}
