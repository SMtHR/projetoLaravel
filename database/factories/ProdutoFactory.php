<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unidade;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produtos>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'preco' => fake()->numberBetween(0, 50),
            'unidade_id' => Unidade::inRandomOrder()->first()->id
        ];
    }
}
