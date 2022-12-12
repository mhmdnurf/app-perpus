<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_anggota')->references('id');
            $table->string('nama');
            $table->string('nis');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('kelas');
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
