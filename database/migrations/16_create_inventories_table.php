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
         Schema::create('inventories', function (Blueprint $table) {
            $table->id(); //llave primeraria "id"
            $table->unsignedBigInteger('product_id')->unique();
            $table->foreign('product_id')->references('id')->on('products')->onDelete("cascade");
            $table->unsignedBigInteger('warehouse_id')->unique();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete("cascade");
            $table->integer('quantity')->default(0);
            $table->timestamp('last_movement_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            
        });
    }
};