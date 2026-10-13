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
        Schema::table('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_type_id');
            $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->nullable();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('document_numbre', 30)->unique();
            $table->string('email', 150)->unique();
            $table->string('phone', 30)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
