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
            $table->foreignId('product_id')->constrained()
                ->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('levorder_id')->constrained()
                ->onUpdate('restrict')->onDelete('restrict');
            $table->date('expected');
            $table->foreignId('levorderstate_id')->constrained()
                ->onUpdate('restrict')->onDelete('restrict');
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
