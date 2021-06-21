<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDependentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('datanacimento');
            $table->integer('id_funcionario')->unsigned();
            $table->foreign('id_funcionario')->references('id')->on('funcionarios')->onDelete('cascade');
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
        Schema::dropIfExists('table_dependentes');
    }
}
