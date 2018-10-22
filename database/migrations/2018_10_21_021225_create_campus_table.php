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
            $table->string('descdocampus')->unique();
            $table->string('endereco')->unique();
            $table->string('telefone')->unique();
            $table->integer('id_cidade')->unsigned();
            $table->foreign('id_cidade')->references('id')->on('cidades');
            $table->integer('idestados')->unsigned();
            $table->foreign('idestados')->references('id')->on('estados');
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
