<?php

namespace Naykel\Postit\Livewire\Posts;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Naykel\Gotime\Traits\WithFormActions;
use Naykel\Postit\Models\Post;

class CreateEdit extends Component
{
    use WithFileUploads, WithFormActions;

    public PostFormObject $form;
    protected string $modelClass = Post::class;
    public string $title = 'Create/Edit Posts';
    public string $routePrefix = 'admin.posts';

    public function mount(Post $post)
    {
        $model = $post->exists ? $post : new Post;
        $this->form->init($model);
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('postit::posts.create-edit')
            ->title($this->title);
    }
}
