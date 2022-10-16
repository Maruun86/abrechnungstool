<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LayoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $layoutNames = ['Getränke','Speisen','Garderobe','Merchandise','Photos','Infostand'];
        return [
            'name' => $layoutNames[array_rand($layoutNames, 1)]
        ];
    }
}
