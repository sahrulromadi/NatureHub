<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $articles = Article::where('status', 'Published')
            ->orderByDesc('created_at')
            ->paginate(2);

        return view('livewire.articles', compact('articles'));
    }
}
