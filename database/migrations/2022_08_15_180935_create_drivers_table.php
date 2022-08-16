<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('age');
            $table->string('phone');
            $table->string('license_number');
            $table->string('address');
            $table->string('password');
            $table->string('user_name');
            $table->date('license_expiry_date');
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
        Schema::dropIfExists('drivers');
    }
}
