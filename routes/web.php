<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Articles;
use App\Livewire\ShowArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/articles', Articles::class)->name('articles');
Route::get('/articles/{article:slug}', ShowArticle::class)->name('articles.show');
