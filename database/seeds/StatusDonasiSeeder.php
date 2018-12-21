<?php

use Illuminate\Database\Seeder;

class StatusDonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_donasis')->insert([
        	'nama_status' => 'Donasi Dibuat',
        	'keterangan' => 'Donasi telah dibuat'
        ]);

        DB::table('status_donasis')->insert([
        	'nama_status' => 'Donasi Diterima',
        	'keterangan' => 'Donasi telah di terima oleh pihak BPBD'
        ]);

        DB::table('status_donasis')->insert([
        	'nama_status' => 'Menunggu Pencairan',
        	'keterangan' => 'Donasi telah masuk pada rencana pencairan tertanggal 6 Mei 2018'
        ]);

        DB::table('status_donasis')->insert([
        	'nama_status' => 'Telah Dicairkan',
        	'keterangan' => 'Donasi telah dicairkan dan siap disalurkan ke Bencana Gempa Bumi di Pondok Gede, Jakarta'
        ]);

        DB::table('status_donasis')->insert([
        	'nama_status' => 'Telah Disalurkan',
        	'keterangan' => 'Donasi telah tersalurkan'
        ]);
    }
}
