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
        Schema::creat('payments', function (Blueprint $table) {
            $table->id(); //lave primaria "id"
            $table->unsignedBingInteger('order_id');
            $table->foreing('order_id')->references("id")->on("orders")->onDelete("cascade");
            $table->string('method', 40);
            $table->decimal('amount', 12, 2);
            $table->string('status', 30)->default('pending');
            $table->string('reference', 100)->nullable();
            $table->softDeletes();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
