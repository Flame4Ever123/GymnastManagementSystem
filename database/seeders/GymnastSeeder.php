<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymnastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gymnasts = [
            [
                'name' => 'Yuji Itadori',
                'category' => 'A',
                'member_id' => 'ABC1001',
                'club_id' => 1,
                'coach_id' => 1,
                'year_of_birth' => 2013,
            ],
            [
                'name' => 'Megumi Fushiguro',
                'category' => 'A',
                'member_id' => 'ABC1002',
                'club_id' => 1,
                'coach_id' => 1,
                'year_of_birth' => 2013,
            ],
            [
                'name' => 'Yuta Okkotsu',
                'category' => 'B',
                'member_id' => 'ABC1003',
                'club_id' => 1,
                'coach_id' => 1,
                'year_of_birth' => 2012,
            ],
            [
                'name' => 'Maki Zenin',
                'category' => 'B',
                'member_id' => 'ABC1004',
                'club_id' => 1,
                'coach_id' => 3,
                'year_of_birth' => 2012,
            ],
            [
                'name' => 'Kinji Hakari',
                'category' => 'C',
                'member_id' => 'ABC1005',
                'club_id' => 1,
                'coach_id' => 3,
                'year_of_birth' => 2011,
            ],
            [
                'name' => 'Nitta Arata',
                'category' => 'A',
                'member_id' => 'ABC1006',
                'club_id' => 2,
                'coach_id' => 2,
                'year_of_birth' => 2013,
            ],
            [
                'name' => 'Mai Zenin',
                'category' => 'B',
                'member_id' => 'ABC1007',
                'club_id' => 2,
                'coach_id' => 2,
                'year_of_birth' => 2012,
            ],
            [
                'name' => 'Todo Aoi',
                'category' => 'C',
                'member_id' => 'ABC1008',
                'club_id' => 2,
                'coach_id' => 2,
                'year_of_birth' => 2011,
            ],

        ];

        DB::table('gymnasts')->insert($gymnasts);
    }
}
