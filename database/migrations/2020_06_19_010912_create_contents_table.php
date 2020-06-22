<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->integer('ver')->nullable()->default(0); //EDITAR ESTE CAMPO EN LOS CREATE PARA QUE TENGA VALOR POR DEFECTO (VERSIÓN NUEVA)
            $table->string('status')->nullable()->default('NULL');
            $table->string('message')->nullable();
            $table->string('name');
            $table->string('desc');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamp('created_at')->default(now()); //PRUEBAS PARA CHECAR LAS FECHAS Y HORAS DE CREACIÓN
            $table->timestamp('updated_at')->nullable(); //PRUEBAS PARA CHECAR LAS FECHAS Y HORAS DE ACTUALIZACIÓN

            $table->unsignedBigInteger('user_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('user_id', 'fk_contents_users1_idx')
                ->references('id')->on('users')->where('rol', '=', 'aut')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('section_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('section_id', 'fk_contents_sections1_idx')
                ->references('id')->on('sections')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
