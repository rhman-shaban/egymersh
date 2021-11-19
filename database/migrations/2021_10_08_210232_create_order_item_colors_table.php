<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_colors', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('order_item_id')->unsigned();
            // $table->bigInteger('order_id')->unsigned();
            
            $table->string('order_item_id');
            $table->string('order_id');
            $table->string('color_id')->nullable();
            $table->string('color')->nullable();

            // $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_item_colors');
    }
}
