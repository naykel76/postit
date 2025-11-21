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
        $title = fake()->sentence(random_int(3, 10));

        return [
            'title' => $title,
            'slug' => strtolower(str_replace(' ', '-', $title)),
            'intro' => fake()->optional(0.9)->sentence(random_int(1, 3)),
            'headline' => fake()->optional(0.3)->sentence(random_int(1, 2)),
            'content' => fake()->paragraphs(random_int(1, 5), true),
            'published_at' => fake()->optional(0.7)->dateTimeBetween('-6 months', 'now'),
            'layout' => fake()->randomElement(['post-default', 'post-with-side-image', 'post-with-banner']),
        ];
    }

    public function published(?Carbon $date = null): self
    {
        return $this->state(
            fn(array $attr) => ['published_at' => $date ?? Carbon::now()]
        );
    }
}
