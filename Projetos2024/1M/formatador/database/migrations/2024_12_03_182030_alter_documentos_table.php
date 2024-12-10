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
        Schema::table('documentos', function(Blueprint $table) {
            $table->dropColumn('convidados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos', function(Blueprint $table) {
            $table->bigInteger('convidados')->nullable();
            $table->foreign('convidados')->references('id')->on('users');
        });
    }
};
