<?php

use Illuminate\Database\Seeder;

class BencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bencanas')->insert([
            'nama' => 'Banjir Bandang',
            'tanggal' => '2000-01-30 00:00:00',
            'lokasi' => 'Pondok Gede, Jakarta',
            'jml_korban' => '158',
            'gambar_bencana' => 'bencana/bencana-1.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Gempa Bumi',
            'tanggal' => '2001-02-12 00:00:00',
            'lokasi' => 'Malang, Jawa Timur',
            'jml_korban' => '112',
            'gambar_bencana' => 'bencana/bencana-2.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Letusan Merapi',
            'tanggal' => '2001-02-28 00:00:00',
            'lokasi' => 'Sleman, Yogyakarta',
            'jml_korban' => '123',
            'gambar_bencana' => 'bencana/bencana-3.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Tsunami',
            'tanggal' => '2002-03-04 00:00:00',
            'lokasi' => 'Jaya Pura, Papua',
            'jml_korban' => '101',
            'gambar_bencana' => 'bencana/bencana-4.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Tornado',
            'tanggal' => '2002-04-03 00:00:00',
            'lokasi' => 'Aceh, Sulawesi Utara',
            'jml_korban' => '80',
            'gambar_bencana' => 'bencana/bencana-5.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Letusan Gunung Hawaii',
            'tanggal' => '2005-02-28 00:00:00',
            'lokasi' => 'Terban, Yogyakarta',
            'jml_korban' => '98',
            'gambar_bencana' => 'bencana/bencana-6.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Gempa Jepang',
            'tanggal' => '2006-03-04 00:00:00',
            'lokasi' => 'Jaya Pura, Papua',
            'jml_korban' => '164',
            'gambar_bencana' => 'bencana/bencana-7.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Bom Nagasaki dan Hirosima',
            'tanggal' => '2012-04-03 00:00:00',
            'lokasi' => 'Jaya Pura, Papua',
            'jml_korban' => '200',
            'gambar_bencana' => 'bencana/bencana-8.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Banjir',
            'tanggal' => '2013-03-04 00:00:00',
            'lokasi' => 'Timika, Papua',
            'jml_korban' => '432',
            'gambar_bencana' => 'bencana/bencana-9.png'
        ]);

        DB::table('bencanas')->insert([
            'nama' => 'Gunung Tambora',
            'tanggal' => '2014-04-03 00:00:00',
            'lokasi' => 'NTB, Papua',
            'jml_korban' => '250',
            'gambar_bencana' => 'bencana/bencana-10.png'
        ]);
    }
}
