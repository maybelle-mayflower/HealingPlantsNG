<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdereditemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordereditems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderid')->unsigned();
            $table->string('product_name');
            $table->string('product_price');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('orderid')->references('id')->on('orders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordereditems');
    }
}
