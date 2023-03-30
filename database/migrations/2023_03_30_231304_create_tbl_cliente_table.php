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
        Schema::create('tbl_cliente', function (Blueprint $table) {

		$table->bigIncrements('fld_id');
		$table->string('fld_nombre',50);
		$table->string('fld_apellido',50);
		$table->string('fld_correo',60)->nullable()->default('NULL');
		$table->string('fld_pais',60);
		$table->string('fld_departamento',60);
		$table->string('fld_ciudad',60);
		$table->string('fld_direccion',60)->nullable()->default('NULL');
		$table->string('fld_tipo',20);
		$table->string('fld_cedula',20)->nullable()->default('NULL');
		$table->date('fld_nacimiento')->nullable()->default('NULL');
		$table->string('fld_estado',60);
		$table->enum('fld_hijos',['0','1']);
		$table->integer('fld_numero',3)->nullable()->default('NULL');
		$table->datetime('fld_registro');
		$table->bigInteger('fld_IDuser',10);
		$table->datetime('fld_UpdateFecha')->nullable()->default('NULL');
		$table->bigInteger('fld_UpdateUser',10)->nullable()->default('NULL');
		$table->primary('fld_id');
		$table->foreign('fld_IDuser')->references('fld_id')->on('tbl_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_cliente');
    }
};
