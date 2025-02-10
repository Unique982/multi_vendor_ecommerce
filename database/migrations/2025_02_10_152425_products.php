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
        Schema::create('products',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->string('slug')->nullable();
            $table->text('description');
            $table->decimal('price',10,2);
            $table->decimal('discount',5,2);
            $table->integer('stock');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('category_id')->references('id')->on('categories');
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
