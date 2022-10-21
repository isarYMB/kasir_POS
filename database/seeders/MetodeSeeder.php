<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metode')->insert([
            "metode_bayar" => "Tunai"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Rek BRI"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Rek BNI"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Rek BCA"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Rek Mandiri"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Rek Lainnya"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "SopeePay"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Gopay"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "OVO"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Dana"
        ]);

        DB::table('metode')->insert([
            "metode_bayar" => "Via Lainnya"
        ]);
    }
}
