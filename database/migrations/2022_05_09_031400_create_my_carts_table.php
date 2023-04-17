<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_carts', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice');
            $table->integer('user');
            $table->integer('product');
            $table->integer('qty');
            $table->decimal('price', 10,2)->default('0.00');
            $table->decimal('total', 10,2)->default('0.00');
            $table->string('payment_type', 10)->nullable();
            $table->integer('paid');
            $table->timestamps();

            $table->index(['id', 'product']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_carts');
    }
}
