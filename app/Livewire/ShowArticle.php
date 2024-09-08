<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ShowArticle extends Component
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        $recommendedArticles = Article::inRandomOrder()->take(3)->get();

        return view('livewire.show-article', [
            'article' => $this->article,
            'recommendedArticles' => $recommendedArticles
        ]);
    }
}
