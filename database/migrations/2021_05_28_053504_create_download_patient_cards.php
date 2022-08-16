<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadPatientCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_patient_cards', function (Blueprint $table) {
            $table->id();
            $table->string('card_range')->nullable();
            $table->integer('subscriber_id');
            $table->integer('creator_id');
            $table->integer('status');
            $table->dateTime('remove_time')->nullable();
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
        Schema::dropIfExists('download_patient_cards');
    }
}
