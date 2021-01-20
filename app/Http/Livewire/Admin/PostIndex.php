<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class PostIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->latest('id')
                ->paginate(5);
        return view('livewire.admin.post-index', compact('posts'));
    }

}
