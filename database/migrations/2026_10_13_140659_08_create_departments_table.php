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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();//primary kay
            $table->unSigned8igInteger('country_id');//llave foranea, definiendo el nombre de la llave foranea;
            $table->foreing('country_id')->reference("id")->on("countries")->onDelate("cascade");
            $table->string('name', 120);
            $table->string('code', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departnets', function (Blueprint $table) {
            //
        });
    }
};
