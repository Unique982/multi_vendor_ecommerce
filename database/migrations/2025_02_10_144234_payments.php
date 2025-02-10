<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('payment_method',['online','cash'])->default('cash');
            $table->string('transaction_id');
            $table->decimal('amount',10,2);
            $table->enum('status',['pending','completed','failed'])->default('pending');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
