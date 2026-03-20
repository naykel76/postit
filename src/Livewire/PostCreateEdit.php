<?php

namespace Naykel\Postit\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithFormActions;
use Naykel\Postit\Models\Post;

class PostCreateEdit extends Component
{
    use Renderable, WithFileUploads, WithFormActions;

    public PostFormObject $form;
    public string $view = 'postit::post-create-edit';
    public string $layout = 'admin';
    public string $pageTitle = 'Create Post';
    public string $routePrefix = 'admin.posts';

    public function mount(Post $post)
    {
        $model = $post->exists ? $post : new Post;
        $this->form->init($model);
    }
}
