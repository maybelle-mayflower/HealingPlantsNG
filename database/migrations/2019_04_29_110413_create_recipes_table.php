<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_base_id')->unsigned();
            $table->foreign('recipe_base_id')->references('id')->on('plants');
            $table->string('recipe_name');
            $table->string('treatment_for');
            $table->text('keywords');
            $table->mediumText('ingredients');
            $table->longtext('method');
            $table->string('display_image')->default('noimage.jpg');
            $table->integer('is_deleted')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
