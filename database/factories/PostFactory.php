<?php

namespace Naykel\Postit\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Naykel\Postit\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Naykel\Postit\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'intro' => fake()->paragraph(),
            'headline' => fake()->paragraph(),
            'body' => fake()->paragraphs(3, true),
        ];
    }

    public function published(?Carbon $date = null): self
    {
        return $this->state(
            fn (array $attr) => ['published_at' => $date ?? Carbon::now()]
        );
    }

    // public function released(?Carbon $date = null): self
    // {
    //     return $this->state(
    //         fn (array $attr) => [
    //             'published_at' => $date ?? Carbon::now(),
    //             'released_at' => $date ?? Carbon::now(),
    //         ]
    //     );
    // }
}
