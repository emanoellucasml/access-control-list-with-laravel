<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Channel;
use Illuminate\Support\Str;

class ChannelFactory extends Factory
{
    protected $model = Channel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word;
        return [
            'name' => $name,
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($name)
        ];
    }
}
