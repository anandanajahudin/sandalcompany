<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->insert([
            'nama' => 'Person 1',
            'nilai' => 5,
            'testimoni' => 'No testimonial yet',
            'created_at' => Carbon::now(),
        ]);
        DB::table('testimonials')->insert([
            'nama' => 'Person 2',
            'nilai' => 5,
            'testimoni' => 'No testimonial yet',
            'created_at' => Carbon::now(),
        ]);
        DB::table('testimonials')->insert([
            'nama' => 'Person 3',
            'nilai' => 5,
            'testimoni' => 'No testimonial yet',
            'created_at' => Carbon::now(),
        ]);
        DB::table('testimonials')->insert([
            'nama' => 'Person 4',
            'nilai' => 5,
            'testimoni' => 'No testimonial yet',
            'created_at' => Carbon::now(),
        ]);
        DB::table('testimonials')->insert([
            'nama' => 'Person 5',
            'nilai' => 5,
            'testimoni' => 'No testimonial yet',
            'created_at' => Carbon::now(),
        ]);
    }
}
