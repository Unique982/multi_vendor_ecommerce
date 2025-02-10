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
        Schema::create('orders',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_num');
            $table->decimal('total_amount',10,2);
            $table->enum('payment_status',['pending','paid','failed'])->default('pending');
            $table->enum('order_status',['pending','prcoessing','delivered','shipped','cancelled'])->default('pending');
            $table->timestamps();
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
