<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BencanaSeeder::class);
        $this->call(DonasiSeeder::class);
        $this->call(KebutuhanSeeder::class);
        $this->call(StatusDonasiSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(KriteriaSeeder::class);
    }
}
