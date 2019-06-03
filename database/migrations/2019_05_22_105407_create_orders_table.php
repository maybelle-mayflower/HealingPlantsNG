<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('recipientname')->nullable();;
            $table->integer('quantity');
            $table->string('amount');
            $table->text('reference')->nullable();
            $table->text('shoppingcart');
            $table->text('deliveryaddress');
            $table->string('state');
            $table->longText('comments')->nullable();
            $table->string('mobileno');
            $table->string('paymentstatus')->nullable();
            $table->string('deliverystatus')->nullable();
            $table->timestamps();

            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
