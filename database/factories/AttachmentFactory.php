<?php

namespace Database\Factories;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file' => '01101',
            'filename' => $this->faker->word,
            'size' => $this->faker->randomDigit,
            'type' => $this->faker->mimeType,
            'user_id' => \App\Models\User::factory(),
            'task_id' => \App\Models\Task::factory()
        ];
    }
}
