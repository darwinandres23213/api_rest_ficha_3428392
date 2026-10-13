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
            $table->foreign('customer_id')->references("id")->on("customers")->onDelete("cascade");
            $table->unsignedBigInteger("user_id");//llave foranea, definiendo de la llave foranea
            $table->foreign('user_id')->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("coupon_id");//llave foranea, definiendo de la llave foranea
            $table->foreign('coupon_id')->references("id")->on("coupons")->onDelete("cascade");
            $table->unsignedBigInteger("address_id");//llave foranea, definiendo de la llave foranea
            $table->foreign('address_id')->references("id")->on("addresses")->onDelete("cascade");
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
