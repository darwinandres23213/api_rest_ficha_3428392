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
        Schema::create('products', function (Blueprint $table) {
            $table->id();//primary kay
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references("id")->on("categories")->onDelete("cascade");
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references("id")->on("brands")->onDelete("cascade");
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references("id")->on("suppliers")->onDelete("cascade");
            $table->string('sku', 60)->unique();
            $table->string('name', 180);
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->decimal('cost', 12, 2)->nullable();
            $table->unsignedBigInteger('stock_min')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
