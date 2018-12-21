<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KriteriaKebutuhans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_kebutuhans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bencana_id')->unsigned()->index();
            $table->integer('beras');
            $table->integer('bubur');
            $table->integer('air');
            $table->integer('obat');
            $table->integer('pembalut');
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
        Schema::dropIfExists('kriteria_kebutuhans');
    }
}
