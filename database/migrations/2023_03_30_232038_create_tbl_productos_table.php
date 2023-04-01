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
        Schema::create('tbl_productos', function (Blueprint $table) {
            $table->id('fld_id');
            $table->foreignId('fld_IDcat')->constrained('tbl_productos_cat', 'fld_id');
            $table->string('fld_nombre', 100);
            $table->string('fld_descripcion', 300);
            $table->bigInteger('fld_valor');
            $table->enum('fld_estado', ['1', '0'])->default('1')->comment('1=Activo, 0=Inactivo');
            $table->dateTime('fld_registro');
            $table->foreignId('fld_IDuser')->constrained('tbl_usuarios', 'fld_id');
            $table->dateTime('fld_UpdateFecha')->nullable();
            $table->foreignId('fld_UpdateUser')->nullable()->constrained('tbl_usuarios', 'fld_id');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_productos');
    }
};
