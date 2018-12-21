<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'bamasatya',
        	'password' => bcrypt('bamasatya'),
        	'nama' => 'Bamasatya Hendraprasta',
        	'status' => 'donatur',
        	'nik' => '1234567891234567',
        	'alamat' => 'Jalan KH Ahmad Dahlan',
        	'noHp' => '08123456789',
        	'namaRek' => 'Bamasatya',
        	'noRek' => '112233445566778899'
        ]);

        DB::table('users')->insert([
            'username' => 'donatur',
            'password' => bcrypt('donatur'),
            'nama' => 'Donatur Bencana',
            'status' => 'donatur',
            'nik' => '1122337891234567',
            'alamat' => 'Jalan Donatur Baru',
            'noHp' => '01122356789',
            'namaRek' => 'Donatur Bencana',
            'noRek' => '122233345556777899'
        ]);

        DB::table('users')->insert([
            'username' => 'bpbd',
            'password' => bcrypt('bpbdbpbd'),
            'nama' => 'Badan Penanggulangan Bencana Daerah',
            'status' => 'bpbd',
            'nik' => '1122233344556677',
            'alamat' => 'Jalan Kaliurang Km 20',
            'noHp' => '02748951632',
            'namaRek' => 'BPBD Peduli Bencana',
            'noRek' => '123456789123123123'
        ]);
    }
}