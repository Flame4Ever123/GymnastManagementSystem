<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = [
            [
                'club_name' => 'Tokyo Jujutsu High',
                'description' => 'Located in Tokyo, it is one of only two jujutsu educational institutions in Japan dedicated to fostering the next generation of jujutsu sorcerers.',
                'address' => 'Sanchome, Budodo-dori 12345',
                'state' => 'Tokyo',
                'country' => 'Japan',
            ],
            [
                'club_name' => 'Kyoto Jujutsu High',
                'description' => 'Located in Kyoto, it is one of only two jujutsu educational institutions in Japan dedicated to fostering the next generation of jujutsu sorcerers.',
                'address' => 'Kyoto Budodo-dori 45678',
                'state' => 'Kyoto',
                'country' => 'Japan',
            ],
        ];

        $club_coaches = [
            //gojo
            [
                'coach_id' =>1,
                'club_id' => 1,
            ],
            //utahime
            [
                'coach_id' =>2,
                'club_id' =>2,
            ],
            //yaga
            [
                'coach_id' =>3,
                'club_id' =>1,
            ],
        ];

        DB::table('clubs')->insert($clubs);
        DB::table('club_has_coaches')->insert($club_coaches);

    }
}
