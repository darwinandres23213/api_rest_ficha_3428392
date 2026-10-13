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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();//llave primaria "id"
            $table->unsignedBigInteger('product_id');//llave foranea "product_id"   
            $table->unsignedBigInteger('customer_id');//llave foranea "customer_id" 
            $table->foreignId('product_id')->references('id')->on("product")->onDelete('cascade');
            $table->foreignId('customer_id')->references('id')->on("customers")->onDelete('cascade');
            $table->unsignedTinyInteger('rating');
            $table->text('comment')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
            $table->softDeletes();

        });                         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            //
        });
    }
};
