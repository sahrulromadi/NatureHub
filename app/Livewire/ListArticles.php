<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $articles = Article::where('status', 'Published')
            ->whereAny(
                [
                    'title',
                    'body'
                ],
                'LIKE',
                "%{$this->search}%"
            )
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('livewire.list-articles', compact('articles'));
    }
}
