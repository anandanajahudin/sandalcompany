<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_categories')->insert([
            'kode_kategori' => 'K001',
            'nama_kategori' => 'Daily',
            'created_at' => Carbon::now(),
        ]);

        DB::table('product_categories')->insert([
            'kode_kategori' => 'K002',
            'nama_kategori' => 'Hiking',
            'created_at' => Carbon::now(),
        ]);

        DB::table('product_categories')->insert([
            'kode_kategori' => 'K003',
            'nama_kategori' => 'Safety',
            'created_at' => Carbon::now(),
        ]);

        DB::table('product_categories')->insert([
            'kode_kategori' => 'K004',
            'nama_kategori' => 'Traveling',
            'created_at' => Carbon::now(),
        ]);
    }
}
