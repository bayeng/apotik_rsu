<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supliers')->insert([
           'nama'=>'Unilever',
            'alamat'=>'ini alamat desa padang',
            'kota'=>'ini merupakan kota',
            'notlp'=>'0988090009',
            'nama_bank'=>'bank kunam',
            'no_rekening'=>'090808098',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('supliers')->insert([
            'nama'=>'Unilever2',
            'alamat'=>'ini alamat desa padang',
            'kota'=>'ini merupakan kota',
            'notlp'=>'0988090009',
            'nama_bank'=>'bank kunam',
            'no_rekening'=>'090808098',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('supliers')->insert([
            'nama'=>'Unilever3',
            'alamat'=>'ini alamat desa padang',
            'kota'=>'ini merupakan kota',
            'notlp'=>'0988090009',
            'nama_bank'=>'bank kunam',
            'no_rekening'=>'090808098',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
