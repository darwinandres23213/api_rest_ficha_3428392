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
        Schema::table('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreing('order_id')->references('id')->on("orders")->onDelete("cascade");
            $table->unsignedBigInteger('address_id');
            $table->foreing('address_id')->references('id')->on("address")->onDelete("cascade");
            $table->string('carrier', 80)->nullable();
            $table->string('tracking_code', 80)->nullable();
            $table->string('status', 30)->default('pending');
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            //
        });
    }
};
