<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thread;

class ThreadFactory extends Factory
{
    
    protected $model = Thread::class;
    
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(2),
            'slug' => $this->faker->slug
        ];
    }
}
