<?php

namespace Naykel\Postit\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Searchable;
use Naykel\Gotime\Traits\Sortable;
use Naykel\Gotime\Traits\WithFormActions;
use Naykel\Postit\Models\Post;

class PostTable extends Component
{
    use Renderable, Searchable, Sortable, WithFormActions, WithPagination;

    protected string $modelClass = Post::class;
    public string $routePrefix = 'admin.posts';
    public string $pageTitle = 'Posts';
    protected string $layout = 'admin';
    protected string $view = 'postit::post-table';
    public array $searchableFields = ['title'];

    public function mount()
    {
        $this->sortColumn = 'title';
    }

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySearch($query);
        $query = $this->applySorting($query);

        return ['items' => $query->paginate(20)];
    }
}
