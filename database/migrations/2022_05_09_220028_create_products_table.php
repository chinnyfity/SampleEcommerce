<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category')->nullable();
            $table->string('title', 100)->nullable();
            $table->decimal('price', 10,2)->default('0.00');
            $table->longText('description')->nullable();
            $table->integer('qty');
            $table->string('canvas_width', 20)->nullable();
            $table->string('canvas_height', 20)->nullable();
            $table->string('file1', 20);
            $table->string('file2', 20)->nullable();
            $table->string('file3', 20)->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();

            $table->index(['id','category', 'title']);
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
