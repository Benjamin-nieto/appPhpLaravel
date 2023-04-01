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
            $table->id('fld_id');
            $table->string('fld_nombre', 50);
            $table->string('fld_apellido', 50);
            $table->string('fld_correo', 60)->nullable();
            $table->string('fld_pais', 60);
            $table->string('fld_departamento', 60);
            $table->string('fld_ciudad', 60);
            $table->string('fld_direccion', 60)->nullable();
            $table->string('fld_tipo', 20);
            $table->string('fld_cedula', 20)->nullable();
            $table->date('fld_nacimiento')->nullable();
            $table->string('fld_estado', 60);
            $table->enum('fld_hijos', ['0', '1']);
            $table->unsignedSmallInteger('fld_numero')->nullable();
            $table->timestamp('fld_registro')->useCurrent();
            $table->foreignId('fld_IDuser')->constrained('tbl_usuarios', 'fld_id');
            $table->foreignId('fld_UpdateUser')->nullable()->constrained('tbl_usuarios', 'fld_id');
            $table->timestamp('fld_UpdateFecha')->nullable();
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
