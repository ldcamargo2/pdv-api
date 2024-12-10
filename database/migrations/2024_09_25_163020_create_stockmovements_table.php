<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('product_id'); 
            $table->integer('last_value');
            $table->integer('moved_value');
            $table->integer('actual_value');
            $table->integer('operation');
            $table->integer('responsible_id');
            $table->datetime('confirmed_at')->nullable();
            $table->integer('confirmed_by')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_movements');
    }
}