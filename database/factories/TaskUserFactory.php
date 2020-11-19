<?php

namespace Database\Factories;

use App\Models\TaskUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'task_id' => \App\Models\Task::factory(),
        ];
    }
}
