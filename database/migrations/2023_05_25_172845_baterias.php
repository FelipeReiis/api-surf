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
        Schema::create('baterias', function(Blueprint $table){
            $table->id();
            $table->integer('surfista1');
            $table->foreign('surfista1')->references('id')->on('surfistas');
            $table->integer('surfista2');
            $table->foreign('surfista2')->references('id')->on('surfistas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
