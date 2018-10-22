<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descdocampus') ->unique();
            $table->string('endereco')     ->unique();
            $table->string('telefone')     ->unique();
            $table->integer('cidade')      ->unsigned();
            $table->foreign('cidade')      ->references('id')->on('cidades');
            $table->integer('estado')      ->unsigned();
            $table->foreign('estado')      ->references('id')->on('estados');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
