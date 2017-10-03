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

        $price1 = Price::create(['product_id'=>$produk1->id, 'harga_dasar'=>5000, 'harga_jual'=>7000]);
        $price2 = Price::create(['product_id'=>$produk2->id, 'harga_dasar'=>5000, 'harga_jual'=>7000]);
        $price3 = Price::create(['product_id'=>$produk3->id, 'harga_dasar'=>5000, 'harga_jual'=>7000]);
        $price4 = Price::create(['product_id'=>$produk4->id, 'harga_dasar'=>5600, 'harga_jual'=>7000]);
        $price5 = Price::create(['product_id'=>$produk5->id, 'harga_dasar'=>5550, 'harga_jual'=>7000]);
    }
}
