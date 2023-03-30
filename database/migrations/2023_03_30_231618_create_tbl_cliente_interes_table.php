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
        Schema::create('tbl_cliente_interes', function (Blueprint $table) {

		$table->bigIncrements('fld_id');
		$table->bigInteger('fld_IDcliente',10);
		$table->bigInteger('fld_IDcategoria',10);
		$table->text('fld_observacion');
		$table->datetime('fld_fecha');
		$table->bigInteger('fld_IDuser',10);
		$table->datetime('fld_UpdateFecha')->nullable()->default('NULL');
		$table->bigInteger('fld_UpdateUser',10)->nullable()->default('NULL');
		$table->primary('fld_id');
		$table->foreign('fld_IDcategoria')->references('fld_id')->on('tbl_categoria');		$table->foreign('fld_IDcliente')->references('fld_id')->on('tbl_cliente');		$table->foreign('fld_IDuser')->references('fld_id')->on('tbl_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_cliente_interes');
    }
};
