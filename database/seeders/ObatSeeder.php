<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $namaObat = [
            'Paracetamol', 'Bodrexin', 'Amoxicillin', 'Ibuprofen', 'Antangin',
            'Diapet', 'Komix', 'Mixagrip', 'Panadol', 'Promag',
            'Betadine', 'Bisolvon', 'Minyak Kayu Putih', 'Vicks', 'Tolak Angin',
            'Eurycoma', 'Sanmol', 'Ceterizine', 'Puyer', 'Dulcolax'
        ];

        foreach ($namaObat as $nama) {
            DB::table('obats')->insert([
                'nama' => $nama,
                'jenis_obat' => $faker->randomElement(['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi']),
                'harga_jual' => $faker->numberBetween(10000, 50000),
                'harga_beli' => $faker->numberBetween(5000, 40000),
                'stok' => $faker->numberBetween(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
