<?php

namespace Naykel\Postit\Livewire;

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
        'dbColumn' => 'image_path'
    ];

    #[Validate('required|string|max:255')]
    public string $title;

    #[Validate('nullable|string|max:255')]
    public string $intro;

    // #[Validate('nullable|string|max:255')]
    // public string $headline;

    #[Validate('nullable|string')]
    public string $body;

    // ?? do i need this? this should be handled by the model
    public string $slug;

    public function init(Post $post): void
    {
        $this->editing = $post;
        $this->setFormProperties($this->editing);
    }
}
