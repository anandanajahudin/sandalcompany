<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
