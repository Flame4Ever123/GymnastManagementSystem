<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coaches = [
            [
                'name' => 'Gojo Satoru',
                'phone' => '01123412',
                'email' => 'gojo@email.com',
                'license_number' => '123',
                'discipline' => 'Jujutsu',
                'home_address' => 'random street',
                'state' => 'Kelantan',
            ],
            [
                'name' => 'Iori Utahime',
                'phone' => '011349912',
                'email' => 'utahime@email.com',
                'license_number' => '321',
                'discipline' => 'Jujutsu',
                'home_address' => 'random street 31',
                'state' => 'Kedah',
            ],
            [
                'name' => 'Yaga Masamichi',
                'phone' => '011349912',
                'email' => 'yaga@email.com',
                'license_number' => '321',
                'discipline' => 'Cursed Doll',
                'home_address' => 'random street 31',
                'state' => 'Kedah',
            ],

        ];

        DB::table('coaches')->insert($coaches);
    }
}
