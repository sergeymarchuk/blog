<?php

namespace Database\Factories;

use App\Models\Post;
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
            'content' => $this->faker->paragraph(10),
            'cover' => 'https://oboi.com.ua/assets/images/2016/images/940196/1030651/1030655_w560.jpg',
        ];
    }
}
