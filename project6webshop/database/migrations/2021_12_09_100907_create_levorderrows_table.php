<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevorderrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levorderrows', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->foreignId('product_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('levorder_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->date('expected');
            $table->foreignId('levorderstate_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('levorderrows');
    }
}
