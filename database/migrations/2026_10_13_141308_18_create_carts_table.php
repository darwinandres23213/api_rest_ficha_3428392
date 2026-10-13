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
        Schema::create('carts', function (Blueprint $table) {
            $table->id("id"); //llave primaria "id"
            $table->string('status', 30)->default('open');
            $table->unsignedBinteger('customer_id'); //llave foranea 
            $table->foreignId('customer_id')->reference("id")->on("customers")->onDelete("cascade") ;
            $table->timestamps();
            $table->softDeletes();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            //
        });
    }
};
