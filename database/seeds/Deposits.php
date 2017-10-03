<?php

use Illuminate\Database\Seeder;

use App\Supplier;
use App\Deposit;
use App\Category;

class Deposits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sampel suplier
        $supplier1 = Supplier::where('name', 'Doni')->first();
        $supplier2 = Supplier::where('name', 'Ajat')->first();
        $supplier3 = Supplier::where('name', 'Budi')->first();

        // sampel category
        $category1 = Category::where('name', 'HR-Pulsa')->first();
        $category2 = Category::where('name', 'TAP App')->first();

           // Sample deposit
        $deposit1 = Deposit::create(['supplier_id'=>$supplier1->id, 'category_id'=>$category1->id, 'jumlah'=>300000, 'tgl_beli'=>'2017-09-29']);
        $deposit2 = Deposit::create(['supplier_id'=>$supplier1->id, 'category_id'=>$category1->id, 'jumlah'=>150000, 'tgl_beli'=>'2017-09-29']);
        $deposit3 = Deposit::create(['supplier_id'=>$supplier3->id, 'category_id'=>$category2->id, 'jumlah'=>110000, 'tgl_beli'=>'2017-09-29']);
    }
}
