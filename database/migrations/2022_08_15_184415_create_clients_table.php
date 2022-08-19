<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('client_type_id');
            $table->integer('contract_type_id');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('website');
            $table->string('fax');
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->string('liaison_name');
            $table->string('liaison_phone');
            $table->string('record_number');
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
        Schema::dropIfExists('clients');
    }
}
