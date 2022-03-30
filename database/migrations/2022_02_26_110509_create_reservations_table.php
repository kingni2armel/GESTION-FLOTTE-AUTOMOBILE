<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->double('telephone_client');
            $table->text('motif_demande');
            $table->string('ville_depart');
            $table->string('ville_destination');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->double('nombre_de_place');
            $table->boolean('statut_convoiture');
            $table->boolean('statut_reservation');
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
        Schema::dropIfExists('reservations');
    }
}
