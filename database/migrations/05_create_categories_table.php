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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); //llave primaria "id"
            $table->string('name', 120)->unique(); //
            $table->string('slug', 140)->unique(); //
            $table->text('description')->nullable(); //
            $table->boolean('is_active')->default(true); //
            $table->timestamps(); //
            $table->softDeletes(); //
            // $table->unSignedBigInter(''); // llave foranea, definiendo el nombre de la llave foranea
            // $table->foreign('country_id')->reference("id")->on("countries")->onDelete("cascade"); //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
