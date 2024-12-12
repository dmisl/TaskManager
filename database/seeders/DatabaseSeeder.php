<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks before truncating tables
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Truncate tables if they exist
        DB::table('cache')->truncate();
        DB::table('cache_locks')->truncate();
        DB::table('checks')->truncate();
        DB::table('comments')->truncate();
        DB::table('days')->truncate();
        DB::table('failed_jobs')->truncate();
        DB::table('goals')->truncate();
        DB::table('job_batches')->truncate();
        DB::table('jobs')->truncate();
        DB::table('migrations')->truncate();
        DB::table('password_reset_tokens')->truncate();
        DB::table('sessions')->truncate();
        DB::table('tasks')->truncate();
        DB::table('users')->truncate();
        DB::table('weeks')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');


        DB::table('users')->insert([
            ['id' => 1, 'name' => 'User 1', 'email' => 'user1@example.com', 'password' => '$2y$12$h6Fyg6kh3cV3eieD91YDweTx2iFFnv3eZ.mVAmw8XOKHa0pc2BEKW', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'name' => 'User 2', 'email' => 'user2@example.com', 'password' => '$2y$12$Xj9LruMqYzQ2ukzZ3Q8Z.edSM4I/ZSldqf/NXTMnughXMpJCxSRqy', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'name' => 'User 3', 'email' => 'user3@example.com', 'password' => '$2y$12$q7DOK2RLnjiXf7q3Xff/Ju2rXaauLZWHgQOI5vlNX2yt0irU2iOAW', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

        DB::table('checks')->insert([
            ['id' => 1, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 2, 'updated_at' => Carbon::now(), 'user_id' => 1],
            ['id' => 2, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 1, 'updated_at' => Carbon::now(), 'user_id' => 1],
            ['id' => 3, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 3, 'updated_at' => Carbon::now(), 'user_id' => 1],
            ['id' => 4, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 2, 'updated_at' => Carbon::now(), 'user_id' => 2],
            ['id' => 5, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 1, 'updated_at' => Carbon::now(), 'user_id' => 2],
            ['id' => 6, 'created_at' => Carbon::now(), 'date' => '2024-12-12', 'tasks' => '[]', 'type' => 3, 'updated_at' => Carbon::now(), 'user_id' => 3]
        ]);

        DB::table('days')->insert(array (
  0 => 
  array (
    'id' => 1,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-09',
    'day_number' => 1,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  1 => 
  array (
    'id' => 2,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-10',
    'day_number' => 2,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  2 => 
  array (
    'id' => 3,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-11',
    'day_number' => 3,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  3 => 
  array (
    'id' => 4,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-12',
    'day_number' => 4,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  4 => 
  array (
    'id' => 5,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-13',
    'day_number' => 5,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  5 => 
  array (
    'id' => 6,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-14',
    'day_number' => 6,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  6 => 
  array (
    'id' => 7,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-15',
    'day_number' => 7,
    'result' => NULL,
    'week_id' => 1,
    'user_id' => 4,
  ),
  7 => 
  array (
    'id' => 8,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-16',
    'day_number' => 1,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
  8 => 
  array (
    'id' => 9,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-17',
    'day_number' => 2,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
  9 => 
  array (
    'id' => 10,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-18',
    'day_number' => 3,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
  10 => 
  array (
    'id' => 11,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-19',
    'day_number' => 4,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
  11 => 
  array (
    'id' => 12,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-20',
    'day_number' => 5,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
  12 => 
  array (
    'id' => 13,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-21',
    'day_number' => 6,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
  13 => 
  array (
    'id' => 14,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'date' => '2024-12-22',
    'day_number' => 7,
    'result' => NULL,
    'week_id' => 2,
    'user_id' => 4,
  ),
));
        DB::table('migrations')->insert(array (
  0 => 
  array (
    'id' => 1,
    'migration' => '0001_01_01_000000_create_users_table',
    'batch' => 1,
  ),
  1 => 
  array (
    'id' => 2,
    'migration' => '0001_01_01_000001_create_cache_table',
    'batch' => 1,
  ),
  2 => 
  array (
    'id' => 3,
    'migration' => '0001_01_01_000002_create_jobs_table',
    'batch' => 1,
  ),
  3 => 
  array (
    'id' => 4,
    'migration' => '2024_09_07_104549_create_goals_table',
    'batch' => 1,
  ),
  4 => 
  array (
    'id' => 5,
    'migration' => '2024_09_07_104745_create_tasks_table',
    'batch' => 1,
  ),
  5 => 
  array (
    'id' => 6,
    'migration' => '2024_09_25_193439_create_weeks_table',
    'batch' => 1,
  ),
  6 => 
  array (
    'id' => 7,
    'migration' => '2024_09_25_193440_create_days_table',
    'batch' => 1,
  ),
  7 => 
  array (
    'id' => 8,
    'migration' => '2024_09_25_193921_create_comments_table',
    'batch' => 1,
  ),
  8 => 
  array (
    'id' => 9,
    'migration' => '2024_10_10_105306_add_day_id_to_tasks',
    'batch' => 1,
  ),
  9 => 
  array (
    'id' => 10,
    'migration' => '2024_10_10_204659_create_checks_table',
    'batch' => 1,
  ),
));
        DB::table('weeks')->insert(array (
  0 => 
  array (
    'id' => 1,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'start' => '2024-12-09',
    'end' => '2024-12-15',
    'result' => NULL,
    'user_id' => 4,
  ),
  1 => 
  array (
    'id' => 2,
    'created_at' => '2024-12-12 06:14:59',
    'updated_at' => '2024-12-12 06:14:59',
    'start' => '2024-12-16',
    'end' => '2024-12-22',
    'result' => NULL,
    'user_id' => 4,
  ),
));
    }
}