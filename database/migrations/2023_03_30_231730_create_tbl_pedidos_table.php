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
        Schema::create('tbl_pedidos', function (Blueprint $table) {
            $table->id('fld_id');
            $table->bigInteger('fld_referencia')->unique();
            $table->foreignId('fld_IDcliente')->constrained('tbl_clientes', 'fld_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fld_IDusuario')->constrained('tbl_usuarios', 'fld_id');
            $table->bigInteger('fld_total');
            $table->enum('fld_estado', ['0', '1', '2'])->comment('0=Pendiente, 1=Pagado, 2=Cancelado');
            $table->dateTime('fld_registro');
            $table->dateTime('fld_UpdateFecha')->nullable();
            $table->bigInteger('fld_UpdateUser')->nullable()->unsigned();
            $table->foreign('fld_UpdateUser')->references('fld_id')->on('tbl_usuarios')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_pedidos');
    }
};
