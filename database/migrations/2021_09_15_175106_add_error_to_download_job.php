<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddErrorToDownloadJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('download_patient_cards', function (Blueprint $table) {
            $table->text('error_')->nullable();
            $table->datetime('download_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('download_patient_cards', function (Blueprint $table) {
            $table->removeColumn('error_');
            $table->removeColumn('download_at');
            //
        });
    }
}
