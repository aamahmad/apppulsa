<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->integer('product_id')->unsigned();
            $table->integer('qty');
            $table->integer('harga_awal');
            $table->integer('harga_retail');
            $table->integer('sub_total');
            $table->integer('isLunas');
            $table->string('ket1')->nullable();
            $table->string('ket2')->nullable();
            $table->date('tgl');
            $table->integer('laba')->nullable();;
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
