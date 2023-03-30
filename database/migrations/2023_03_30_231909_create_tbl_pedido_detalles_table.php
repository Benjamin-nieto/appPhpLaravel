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
        Schema::create('tbl_pedido_detalles', function (Blueprint $table) {

		$table->bigIncrements('fld_id');
		$table->bigInteger('fld_IDpedido',10);
		$table->bigInteger('fld_IDproducto',10);
		$table->bigInteger('fld_valor',15);
		$table->integer('fld_cantidad',3);
		$table->bigInteger('fld_total',15);
		$table->primary('fld_id');
		$table->foreign('fld_IDpedido')->references('fld_id')->on('tbl_pedido');		$table->foreign('fld_IDproducto')->references('fld_id')->on('tbl_productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pedido_detalles');
    }
};
