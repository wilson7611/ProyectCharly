<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
                'fecha_venta' => $this->faker->date(),
                'total' => $this->faker->randomFloat(2, 10, 500),
                'cliente_id' => Cliente::factory()->create()->id,
                'vendedor_id' => User::factory()->create()->id,
         
        ];
    }
}
