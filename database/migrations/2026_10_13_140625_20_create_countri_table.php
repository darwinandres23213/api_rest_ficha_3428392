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
        Schema::create('oreders', function (Blueprint $table) {
            $table->id("id_order");//llave primaria "id"
            $table->unsignedBigInteger('customer_id');//llave foranea, definiendo de la llave foranea
            $table->foreignId('customer_id')->reference("id")->on("customers")->onDelete("cascade");
            $table->unsignedBigInteger("user_id");//llave foranea, definiendo de la llave foranea
            $table->foreignId('user_id')->reference("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("coupon_id");//llave foranea, definiendo de la llave foranea
            $table->foreignId('coupon_id')->reference("id")->on("coupons")->onDelete("cascade");
            $table->unsignedBigInteger("address_id");//llave foranea, definiendo de la llave foranea
            $table->foreignId('address_id')->reference("id")->on("addressses")->onDelete("cascade");
            
            $table->string('order_number', 40)->unique()->nullable();
            $table->string('status', 30)->default('pending');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->timestamp('ordered_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
