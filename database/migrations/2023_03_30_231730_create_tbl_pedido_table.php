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
        Schema::create('tbl_pedido', function (Blueprint $table) {

		$table->bigIncrements('fld_id');
		$table->bigInteger('fld_referencia',20);
		$table->bigInteger('fld_IDcliente',10);
		$table->bigInteger('fld_IDusuario',10);
		$table->bigInteger('fld_total',15);
		$table->enum('fld_estado',['0','1','2']);
		$table->datetime('fld_registro');
		$table->datetime('fld_UpdateFecha')->nullable()->default('NULL');
		$table->bigInteger('fld_UpdateUser',10)->nullable()->default('NULL');
		$table->primary('fld_id');
		$table->foreign('fld_IDcliente')->references('fld_id')->on('tbl_cliente');		$table->foreign('fld_IDusuario')->references('fld_id')->on('tbl_usuarios');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pedido');
    }
};
