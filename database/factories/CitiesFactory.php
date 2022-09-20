<?php

namespace Database\Factories;

use App\Models\Filters;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitiesFactory extends Factory
{
    protected $model = Filters::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'key' => 'Город',
            'value' => $this->faker->city,
        ];
    }
}
