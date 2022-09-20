<?php

namespace Database\Factories;

use App\Models\Filters;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    protected $model = Filters::class;

    public function definition(): array
    {
        return [
            'key' => 'Категории',
            'value' => $this->faker->word,
        ];
    }
}
