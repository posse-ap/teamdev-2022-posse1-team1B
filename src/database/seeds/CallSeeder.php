<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calls')->truncate();

        $params = [
            [
                'thread_id' => 1, 
                'user_id' => 1, 
                'solver_id' => 2, 
                'confirmed_interview_date' => '2022-05-21 22:00:00',
                'call_start_time' => '2022-05-21 22:00:00',
                'call_end_time' => '2022-05-21 22:10:00',
                'is_complete' => true,
                'evaluation' => true,
            ],
            [
                'thread_id' => 2,
                'user_id' => 1, 
                'solver_id' => 4, 
                'confirmed_interview_date' => '2022-05-23 12:00:00',
                'call_start_time' => '2022-05-21 12:00:00',
                'call_end_time' => '2022-05-21 12:03:00',
                'is_complete' => false,
                'evaluation' => false,
            ],
            [
                'thread_id' => 3,
                'user_id' => 1, 
                'solver_id' => 5, 
                'confirmed_interview_date' => null,
                'call_start_time' => null,
                'call_end_time' => null,
                'is_complete' => null,
                'evaluation' => null,
            ],
            [
                'thread_id' => 4,
                'user_id' => 1, 
                'solver_id' => 6, 
                'confirmed_interview_date' => '2022-04-21 12:00:00',
                'call_start_time' => '2022-04-21 12:00:00',
                'call_end_time' => '2022-04-21 12:10:00',
                'is_complete' => true,
                'evaluation' => false,
            ],
            [
                'thread_id' => 4,
                'user_id' => 5, 
                'solver_id' => 2, 
                'confirmed_interview_date' => '2022-04-21 12:00:00',
                'call_start_time' => '2022-04-21 12:00:00',
                'call_end_time' => '2022-04-21 12:10:00',
                'is_complete' => true,
                'evaluation' => false,
            ],
        ];
        DB::table('calls')->insert($params);
    }
}