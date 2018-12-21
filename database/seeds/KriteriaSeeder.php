<?php

use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '1',
        	'beras' => '100',
        	'air' => '100',
        	'bubur' => '50',
        	'pembalut' => '75',
        	'obat' => '80'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '2',
        	'beras' => '120',
        	'air' => '500',
        	'bubur' => '50',
        	'pembalut' => '80',
        	'obat' => '30'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '3',
        	'beras' => '80',
        	'air' => '340',
        	'bubur' => '50',
        	'pembalut' => '40',
        	'obat' => '41'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '4',
        	'beras' => '80',
        	'air' => '401',
        	'bubur' => '50',
        	'pembalut' => '40',
        	'obat' => '53'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '5',
        	'beras' => '80',
        	'air' => '415',
        	'bubur' => '50',
        	'pembalut' => '40',
        	'obat' => '96'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '6',
        	'beras' => '75',
        	'air' => '94',
        	'bubur' => '50',
        	'pembalut' => '80',
        	'obat' => '94'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '7',
        	'beras' => '170',
        	'air' => '97',
        	'bubur' => '50',
        	'pembalut' => '79',
        	'obat' => '64'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '8',
        	'beras' => '90',
        	'air' => '230',
        	'bubur' => '50',
        	'pembalut' => '40',
        	'obat' => '68'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '9',
        	'beras' => '92',
        	'air' => '340',
        	'bubur' => '50',
        	'pembalut' => '40',
        	'obat' => '80'
        ]);

        DB::table('kriteria_kebutuhans')->insert([
        	'bencana_id' => '10',
        	'beras' => '76',
        	'air' => '102',
        	'bubur' => '83',
        	'pembalut' => '98',
        	'obat' => '64'
        ]);
    }
}
