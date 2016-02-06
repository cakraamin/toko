<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasis', function (Blueprint $table) {
            $table->increments('id_konfirmasi');
            $table->string('nama',100);
            $table->string('email',100);
            $table->string('screen_shoot',100);            
            $table->integer('status');
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
        Schema::drop('konfirmasis');
    }
}
