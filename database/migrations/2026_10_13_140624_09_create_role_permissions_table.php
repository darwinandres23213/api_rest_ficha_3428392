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
        Schema::create('role_permissions', function (Blueprint $table) {
        $table->id();
        $table->unSignedBigInterger('role_id');
        $table->foreing('role_id')->reference("id")->on("role")->onDelete("cascade");
        $table->unSignedBigInterger('permission_id');
        $table->foreing('permission_id')->reference("id")->on("permission")->onDelete("cascade");
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            //
        });
    }
};
