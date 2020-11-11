<?php

namespace Database\Factories;

use App\Models\Task;
Use App\Models\TaskUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->word,
            'due_date' => $this->faker->date,
            'state' => 'todo',
            'category_id' => \App\Models\Category::factory(),
            'board_id' => \App\Models\Board::factory()
        ];
    }
}
