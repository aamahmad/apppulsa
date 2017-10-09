<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Price;

class Prices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // sampel  produk
        $produk1 = Product::where('name', 'AS5000')->first();
        $produk2 = Product::where('name', 'XL5000')->first();
        $produk3 = Product::where('name', 'ISAT5000')->first();
        $produk4 = Product::where('name', 'AS5')->first();
        $produk5 = Product::where('name', 'XL5')->first();
    }
}
