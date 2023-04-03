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
        Schema::create('tbl_pedidos_detalles', function (Blueprint $table) {
            $table->bigIncrements('fld_id');
            $table->unsignedBigInteger('fld_IDpedido');
            $table->unsignedBigInteger('fld_IDproducto');
            $table->bigInteger('fld_valor');
            $table->integer('fld_cantidad');
            $table->bigInteger('fld_total');
            $table->timestamps();

            $table->foreign('fld_IDpedido')->references('fld_id')->on('tbl_pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fld_IDproducto')->references('fld_id')->on('tbl_productos')->onDelete('restrict')->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_pedidos_detalles', function (Blueprint $table) {
            $table->dropForeign(['fld_IDpedido']);
            $table->dropForeign(['fld_IDproducto']);
        });
        Schema::dropIfExists('tbl_pedidos_detalles');
    }
};
