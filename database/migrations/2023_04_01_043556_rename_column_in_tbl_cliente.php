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
        Schema::table('tbl_clientes', function (Blueprint $table) {
            //
            $table->dropColumn('fld_tipo');
            $table->dropColumn('fld_cedula');
            $table->string('fld_tipoDoc', 20);
            $table->string('fld_docIdent', 20)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_clientes', function (Blueprint $table) {
            //
            $table->dropColumn('fld_tipoDoc');
            $table->dropColumn('fld_docIdent');
            $table->string('fld_tipo', 20);
            $table->string('fld_cedula', 20)->nullable();

            
        });
    }
};
