<?php

use Illuminate\Database\Seeder;

use App\Supplier;
use App\Deposit;

class Suppliers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample supplier
        $suplier1 = Supplier::create(['name'=>'Doni', 'alamat'=>'singaparna', 'no_telp'=>'08523231331', 'email'=>'doni@apppulsa.com']);
        $suplier2 = Supplier::create(['name'=>'Ajat', 'alamat'=>'tasikmalaya', 'no_telp'=>'08121212121', 'email'=>'ajat@apppulsa.com']);
        $suplier3 = Supplier::create(['name'=>'Budi', 'alamat'=>'mangunreja', 'no_telp'=>'0572121152', 'email'=>'budi@apppulsa.com']);
    }
}
