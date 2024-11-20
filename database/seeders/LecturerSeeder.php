<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        for($i = 0; $i < 20; $i++){
            $faker = Faker::create('id_ID');
        DB::table('lecturers')
            ->insert([
                'nidn' => rand(1111111111,9999999999),
                'firstname' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'department_id' => rand(1,3),
            ]);
        }
        
    }
}
