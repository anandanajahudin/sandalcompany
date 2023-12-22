<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'kode_produk' => 'P0001',
            'nama_produk' => 'Bersantai',
            'harga_pokok' => 10000,
            'harga_jual' => 12000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'kode_produk' => 'P0002',
            'nama_produk' => 'Berkarya',
            'harga_pokok' => 11000,
            'harga_jual' => 13000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'kode_produk' => 'P0003',
            'nama_produk' => 'Karnaval',
            'harga_pokok' => 14000,
            'harga_jual' => 17000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'kode_produk' => 'P0004',
            'nama_produk' => 'Kenangan',
            'harga_pokok' => 13000,
            'harga_jual' => 15000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'kode_produk' => 'P0005',
            'nama_produk' => 'Awesome',
            'harga_pokok' => 14000,
            'harga_jual' => 19000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'kode_produk' => 'P0006',
            'nama_produk' => 'Wonderful',
            'harga_pokok' => 10000,
            'harga_jual' => 12000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'kode_produk' => 'P0007',
            'nama_produk' => 'Holiday',
            'harga_pokok' => 10000,
            'harga_jual' => 12000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'kode_produk' => 'P0008',
            'nama_produk' => 'Amazing',
            'harga_pokok' => 12000,
            'harga_jual' => 15000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'kode_produk' => 'P0009',
            'nama_produk' => 'Perfecto',
            'harga_pokok' => 11000,
            'harga_jual' => 13000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'kode_produk' => 'P0010',
            'nama_produk' => 'All New',
            'harga_pokok' => 14000,
            'harga_jual' => 18000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'kode_produk' => 'P0011',
            'nama_produk' => 'Boss',
            'harga_pokok' => 18000,
            'harga_jual' => 25000,
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'kode_produk' => 'P0012',
            'nama_produk' => 'Great',
            'harga_pokok' => 12000,
            'harga_jual' => 14000,
            'created_at' => Carbon::now(),
        ]);
    }
}
