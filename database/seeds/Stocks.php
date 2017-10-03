<?php

use Illuminate\Database\Seeder;

use App\Supplier;
use App\Stock;
use App\Product;

class Stocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sampel supier
        $supplier1 = Supplier::where('name', 'Doni')->first();
        $supplier2 = Supplier::where('name', 'Ajat')->first();
        $supplier3 = Supplier::where('name', 'Budi')->first();

        // sampel product
        $produk1 = Product::where('name', 'AS5000')->first();
        $produk2 = Product::where('name', 'XL5000')->first();
        $produk3 = Product::where('name', 'XL5000')->first();
        $produk4 = Product::where('name', 'AS10000')->first();

        $stok1 = Stock::create(['supplier_id'=>$supplier1->id, 'product_id'=>$produk1->id, 'jumlah'=>30, 'tgl_beli'=>'2017-09-29']);
        $stok2 = Stock::create(['supplier_id'=>$supplier2->id, 'product_id'=>$produk2->id, 'jumlah'=>20, 'tgl_beli'=>'2017-09-29']);
        $stok3 = Stock::create(['supplier_id'=>$supplier2->id, 'product_id'=>$produk3->id, 'jumlah'=>15, 'tgl_beli'=>'2017-09-29']);
        $stok4 = Stock::create(['supplier_id'=>$supplier2->id, 'product_id'=>$produk3->id, 'jumlah'=>10, 'tgl_beli'=>'2017-09-29']);
        $stok5 = Stock::create(['supplier_id'=>$supplier2->id, 'product_id'=>$produk4->id, 'jumlah'=>5, 'tgl_beli'=>'2017-09-29']);
    }
}
