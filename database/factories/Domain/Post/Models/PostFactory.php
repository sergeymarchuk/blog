<?php

namespace Database\Factories\Domain\Post\Models;

use Domain\Post\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(1, 10)),
            'slug' => $this->faker->slug,
            'published' => $this->faker->boolean,
            'published_at' => $this->faker->date(),
            'cover' => rand(1, 50),
            'body' => $this->faker->paragraph(10),
        ];
    }
}
