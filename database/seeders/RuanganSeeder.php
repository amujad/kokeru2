<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruang = [
            [
                'nama' => 'A101',
                'cs_id' => 11,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A102',
                'cs_id' => 12,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A103',
                'cs_id' => 13,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A201',
                'cs_id' => 14,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A202',
                'cs_id' => 15,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A203',
                'cs_id' => 16,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A204',
                'cs_id' => 17,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A301',
                'cs_id' => 18,
                'status' => 'Belum'
            ],
            [
                'nama' => 'A302',
                'cs_id' => 19,
                'status' => 'Belum'
            ],[
                'nama' => 'A303',
                'cs_id' => 20,
                'status' => 'Belum'
            ],[
                'nama' => 'A304',
                'cs_id' => 11,
                'status' => 'Belum'
            ],[
                'nama' => 'A305',
                'cs_id' => 12,
                'status' => 'Belum'
            ],
        ];
        Schema::disableForeignKeyConstraints();
        foreach ($ruang as $key=>$value) {
            DB::table('ruangan')->insert([
                $key => $value,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
