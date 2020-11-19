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
            'file'=> base64_encode($this->faker->text),
            'filename'=>$this->faker->word,
            //'filename'=>$this->faker->file('.', ' /Users/quentinmdl/Documents', false),
            'size'=> rand(0,4096),
            'type'=>$this->faker->mimeType(),
            'user_id' => \App\Models\User::factory(),
            'task_id' => \App\Models\Task::factory(),
        ];
    }
}
