<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("ca_states_id")->unsigned();
            $table->string('name',128);
            $table->timestamps();
            $table->foreign("ca_states_id")->references("id")->on("ca_states")->onDelete("cascade")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_cities');
    }
}
