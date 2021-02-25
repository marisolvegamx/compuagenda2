<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaStates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',128);
            $table->integer("ca_countries_id")->unsigned();
            $table->timestamps();
            $table->foreign("ca_countries_id")->references("id")->on("ca_countries")->onDelete("cascade")
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
        Schema::dropIfExists('ca_states');
    }
}
