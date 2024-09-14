<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticlesByAuthor extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $author;

    public function mount(User $author)
    {
        $this->author = $author;
    }

    public function render()
    {
        $articles = Article::where('user_id', $this->author->id)
            ->where('status', 'Published')
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('body', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('livewire.list-articles-by-author', compact('articles'));
    }
}
