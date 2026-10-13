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
        Schema::table('products', function (Blueprint $table) {
            $table->id();//primary kay
            $table->unsignedBigInteger('category_id');
            $table->foreing('category_id')->reference("id")->on("categories")->onDelate("cascade");
            $table->unsignedBigInteger('brand_id');
            $table->foreing('brand_id')->reference("id")->on("brands")->onDelete("cascade");
            $table->unsignedBigInteger('supplier_id');
            $table->foreing('supplier_id')->reference("id")->on("suppliers")->onDelete("cascade");
            $table->string('sku', 60)->unique();
            $table->string('name', 180);
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->decimal('cost', 12, 2)->nullable();
            $table->unsignedInteger('stock_min')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_active')->default(true);
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
