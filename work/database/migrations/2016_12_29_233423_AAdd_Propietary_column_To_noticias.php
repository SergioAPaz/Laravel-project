<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AAddPropietaryColumnToNoticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
     public function up()
    {
        //
          Schema::table('noticias', function($table) {
        $table->string('Propietary');
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
         Schema::table('noticias', function($table) {
        $table->dropColumn('Propietary');
    });
    }
}
