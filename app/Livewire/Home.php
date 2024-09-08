<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Campaign;

class Home extends Component
{
    public function render()
    {
        $articles = Article::where('status', 'Published')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        $campaigns = Campaign::orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('livewire.home', compact('articles', 'campaigns'));
    }
}
