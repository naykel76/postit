<?php

namespace Naykel\Postit\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Enums\PublishedStatus;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Sortable;
use Naykel\Gotime\Traits\WithFormActions;
use Naykel\Postit\Models\Post;

class PostTable extends Component
{
    use Renderable, Sortable, WithFormActions, WithPagination;

    protected string $modelClass = Post::class;
    public string $pageTitle = 'Posts';
    protected string $layout = 'admin';
    protected string $view = 'postit::post-table';

    public function mount()
    {
        // $model = $this->modelClass::first();
        $this->sortColumn = 'title';
    }

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);

        return ['items' => $query->paginate(20)];
    }
}
