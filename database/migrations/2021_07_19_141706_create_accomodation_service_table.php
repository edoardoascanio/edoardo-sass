<?php

use App\Accomodation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_service', function (Blueprint $table) {


            $table->foreignId("accomodation_id")
                ->constrained();

            $table->foreignId("service_id")
                ->constrained();

            $table->primary(['accomodation_id', 'service_id']);


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
        Schema::dropIfExists('accomodation_service');
    }
}
