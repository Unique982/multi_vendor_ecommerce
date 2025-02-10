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
        Schema::create('vendors',function(Blueprint $table){
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('shop_name');
        $table->string('shop_slug')->unique();
        $table->text('shop_description');
        $table->string('logo')->nullable();
        $table->string('banner')->nullable();
        $table->string('phone',14);
        $table->string('address');
        $table->enum('status',['pending','approved','suspended'])->default('pending');
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
