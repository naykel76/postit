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
            // 'body' => fake()->paragraphs(3, true),
            'body' => fake()->randomHtml(),
        ];
    }

    public function published(?Carbon $date = null): self
    {
        return $this->state(
            fn (array $attr) => ['published_at' => $date ?? Carbon::now()]
        );
    }

    public function contentExample(): self
    {
        return $this->state(
            fn (array $attr) => [
                'title' => 'Super Awesome Page Title',
                'intro' => 'This is the lead paragraph. The text is slightly larger and bolder than the rest of your body text. The lead paragraph should clearly and concisely describe what the user will expect from the page contents.',
                'body' => 'This is the body text. The body text is the main content of your page. It should be clear and concise, providing all the necessary information to the user.',
            ]
        );
    }
}
