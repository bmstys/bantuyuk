<?php

use Illuminate\Database\Seeder;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donasis')->insert([
            'bencana_id' => '1',
            'open' => '2000-01-30 00:00:00',
            'close' => '2000-04-30 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '2',
            'open' => '2001-02-12 00:00:00',
            'close' => '2001-05-12 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '3',
            'open' => '2002-02-28 00:00:00',
            'close' => '2018-12-01 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '4',
            'open' => '2002-03-04 00:00:00',
            'close' => '2018-12-01 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '5',
            'open' => '2002-04-03 00:00:00',
            'close' => '2018-12-01 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '6',
            'open' => '2001-02-12 00:00:00',
            'close' => '2019-07-01 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '7',
            'open' => '2002-02-28 00:00:00',
            'close' => '2019-07-02 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '8',
            'open' => '2002-03-04 00:00:00',
            'close' => '2019-07-03 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '9',
            'open' => '2002-04-03 00:00:00',
            'close' => '2019-08-03 00:00:00'
        ]);

        DB::table('donasis')->insert([
            'bencana_id' => '10',
            'open' => '2002-04-03 00:00:00',
            'close' => '2019-08-03 00:00:00'
        ]);
    }
}
