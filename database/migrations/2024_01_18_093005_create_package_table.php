<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->bigInteger('contact_phone');
            $table->integer('amount');
            $table->float('duration');
            $table->string('clothing');
            $table->integer('for_many');
            $table->string('weather_info');
            $table->text('added_info');
            $table->integer('valid_period');
            $table->bigInteger('location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package');
    }
}
