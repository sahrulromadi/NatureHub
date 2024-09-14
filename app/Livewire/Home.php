<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Campaign;

class Home extends Component
{
    public function render()
    {
        $articles = Article::withCount('likes')
            ->where('status', 'Published')
            ->orderByRaw('(views + likes_count) DESC')
            ->orderByDesc('updated_at')
            ->take(4)
            ->get();

        $campaigns = Campaign::where('is_starred', true)
            ->orderByDesc('updated_at')
            ->take(3)
            ->get();

        return view('livewire.home', compact('articles', 'campaigns'));
    }
}
