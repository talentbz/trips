<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTripDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_trip_details', function (Blueprint $table) {
            $table->id();
            $table->string('trip_name')->nullable();
            $table->string('client_name')->nullable();
            $table->string('origin_city');
            $table->string('origin_area');
            $table->string('destination_area');
            $table->string('destination_city');
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_time')->nullable();
            $table->integer('bus_size_id')->nullable();
            $table->string('bus_no')->nullable();
            $table->string('details')->nullable();
            $table->string('dirver_name')->nullable();
            $table->boolean('trip_type');
            $table->boolean('show_admin_status');
            $table->string('status');
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
        Schema::dropIfExists('daily_trip_details');
    }
}
