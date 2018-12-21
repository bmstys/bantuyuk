<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'nama_barang' => 'Uang',
            'satuan' => 'Rupiah',
            'harga' => '1',
            'gambar' => 'barang/barang-1.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Beras',
            'satuan' => 'Kilogram',
            'harga' => '10500',
            'gambar' => 'barang/barang-2.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Popok',
            'satuan' => 'Pack',
            'harga' => '20500',
            'gambar' => 'barang/barang-3.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Indomie',
            'satuan' => 'Dos',
            'harga' => '15500',
            'gambar' => 'barang/barang-4.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Bubur',
            'satuan' => 'Dos',
            'harga' => '18500',
            'gambar' => 'barang/barang-5.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Pembalut',
            'satuan' => 'Pcs',
            'harga' => '21500',
            'gambar' => 'barang/barang-6.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Gula',
            'satuan' => 'Kilogram',
            'harga' => '25000',
            'gambar' => 'barang/barang-7.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Air',
            'satuan' => 'Liter',
            'harga' => '5000',
            'gambar' => 'barang/barang-8.png'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'Obat',
            'satuan' => 'Pcs',
            'harga' => '15000',
            'gambar' => 'barang/barang-9.png'
        ]);
    }
}
