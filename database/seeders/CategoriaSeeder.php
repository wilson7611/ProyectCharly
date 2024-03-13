<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Crear las categorías si no existen
       $categorias = ['Bebidas', 'Comida'];
       foreach ($categorias as $categoria) {
           Categoria::firstOrCreate(['nombre' => $categoria]);
       }
    }
}
