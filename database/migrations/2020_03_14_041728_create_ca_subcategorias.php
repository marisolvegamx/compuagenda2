<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaSubcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_subcategorias', function (Blueprint $table) {
            $table->increments('id');
            $table->String("name",164);
            $table->String("slug",128)->unique();//url amigable
            $table->mediumText("body")->nullable();
            $table->integer('ca_categorias_id')->unsigned();
            $table->timestamps();
            $table->foreign("ca_categorias_id")->references("id")->on("ca_categorias")->onDelete("cascade")
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
        Schema::dropIfExists('ca_subcategorias');
    }
}
