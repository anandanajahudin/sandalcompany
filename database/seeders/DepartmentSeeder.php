<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([
            'nama' => 'Akuntansi',
            'deskripsi' => 'Akuntansi',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'IT',
            'deskripsi' => 'Teknik Informatika',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Keamanan',
            'deskripsi' => 'Keamanan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Mekanik',
            'deskripsi' => 'Teknik Mekanikal',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Produksi',
            'deskripsi' => 'Produksi',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Sipil',
            'deskripsi' => 'Teknik Sipil',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Marketing',
            'deskripsi' => 'Marketing',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Kebersihan',
            'deskripsi' => 'Kebersihan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Kreatif',
            'deskripsi' => 'Desain Kreasi Visual',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Admin',
            'deskripsi' => 'Admin',
            'created_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            'nama' => 'Gudang',
            'deskripsi' => 'Gudang',
            'created_at' => Carbon::now(),
        ]);
    }
}
