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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references("id")->on("roles")->onDelete("cascade");
            $table->unsignedBigInteger('document_type_id');
            $table->foreign('document_type_id')->references("id")->on("document_types")->onDelete("cascade");
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references("id")->on("cities")->onDelete("cascade");
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('document_number', 30)->unique();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->string('phone', 30)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
