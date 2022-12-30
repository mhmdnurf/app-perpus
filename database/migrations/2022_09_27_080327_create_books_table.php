<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('rack_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('rack_id')->references('id')->on('racks');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('isbn');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('pengarang');
            $table->string('tahun');
            $table->string('jumlah');
            $table->string('stok');
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
        Schema::dropIfExists('books');
    }
}
