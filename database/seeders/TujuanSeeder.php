<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $tujuans = [
            'Kamar 01', 'Kamar 02', 'Kamar 03', 'Kamar 04', 'Kamar 05',
            'UGD', 'IGD', 'Laboratorium', 'Radiologi', 'Apotek',
            'Poliklinik Umum', 'Poliklinik Gigi', 'Poliklinik Anak', 'Poliklinik Jantung', 'Poliklinik Mata',
            'Poliklinik THT', 'Poliklinik Kulit', 'Kantor Administrasi', 'Ruang Tunggu', 'Ruang Operasi'
        ];

        foreach ($tujuans as $tujuan) {
            DB::table('tujuans')->insert([
                'nama' => $tujuan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
