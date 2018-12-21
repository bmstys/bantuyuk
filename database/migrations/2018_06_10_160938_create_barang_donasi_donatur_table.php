<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangDonasiDonaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_donasi_donatur', function (Blueprint $table) {
            $table->integer('donasi_donatur_id')->unsigned()->index();
            $table->integer('barang_id')->unsigned()->index();
            $table->integer('donasi_id')->unsigned()->index();
            $table->unsignedInteger('jumlah');
            // $table->primary(['donasi_donatur_id', 'barang_id']);
            // $table->primary(['donasi_donatur_id', 'barang_id', 'donasi_id']);
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
        Schema::dropIfExists('barang_donasi_donatur');
    }
}
