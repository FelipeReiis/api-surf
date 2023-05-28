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
        Schema::create('notas', function(Blueprint $table){
            $table->id();
            $table->integer('onda');
            $table->foreign('onda')->references('id')->on('ondas');
            $table->float('notaParcial1');
            $table->float('notaParcial2');
            $table->float('notaParcial3');
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
