<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('detail_profile')->insert([
           'address'=>'Jember',
           'nomor_tlp'=>'08xxxxx',
           'ttl'=>'2005-08-09',
           'foto'=>'picture.png'
        ]);
    }
}
