<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class PostList extends Component
{
    public int $postPerPage = 15;
    public int $currentPage = 1;
    public int $pagesCount;
    public string $query = '';

    public function mount()
    {
        $this->pagesCount = ceil(Post::count() / $this->postPerPage);
    }

    public function render()
    {
        $results = $this->query ? $this->searchResults() : Post::paginate($this->postPerPage, $this->currentPage);

        return view('livewire.post-list', compact('results'));
    }

    public function searchResults(): Collection
    {
        $this->currentPage = 1;
        $query = strtolower($this->query);

        return Post::findBySearch($query);
    }

    public function nextPage()
    {
        ++$this->currentPage;
    }

    public function previousPage()
    {
        --$this->currentPage;
    }
}
