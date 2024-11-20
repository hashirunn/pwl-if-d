<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $departments = [
            [
                'id' => '1',
                'code' => '22201'
            ],
            [
                'id' => '2',
                'code' => '26201'
            ],
            [
                'id' => '3',
                'code' => '55201'
            ],
        ];
        
        for($i = 0; $i < 50; $i++){
            $department = DB::table('departments')->inRandomOrder()->value('id', 'code');
            $year_entry = rand(2018, 2024);
            $npm = substr($department['code'], 0, 5).substr($year_entry, -2) . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

            DB::table('students')->insert([
                'npm' => $npm,
                'fullname' => $faker->name(),
                'year_entry' => $year_entry,
                'group' => $faker->randomElement(['A', 'B', 'C', 'D', 'NR']),
                'nidn' => DB::table('lecturers')->inRandomOrder()->value('nidn'),
                'department_id' => $department['id']
            ]);
        }
    }

}
