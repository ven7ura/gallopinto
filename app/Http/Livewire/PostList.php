<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public int $postPerPage = 15;
    public int $currentPage = 1;
    public int $pagesCount;

    public function mount()
    {
        $this->pagesCount = ceil(Post::count() / $this->postPerPage);
    }

    public function render()
    {
        $results = Post::paginate($this->postPerPage, $this->currentPage);

        return view('livewire.post-list', compact('results'));
    }
}
