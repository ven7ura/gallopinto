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
    public string $searchTerm = '';
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function mount()
    {
        $this->pagesCount = ceil(Post::count() / $this->postPerPage);
    }

    public function render()
    {
        $results = $this->searchTerm ? $this->searchResults() : Post::paginate($this->postPerPage, $this->currentPage);

        return view('livewire.post-list', compact('results'));
    }

    public function searchResults(): Collection
    {
        // Reset current page
        $this->currentPage = 1;
        $query = strtolower($this->searchTerm);

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
