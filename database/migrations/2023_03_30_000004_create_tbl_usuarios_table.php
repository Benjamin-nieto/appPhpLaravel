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
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->id('fld_id');
            $table->unsignedBigInteger('fld_IDrol');
            $table->string('fld_nombre', 60);
            $table->string('fld_correo', 60)->unique();
            $table->string('fld_clave', 60);
            $table->enum('fld_estado', ['0', '1']);
            $table->dateTime('fld_registro');
            //    $table->unsignedBigInteger('fld_IDuser');
            $table->dateTime('fld_update');
            //$table->unsignedBigInteger('fld_UpdateUser');

            $table->foreign('fld_IDrol')->references('fld_id')->on('tbl_roles');
            //  $table->foreign('fld_IDuser')->references('fld_id')->on('tbl_users');
            //  $table->foreign('fld_UpdateUser')->references('fld_id')->on('tbl_users');

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
        Schema::dropIfExists('tbl_usuarios');
    }
};
