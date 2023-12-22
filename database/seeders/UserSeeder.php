<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '0811223344',
            'kota' => 'Pasuruan',
            'alamat' => 'Pasuruan',
            'created_at' => Carbon::now(),
        ]);

        // Employee
        DB::table('users')->insert([
            'nama' => 'Aisyah',
            'email' => 'aisyah@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236172',
            'kota' => 'Sidoarjo',
            'alamat' => 'Sidoarjo',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Doni',
            'email' => 'doni@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236173',
            'kota' => 'Sidoarjo',
            'alamat' => 'Sidoarjo',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Bagas',
            'email' => 'bagas@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236174',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Bagus',
            'email' => 'bagus@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236175',
            'kota' => 'Sidoarjo',
            'alamat' => 'Sidoarjo',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Dedi',
            'email' => 'dedi@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236176',
            'kota' => 'Sidoarjo',
            'alamat' => 'Pasuruan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Ilham',
            'email' => 'ilham@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236177',
            'kota' => 'Pasuruan',
            'alamat' => 'Pasuruan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Joni',
            'email' => 'joni@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236178',
            'kota' => 'Pasuruan',
            'alamat' => 'Pasuruan',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Fatih',
            'email' => 'fatih@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236179',
            'kota' => 'Sidoarjo',
            'alamat' => 'Sidoarjo',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Gio',
            'email' => 'gio@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236180',
            'kota' => 'Mojokerto',
            'alamat' => 'Mojokerto',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Rio',
            'email' => 'rio@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236181',
            'kota' => 'Mojokerto',
            'alamat' => 'Mojokerto',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Dimas',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236182',
            'kota' => 'Malang',
            'alamat' => 'Malang',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Samsul',
            'email' => 'samsul@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236183',
            'kota' => 'Sidoarjo',
            'alamat' => 'Sidoarjo',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Zaka',
            'email' => 'zaka@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'employee',
            'telp' => '081236184',
            'kota' => 'Malang',
            'alamat' => 'Malang',
            'created_at' => Carbon::now(),
        ]);

        // Customer
        DB::table('users')->insert([
            'nama' => 'Anton',
            'email' => 'anton@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'telp' => '0812313882',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Franky',
            'email' => 'franky@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'telp' => '081236127382',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Pandu',
            'email' => 'pandu@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'telp' => '08123198322',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Hasan',
            'email' => 'hasan@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'telp' => '08516312836',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Galang',
            'email' => 'galang@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'telp' => '085126372163',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'Ferry',
            'email' => 'ferry@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'telp' => '08123263782',
            'kota' => 'Surabaya',
            'alamat' => 'Surabaya',
            'created_at' => Carbon::now(),
        ]);
    }
}
