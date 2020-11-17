<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('template_id');
            $table->string('nama_lengkap');
            $table->timestamp('tanggal_lahir');
            $table->string('agama');
            $table->string('suku');
            $table->string('tinggi_badan');
            $table->string('status');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('pendidikan_formal');
            $table->string('pendidikan_nonformal');
            $table->string('keahlian_khusus');
            $table->string('motto');
            $table->string('hobi');
            $table->string('latar_belakang');
            $table->string('pengalaman_organisasi');
            $table->string('pengalaman_magang');
            $table->string('soft_skill');
            $table->string('kemampuan_bahasa');

            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
