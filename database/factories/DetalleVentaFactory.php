<?php

namespace Database\Factories;


use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetalleVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad' => $this->faker->numberBetween(1, 10),
            'precio_unitario' => $this->faker->randomFloat(2, 5, 50),
            'subtotal' => $this->faker->randomFloat(2, 10, 500),
            'venta_id' => Venta::factory()->create()->id,
            'producto_id' => Producto::factory()->create()->id,
        ];
    }
}
