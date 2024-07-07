<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\table;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'nama' => $faker->name,
            'jenis_kelamin' => $faker->boolean,
            'tempat_lahir' => $faker->city,
            'tgl_lahir' => $faker->date(),
            'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
            'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu']),
            'alamat' => $faker->address,
            'notlp' => $faker->phoneNumber,
            'nip' => $faker->unique()->numberBetween(1000000000, 9999999999),
            'username' => 'admin',
            'password' => Hash::make('123'),
            'role' => $faker->randomElement(['ADMIN']),
//                'email' => $faker->unique()->safeEmail,
//                'email_verified_at' => now(),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'nama' => $faker->name,
            'jenis_kelamin' => $faker->boolean,
            'tempat_lahir' => $faker->city,
            'tgl_lahir' => $faker->date(),
            'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
            'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu']),
            'alamat' => $faker->address,
            'notlp' => $faker->phoneNumber,
            'nip' => $faker->unique()->numberBetween(1000000000, 9999999999),
            'username' => 'pegawai',
            'password' => Hash::make('123'),
            'role' => $faker->randomElement(['PEGAWAI']),
//                'email' => $faker->unique()->safeEmail,
//                'email_verified_at' => now(),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach (range(1, 20) as $index) {
            DB::table('users')->insert([
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->boolean,
                'tempat_lahir' => $faker->city,
                'tgl_lahir' => $faker->date(),
                'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu']),
                'alamat' => $faker->address,
                'notlp' => $faker->phoneNumber,
                'nip' => $faker->unique()->numberBetween(1000000000, 9999999999),
                'username' => $faker->unique()->userName,
                'password' => Hash::make('123'),
                'role' => $faker->randomElement(['PEGAWAI']),
//                'email' => $faker->unique()->safeEmail,
//                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
