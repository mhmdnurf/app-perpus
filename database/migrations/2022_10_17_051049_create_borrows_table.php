<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_pinjam')->references('id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('book_id')->references('id')->on('books');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tempo')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('borrows');
    }
}
