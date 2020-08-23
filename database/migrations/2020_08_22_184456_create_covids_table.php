<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covids', function (Blueprint $table) {
                $table ->string('Country');
                $table ->string('CountryCode');
                $table ->string('NewConfirmed');
                $table ->string('TotalConfirmed');
                $table ->string('NewDeaths');
                $table ->string('TotalDeaths');
                $table ->string('NewRecovered');
                $table ->string('TotalRecovered');
                $table ->primary('Country');
                $table ->foreign('CountryCode')->references('country_code')->on('countries');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covids');
    }
}
