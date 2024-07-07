<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $companies = [
            'Unilever Indonesia', 'Kimia Farma', 'Kalbe Farma', 'Indofood', 'Gudang Garam',
            'Bintang Toedjoe', 'Sido Muncul', 'Bio Farma', 'Darya-Varia', 'Pharos Indonesia',
            'AstraZeneca Indonesia', 'Sanbe Farma', 'Tempo Scan Pacific', 'Soho Global Health', 'Novell Pharmaceutical',
            'Pfizer Indonesia', 'Merck Indonesia', 'Mandom Indonesia', 'Mayora Indah', 'Enesis Group'
        ];

        foreach ($companies as $company) {
            DB::table('supliers')->insert([
                'nama' => $company,
                'alamat' => $faker->address,
                'kota' => $faker->city,
                'notlp' => $faker->phoneNumber,
                'nama_bank' => $faker->randomElement(['Bank Mandiri', 'Bank BCA', 'Bank BNI', 'Bank BRI', 'Bank CIMB Niaga']),
                'no_rekening' => $faker->bankAccountNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
