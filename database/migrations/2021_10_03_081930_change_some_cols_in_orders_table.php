<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSomeColsInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('addres');
            $table->dropColumn('phone');
            $table->dropColumn('additional');
            $table->renameColumn('status' , 'order_status_id');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->text('notes')->nullabel();
            $table->tinyInteger('seen')->default(0)->comment('0 means its new and not seen , 1 means seen indeed');
            $table->string('order_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
