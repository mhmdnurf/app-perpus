<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returneds', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_transaksi');
            $table->foreignId('member_id');
            $table->foreignId('book_id');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->date('tgl_kembalikan');
            $table->bigInteger('keterlambatan');
            $table->string('status');
            $table->string('keterangan');
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
        Schema::dropIfExists('returneds');
    }
}
