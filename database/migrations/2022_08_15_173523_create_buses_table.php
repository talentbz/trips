<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_no');
            $table->integer('bus_size_id');
            $table->string('license_no');
            $table->date('license_expiry_date');
            $table->integer('bus_type_id');
            $table->string('bus_model_id');
            $table->date('model_year');
            $table->boolean('status');
            $table->boolean('owner_ship');
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
        Schema::dropIfExists('buses');
    }
}
