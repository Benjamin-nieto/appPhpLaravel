<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {

		$table->bigIncrements('fld_id');
		$table->integer('fld_IDrol',10);
		$table->string('fld_nombre',60);
		$table->string('fld_correo',60);
		$table->string('fld_clave',60);
		$table->enum('fld_estado',['0','1']);
		$table->datetime('fld_registro');
		$table->bigInteger('fld_IDuser',10);
		$table->datetime('fld_UpdateFecha');
		$table->bigInteger('fld_UpdateUser',10);
		$table->primary('fld_id');
		$table->foreign('fld_IDrol')->references('fld_id')->on('tbl_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
