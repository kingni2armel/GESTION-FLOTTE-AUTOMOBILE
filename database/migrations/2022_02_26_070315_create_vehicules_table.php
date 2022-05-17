<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('marques')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('modele_id');
            $table->foreign('modele_id')->references('id')->on('modeles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('typeCarburant_id');
            $table->foreign('typeCarburant_id')->references('id')->on('type_carburants')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('parking_id');
            $table->foreign('parking_id')->references('id')->on('parkings')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->boolean('statut_vehicule');
            $table->string('immatriculation')->unique();
            $table->float('kilometrage');
            $table->string('numero_chassi')->unique();
            $table->date('date_debut_assurance');
            $table->date('date_fin_assurance');
            $table->string('path');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
