<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(Users::class);
        $this->call(Suppliers::class);
        $this->call(Products::class);
        $this->call(Prices::class);
        $this->call(Customers::class);
        $this->call(Downlines::class);
        $this->call(Stocks::class);
        $this->call(Deposits::class);
    }
}
