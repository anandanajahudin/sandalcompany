<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            'user_id' => 1,
            'nip' => 12311,
            'department_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 2,
            'nip' => 12312,
            'department_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 3,
            'nip' => 12313,
            'department_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 4,
            'nip' => 12314,
            'department_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 5,
            'nip' => 12315,
            'department_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 6,
            'nip' => 12316,
            'department_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 7,
            'nip' => 12317,
            'department_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 8,
            'nip' => 12318,
            'department_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 9,
            'nip' => 12319,
            'department_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 10,
            'nip' => 12320,
            'department_id' => 5,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 11,
            'nip' => 12321,
            'department_id' => 5,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 12,
            'nip' => 12322,
            'department_id' => 5,
            'created_at' => Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'user_id' => 13,
            'nip' => 12323,
            'department_id' => 5,
            'created_at' => Carbon::now(),
        ]);
    }
}
