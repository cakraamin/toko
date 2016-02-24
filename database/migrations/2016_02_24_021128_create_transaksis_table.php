<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->string('nama',200);
            $table->string('telp',15);
            $table->string('email',100);
            $table->text('alamat');
            $table->string('kode_transaksi',10); 
            $table->integer('tujuan');
            $table->string('via',10);
            $table->string('total',100);
            $table->string('paket',100);
            $table->string('ongkir',100);
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
        Schema::drop('transaksis');
    }
}
