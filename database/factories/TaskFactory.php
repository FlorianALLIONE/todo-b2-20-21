<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $d = $this->faker->dateTimeBetween(now(), '+3 months');
        $date = $d->format('Y-m-m');
        return [
            'title' => $this->faker->sentence,
            'description' =>$this->faker->sentence,
            'due_date' => $date,
            'state'=> $this->faker->randomElement(["todo", "ongoing", "done"]),
            'category_id' => \App\Models\Category::factory(),
            'board_id' => \App\Models\Board::factory(),
        ];
    }
}
