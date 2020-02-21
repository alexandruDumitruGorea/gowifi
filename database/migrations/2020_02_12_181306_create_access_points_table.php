<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_point', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            // id, iduser, modelo, ubicación, latitud, longitud, fechaalta
            $table->bigIncrements('id');
            $table->bigInteger('id_technical')->unsigned()->nullable(false);
            $table->string('model', 100);
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->date('date_register');
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('id_technical')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_point');
    }
}
