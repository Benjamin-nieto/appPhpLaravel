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
            $table->id('fld_id');
            $table->foreignId('fld_IDcliente')->constrained('tbl_clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fld_IDcategoria')->constrained('tbl_categorias');
            $table->text('fld_observacion')->nullable();
            $table->dateTime('fld_fecha');
            $table->foreignId('fld_IDuser')->constrained('tbl_usuarios');
            $table->dateTime('fld_UpdateFecha')->nullable();
            $table->foreignId('fld_UpdateUser')->nullable()->constrained('tbl_usuarios');
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
        Schema::dropIfExists('tbl_cliente_interes');
    }
};
