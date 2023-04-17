<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->string('product_ids', 100)->nullable();            
            $table->decimal('amount', 10,2)->default('0.00');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->string('payment_mthd', 10)->nullable();
            $table->string('response', 100)->nullable();
            $table->string('narration', 200)->nullable();
            $table->timestamps();

            $table->index(['status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
