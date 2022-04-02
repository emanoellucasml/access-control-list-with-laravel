<?php

namespace Database\Factories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Str;

class ThreadFactory extends Factory
{

    protected $model = Thread::class;

    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'channel_id' => function(){
                return Channel::factory()->create()->id;
             },
            'user_id' => function(){
                return User::factory()->create()->id;
            },
            'title' => $title,
            'body' => $this->faker->paragraph(2),
            'slug' => Str::slug($title)
        ];
    }
}
