<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Stock;
use App\Category;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample stock
    	$stock1 = Stock::where('jumlah', '50')->first();
    	$stock2 = Stock::where('jumlah', '20')->first();

    	// sampel Category
    	$category1 = Category::create(['name'=>'Deposit', 'induk_id'=>'0']);
        $category2 = Category::create(['name'=>'Stock', 'induk_id'=>'0']);
        $category3 = Category::create(['name'=>'mkios', 'induk_id'=>'2']);
        $category4 = Category::create(['name'=>'dompul', 'induk_id'=>'2']);
        $category5 = Category::create(['name'=>'mtronik', 'induk_id'=>'2']);
        $category6 = Category::create(['name'=>'HR-Pulsa', 'induk_id'=>'1']);
    	$category7 = Category::create(['name'=>'TAP App', 'induk_id'=>'1']);

    	// Sample produck
        $product1 = Product::create(['name'=>'AS5000', 'satuan'=>'stok', 'category_id'=>$category3->id]);
        $product2 = Product::create(['name'=>'XL5000', 'satuan'=>'stok', 'category_id'=>$category4->id]);
        $product3 = Product::create(['name'=>'ISAT5000', 'satuan'=>'stok', 'category_id'=>$category5->id]);
        $product4 = Product::create(['name'=>'T5', 'satuan'=>'rupiah', 'category_id'=>$category1->id]);
        $product5 = Product::create(['name'=>'AS10000', 'satuan'=>'stok', 'category_id'=>$category3->id]);
        $product6 = Product::create(['name'=>'XL10000', 'satuan'=>'stok', 'category_id'=>$category4->id]);
        $product7 = Product::create(['name'=>'AS5', 'satuan'=>'rupiah', 'category_id'=>$category6->id]);
        $product8 = Product::create(['name'=>'XL5', 'satuan'=>'rupiah', 'category_id'=>$category7->id]);
        $product8 = Product::create(['name'=>'S5', 'satuan'=>'rupiah', 'category_id'=>$category6->id]);
        $product8 = Product::create(['name'=>'AX5', 'satuan'=>'rupiah', 'category_id'=>$category7->id]);


    }
}
