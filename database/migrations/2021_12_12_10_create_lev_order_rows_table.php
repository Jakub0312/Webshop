<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevOrderRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lev_order_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->foreignId('product_id');
            $table->foreignId('levorder_id');
            $table->date('expected');
            $table->foreignId('levorderstate_id');
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
        Schema::dropIfExists('lev_order_rows');
    }
}
