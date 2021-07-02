<?php

namespace Database\Factories\Domain\Attachment\Models;

use Domain\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory {
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
    public function definition(): array {
        return [
            'name' => $this->faker->slug,
        ];
    }
}
