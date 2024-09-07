<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $articles = Article::where('status', 'Published')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view('livewire.home', compact('articles'));
    }
}
