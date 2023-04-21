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
        //
        Schema::table('tbl_productos_cat', function (Blueprint $table) {
            $table->string('fld_nombre',60);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::table('tbl_productos_cat', function (Blueprint $table) {
            $table->dropColumn('fld_nombre');
        });
    }
};
