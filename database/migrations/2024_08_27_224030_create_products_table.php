<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable(); 
            $table->string('code')->nullable();
            $table->string('description');
            $table->string('type')->nullable();
            $table->string('dimension')->nullable();
            $table->string('unity_measure')->nullable();
            $table->string('holes')->nullable();
            $table->string('mixed_or_pure')->nullable();
            $table->string('color')->nullable();
            $table->string('rpm')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('status')->default(1);
            $table->integer('company_id');
            $table->integer('supplier_id')->nullable();
            $table->decimal('input_value')->default(0.00);
            $table->decimal('output_value')->default(0.00);
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
        Schema::dropIfExists('products');
    }
}