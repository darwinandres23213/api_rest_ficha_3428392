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
        Schema::table('cart_items', function (Blueprint $table) {
            $table->id();
             $table->unsignedInteger('quantity');
             $table->decimal('unit_price', 12, 2);
             $table->timestamps();
             $table->softDeletes();
             $table->unsignedBigInteger('cart_id');
             $table->foreing('cart_id')->reference('id')->on('carts')->onDelete('cascade');
             $table->unsignedBigInteger('product_id');
             $table->foreing('product_id')->reference('id')->on('productss')->onDelete('cascade');
    
    

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            //
        });
    }
};
