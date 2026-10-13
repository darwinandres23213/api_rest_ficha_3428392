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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); //llave primaria "id"
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references("id")->on("customers")->onDelete("cascade");
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references("id")->on("cities")->onDelete("cascade");
            $table->string('label',60)->nullable();
            $table->string('line1', 180);
            $table->string('line2', 180)->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            //
        });
    }
};
