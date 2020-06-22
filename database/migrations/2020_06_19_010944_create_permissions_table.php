<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('edit');
            $table->string('create');

            $table->unsignedBigInteger('section_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('section_id', 'fk_permissions_sections1_idx')
                ->references('id')->on('sections')
                ->onDelete('set null')
                ->onUpdate('cascade');

            /*$table->unsignedBigInteger('content_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('content_id', 'fk_permissions_contents1_idx')
                ->references('id')->on('contents')->where('status', '=', FALSE)
                ->onDelete('set null')
                ->onUpdate('cascade');*/

            $table->unsignedBigInteger('user_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('user_id', 'fk_permissions_users1_idx')
                ->references('id')->on('users')->where('rol', '=', 'aut')
                ->onDelete('set null')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('permissions');
    }
}
