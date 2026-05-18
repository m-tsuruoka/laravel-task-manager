<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{

public function run(): void
{
    Task::create([
        'title' => '買い物',
        'description' => '牛乳を買う',
        'status' => 0,
        'user_id' => 1,
    ]);

    Task::create([
        'title' => 'Laravel学習',
        'description' => 'Todoアプリ作成',
        'status' => 1,
        'user_id' => 1,
    ]);

    Task::create([
        'title' => '掃除',
        'description' => '部屋の掃除',
        'status' => 2,
        'user_id' => 1,
    ]);
}
}
