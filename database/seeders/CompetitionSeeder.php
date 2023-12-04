<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitions = [
            [
                'name' => "2023 Tokyo-Kyoto Goodwill Event",
                'start_date' => '2023-08-01',
                'end_date' => '2023-08-01',
            ],
            [
                'name' => "2024 Tokyo-Kyoto Goodwill Event",
                'start_date' => '2024-08-01',
                'end_date' => '2024-08-01',
            ],
        ];
        $competition_categories = [
            // 2023 event
            [
                'competition_id' => 1,
                'category' => 'A',
            ],

            [
                'competition_id' => 1,
                'category' => 'B',
            ],

            [
                'competition_id' => 1,
                'category' => 'C',
            ],
            // 2024 event
            [
                'competition_id' => 2,
                'category' => 'A',
            ],

            [
                'competition_id' => 2,
                'category' => 'B',
            ],

            [
                'competition_id' => 2,
                'category' => 'C',
            ],

        ];


        $competition_gymnasts_2023 = [
            //yuta
            [
                'gymnast_id' => 3,
                'competition_category' => 1,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //maki
            [
                'gymnast_id' => 4,
                'competition_category' => 1,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //mai
            [
                'gymnast_id' => 7,
                'competition_category' => 1,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //hakari
            [
                'gymnast_id' => 5,
                'competition_category' => 2,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //todo
            [
                'gymnast_id' => 8,
                'competition_category' => 2,
                'total_ranking' => 1,
                'total_score' => 1,
            ],

        ];

        $competition_gymnasts_2024 = [
            //Year 1 students
            //yuji
            [
                'gymnast_id' => 1,
                'competition_category' => 4,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //megumi
            [
                'gymnast_id' => 2,
                'competition_category' => 4,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //arata
            [
                'gymnast_id' => 6,
                'competition_category' => 4,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //Year 1 students

            //Year 2 students
            //yuta
            [
                'gymnast_id' => 3,
                'competition_category' => 5,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //maki
            [
                'gymnast_id' => 4,
                'competition_category' => 5,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //mai
            [
                'gymnast_id' => 7,
                'competition_category' => 5,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //Year 2 students

            //Year 3 students
            //hakari
            [
                'gymnast_id' => 5,
                'competition_category' => 6,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //todo
            [
                'gymnast_id' => 8,
                'competition_category' => 6,
                'total_ranking' => 1,
                'total_score' => 1,
            ],
            //Year 3 students
        ];

        $competition_task_2023 = [
            //year 1 cursed technique
            //yuta
            [
                'gymnast_competition_id' => 1,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 1,
                'apparatus_score' => '100',
            ],
            //maki
            [
                'gymnast_competition_id' => 2,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 3,
                'apparatus_score' => '0',
            ],
            //mai
            [
                'gymnast_competition_id' => 3,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 2,
                'apparatus_score' => '35',
            ],


            //year 1 h2h combat
            [
                'gymnast_competition_id' => 1,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 2,
                'apparatus_score' => '55',
            ],
            //maki
            [
                'gymnast_competition_id' => 2,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 1,
                'apparatus_score' => '90',
            ],
            //mai
            [
                'gymnast_competition_id' => 3,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 3,
                'apparatus_score' => '45',
            ],

            //year 2 cursed technique
            //hakari
            [
                'gymnast_competition_id' => 4,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 2,
                'apparatus_score' => '65',
            ],
            //todo
            [
                'gymnast_competition_id' => 5,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 1,
                'apparatus_score' => '80',
            ],
            //year 2 h2h combat
            //hakari
            [
                'gymnast_competition_id' => 4,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 2,
                'apparatus_score' => '85',
            ],
            //todo
            [
                'gymnast_competition_id' => 5,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 1,
                'apparatus_score' => '93',
            ],
        ];

        $competition_task_2024 = [
            //year 1 cursed technique
            //yuji
            [
                'gymnast_competition_id' => 6,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 3,
                'apparatus_score' => '20',
            ],
            //megumi
            [
                'gymnast_competition_id' => 7,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 1,
                'apparatus_score' => '75',
            ],
            //arata
            [
                'gymnast_competition_id' => 8,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 2,
                'apparatus_score' => '55',
            ],

            //year 1 hand to hand
            //yuji
            [
                'gymnast_competition_id' => 6,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 1,
                'apparatus_score' => '85',
            ],
            //megumi
            [
                'gymnast_competition_id' => 7,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 2,
                'apparatus_score' => '75',
            ],
            //arata
            [
                'gymnast_competition_id' => 8,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 3,
                'apparatus_score' => '25',
            ],
        
            //year 2 cursed technique
            //yuta
            [
                'gymnast_competition_id' => 9,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 1,
                'apparatus_score' => '100',
            ],
            //maki
            [
                'gymnast_competition_id' => 10,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 3,
                'apparatus_score' => '0',
            ],
            //mai
            [
                'gymnast_competition_id' => 11,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 2,
                'apparatus_score' => '45',
            ],


            //year 2 h2h combat
            //yuta
            [
                'gymnast_competition_id' => 9,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 2,
                'apparatus_score' => '85',
            ],
            //maki
            [
                'gymnast_competition_id' => 10,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 1,
                'apparatus_score' => '95',
            ],
            //mai
            [
                'gymnast_competition_id' => 11,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 3,
                'apparatus_score' => '50',
            ],

            //year 3 cursed technique
            //hakari
            [
                'gymnast_competition_id' => 12,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 2,
                'apparatus_score' => '85',
            ],
            //todo
            [
                'gymnast_competition_id' => 13,
                'apparatus' => "cursed technique",
                'apparatus_ranking' => 1,
                'apparatus_score' => '90',
            ],
            //year 3 h2h combat
            //hakari
            [
                'gymnast_competition_id' => 12,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 1,
                'apparatus_score' => '95',
            ],
            //todo
            [
                'gymnast_competition_id' => 13,
                'apparatus' => "hand to hand",
                'apparatus_ranking' => 1,
                'apparatus_score' => '95',
            ],
        ];

        DB::table('competitions')->insert($competitions);
        DB::table('competition_categories')->insert($competition_categories);
        DB::table('gymnast_has_competitions')->insert($competition_gymnasts_2023);
        DB::table('gymnast_has_competitions')->insert($competition_gymnasts_2024);
        DB::table('gymnast_competition_has_apparatuses')->insert($competition_task_2023);
        DB::table('gymnast_competition_has_apparatuses')->insert($competition_task_2024);
    }
}
