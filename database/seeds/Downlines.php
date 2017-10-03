<?php

use Illuminate\Database\Seeder;

use App\Customer;
use App\Downline;

class Downlines extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sampel customer
        $customer1 = Customer::where('name', 'Aam')->first();
        $customer2 = Customer::where('name', 'Ade')->first();

        // sample downline
        $downline1 = Downline::create(['customer_id'=>$customer2->id,'markup'=>75]);

    }
}
