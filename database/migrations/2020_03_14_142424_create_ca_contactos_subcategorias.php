<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaContactosSubcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_contactos_subcategorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("ca_contactos_id")->unsigned();
            $table->integer("ca_subcategorias_id")->unsigned();
            $table->timestamps();
            
            //relaciones
            $table->foreign("ca_contactos_id")->references("id")->on("ca_contactos")->onDelete("cascade")
            ->onUpdate("cascade");
            $table->foreign("ca_subcategorias_id")->references("id")->on("ca_subcategorias")->onDelete("restrict")
            ->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_contactos_subcategorias');
    }
}
