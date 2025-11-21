<?php

namespace Naykel\Postit\Livewire\Posts;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Searchable;
use Naykel\Gotime\Traits\Sortable;
use Naykel\Gotime\Traits\WithFormActions;
use Naykel\Postit\Models\Post;

class Index extends Component
{
    use Searchable, Sortable, WithFormActions, WithPagination;

    public ?int $selectedId = null;
    protected string $modelClass = Post::class;
    public string $title = 'Posts';
    public int $perPage = 16;
    public string $routePrefix = 'admin.posts';
    public array $searchableFields = ['title'];

    public function mount()
    {
        $this->sortColumn = 'title';
    }

    protected function getQuery()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);

        return $query;
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('postit::posts.index', [
            'items' => $this->getQuery()->paginate($this->perPage),
        ])->title($this->title);
    }
}
