<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Attachment::factory(10)->create();
        \App\Models\Board::factory(10)->create();
        \App\Models\BoardUser::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Task::factory(10)->create();
        \App\Models\TaskUser::factory(10)->create();

    }
}
