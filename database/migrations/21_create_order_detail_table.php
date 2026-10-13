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
        Schema::create('order_details', function (Blueprint $table) {
            $table ->id(); //llave primario "id"
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 12, 2);
            $table->decimal('line_total', 12, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('order_id');//hhgvhhv
            $table->foreign('order_id')->references('id')->on("orders")->onDelete("cascade");
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on("products")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
};
