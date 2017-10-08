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

    	// sampel Category
    	$category1 = Category::create(['name'=>'Deposit', 'induk_id'=>'0']);
        $category2 = Category::create(['name'=>'Stock', 'induk_id'=>'0']);
    	
    }
}
