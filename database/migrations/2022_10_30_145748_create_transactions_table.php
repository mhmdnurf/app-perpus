<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_transaksi')->references('id');
            $table->foreignId('member_id');
            $table->foreignId('book_id');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->date('tgl_kembalikan')->nullable();
            $table->string('keterlambatan')->nullable();
            $table->string('status');
            $table->string('keterangan')->nullable();
            $table->string('denda')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
