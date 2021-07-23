<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationSponsorshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_sponsorship', function (Blueprint $table) {
            $table->foreignId("accomodation_id")
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId("sponsorship_id")
                ->constrained()
                ->onDelete('cascade');

            $table->primary(['accomodation_id', 'sponsorship_id']);
            $table->date('end_sponsorhip');
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
        Schema::dropIfExists('accomodation_sponsorship');
    }
}
