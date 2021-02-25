<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContacto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_contactos', function (Blueprint $table) {
            $table->increments('id');
           $table->string('name',100);
           $table->text('description');
           $table->string('adress',100);
           $table->integer("ca_cities_id")->unsigned();
           $table->string('telephones',100)->nullable();
           	$table->string('internet_adress',100)->nullable();
            $table->decimal('evaluation',8,2);
            $table->string('email',100)->nullable();
           	$table->string('logo',180)->nullable();
            $table->integer("cms_users_id")->unsigned();
            $table->integer("status");
         
           		
            $table->timestamps();
            //relaciones
            $table->foreign("ca_cities_id")->references("id")->on("ca_cities")->onDelete("restrict")
            ->onUpdate("restrict");
            $table->foreign("cms_users_id")->references("id")->on("cms_users")->onDelete("cascade")
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
        Schema::dropIfExists('ca_contactos');
    }
}
