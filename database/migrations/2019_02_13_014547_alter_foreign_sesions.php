<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignSesions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('sesions', function (Blueprint $table) {
		    $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('sesions', function (Blueprint $table) {
		    $table->dropForeign(['sala_id']);
	    });
    }
}
