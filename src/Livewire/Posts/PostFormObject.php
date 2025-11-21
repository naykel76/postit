<?php

namespace Naykel\Postit\Livewire\Posts;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;
use Naykel\Postit\Models\Post;

class PostFormObject extends Form
{
    use Crudable, Formable;

    protected $storage = [
        'disk' => 'content',
        'dbColumn' => 'image_path',
    ];

    #[Validate('required|string|max:65535')]
    public string $content = '';

    #[Validate('string|max:255')]
    public string $headline = '';

    #[Validate('string|max:512')]
    public string $intro = '';

    #[Validate('required|string|max:255')]
    public string $title = '';

    public function init(Post $post): void
    {
        $this->editing = $post;
        $this->setFormProperties($this->editing);
    }
}
