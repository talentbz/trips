<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_name_en');
            $table->string('trip_name_ar');
            $table->integer('client_id');
            $table->string('trip_type');
            $table->string('details')->nullable();
            $table->string('trip_frequancy');
            $table->date('first_trip_date');
            $table->date('last_trip_date');
            $table->string('origin_city');
            $table->string('origin_area');
            $table->string('destination_city');
            $table->string('destination_area');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->boolean('admin_show');
            $table->boolean('status');
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
        Schema::dropIfExists('trips');
    }
}
