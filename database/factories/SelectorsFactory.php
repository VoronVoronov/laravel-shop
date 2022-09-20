<?php

namespace Database\Factories;

use App\Models\Selectors;
use Illuminate\Database\Eloquent\Factories\Factory;

class SelectorsFactory extends Factory
{
    protected $model = Selectors::class;

    public function definition(): array
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 50000),
            'filter_id' => $this->faker->numberBetween(1, 130),
        ];
    }
}
