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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            
            $table->string('adress');
            $table->string('telephone');           
            $table->string('date');
            $table->date('dateN');
            $table->string('sexe');
            $table->unsignedBigInteger('hopital_id');
            $table->foreign('hopital_id')->references('id')->on('hopitals');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('hopitals');
            $table->string('message')->default('aucun message');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
