<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nome' => 'TECLADO GAMER RGB',
            'preco' => 299.90,
            'quantidade' => 25,
        ]);

        Product::create([
            'nome' => 'MONITOR 27 POLEGADAS 144HZ',
            'preco' => 1750.00,
            'quantidade' => 10,
        ]);

        Product::create([
            'nome' => 'CADEIRA GAMER ERGONÔMICA',
            'preco' => 980.50,
            'quantidade' => 15,
        ]);
    }
}
