<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_alarmas', function (Blueprint $table) {
            $table->bigIncrements('fld_id');
            $table->bigInteger('fld_IDcliente')->unsigned();
            $table->bigInteger('fld_IDusuario')->unsigned();
            $table->date('fld_fecha');
            $table->text('fld_observacion');
            $table->datetime('fld_registro');
            $table->foreign('fld_IDcliente')->references('fld_id')->on('tbl_clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fld_IDusuario')->references('fld_id')->on('tbl_usuarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_alarmas');
    }
};