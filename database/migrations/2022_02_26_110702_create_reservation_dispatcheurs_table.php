<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationDispatcheursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_dispatcheurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('dispatcheur_id');
            $table->foreign('dispatcheur_id')->references('id')->on('dispactcheurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
    
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
        Schema::dropIfExists('reservation_dispatcheurs');
    }
}
