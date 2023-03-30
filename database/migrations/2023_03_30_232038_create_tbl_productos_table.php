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

		$table->bigIncrements('fld_id');
		$table->bigInteger('fld_IDcat',10);
		$table->string('fld_nombre',100);
		$table->string('fld_descripcion',300);
		$table->bigInteger('fld_valor',12);
		$table->enum('fld_estado',['1','0'])->default('1');
		$table->datetime('fld_registro');
		$table->bigInteger('fld_IDuser',10);
		$table->datetime('fld_UpdateFecha')->nullable()->default('NULL');
		$table->bigInteger('fld_UpdateUser',10)->nullable()->default('NULL');
		$table->primary('fld_id');
		$table->foreign('fld_IDcat')->references('fld_id')->on('tbl_productos_cat');
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
