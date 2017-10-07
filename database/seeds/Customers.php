<?php

use Illuminate\Database\Seeder;

use App\Customer;


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
    	$customer1 = Customer::create(['name'=>'Aam','alamat'=>'sukabirus']);
    	$customer2 = Customer::create(['name'=>'Ade','alamat'=>'parakanpanjang']);
    }
}
