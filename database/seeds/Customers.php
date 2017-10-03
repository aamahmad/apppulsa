<?php

use Illuminate\Database\Seeder;

use App\Customer;
use App\Product;
use App\Price;
use App\Sell;

class Customers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sampel customer
    	$customer1 = Customer::create(['name'=>'Aam','no_hp'=>'085223399317']);
    	$customer2 = Customer::create(['name'=>'Ade','no_hp'=>'085745115511']);

    	// sampel  produk
        $produk1 = Product::where('name', 'AS5000')->first();
        $produk2 = Product::where('name', 'XL5000')->first();
        $produk3 = Product::where('name', 'ISAT5000')->first();
        $produk4 = Product::where('name', 'AS5')->first();
        $produk5 = Product::where('name', 'XL5')->first();

        // sample harga
        $harga1 = Price::where('product_id', $produk1->id)->first();
        $harga2 = Price::where('product_id', $produk2->id)->first();
        $harga3 = Price::where('product_id', $produk3->id)->first();
        $harga4 = Price::where('product_id', $produk4->id)->first();
        $harga5 = Price::where('product_id', $produk5->id)->first();

        // sample sell
        $sell1 = Sell::create(['customer_id'=>$customer2->id,'product_id'=>$produk1->id,'price_id'=>$harga1->id,'qty'=>'4','harga_retail'=>$harga1->harga_jual,'harga_awal'=>$harga1->harga_dasar]);
        $sell2 = Sell::create(['customer_id'=>$customer2->id,'product_id'=>$produk2->id,'price_id'=>$harga2->id,'qty'=>'2','harga_retail'=>$harga1->harga_jual,'harga_awal'=>$harga2->harga_dasar]);
        $sell3 = Sell::create(['customer_id'=>$customer1->id,'product_id'=>$produk3->id,'price_id'=>$harga3->id,'qty'=>'2','harga_retail'=>$harga1->harga_jual,'harga_awal'=>$harga3->harga_dasar]);
        $sell4 = Sell::create(['customer_id'=>$customer1->id,'product_id'=>$produk4->id,'price_id'=>$harga4->id,'qty'=>'1','harga_retail'=>$harga1->harga_jual,'harga_awal'=>$harga4->harga_dasar]);
        $sell5 = Sell::create(['customer_id'=>$customer1->id,'product_id'=>$produk5->id,'price_id'=>$harga5->id,'qty'=>'1','harga_retail'=>$harga1->harga_jual,'harga_awal'=>$harga5->harga_dasar]);
        $sell6 = Sell::create(['customer_id'=>$customer1->id,'product_id'=>$produk4->id,'price_id'=>$harga4->id,'qty'=>'1','harga_retail'=>$harga1->harga_jual,'harga_awal'=>$harga4->harga_dasar]);
    }
}
