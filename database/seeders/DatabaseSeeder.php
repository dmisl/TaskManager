<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['name' => 'dmisl', 'email' => 'rithlesscorp@gmail.com', 'password' => '098spa']);
        Goal::create(['name' => 'Проект Task Buddy', 'end_date' => '2024-12-30', 'tasks_number' => 3, 'image' => 'https://img.b2bpic.net/premium-vector/man-woman-sitting-table-both-engrossed-their-laptops-possibly-working-studying-two-people-with-laptops-calendars-simple-minimalist-flat-vector-illustration_538213-119061.jpg', 'user_id' => 1]);
        Goal::create(['name' => 'Робота програмістом', 'end_date' => '2024-12-30', 'tasks_number' => 3, 'image' => 'https://img.b2bpic.net/premium-vector/ai-monitoring-modern-flat-illustration_203633-2768.jpg', 'user_id' => 1]);
        Goal::create(['name' => 'Матуральний екзамен', 'end_date' => '2024-12-30', 'tasks_number' => 2, 'image' => 'https://img.b2bpic.net/premium-vector/flat-illustration-international-day-education_23-2151045709.jpg', 'user_id' => 1]);
    }
}
