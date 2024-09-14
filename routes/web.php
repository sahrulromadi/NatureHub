<?php

use App\Livewire\FormContact;
use App\Livewire\Home;
use App\Livewire\ShowAbout;
use App\Livewire\ShowArticle;
use App\Livewire\ListArticles;
use App\Livewire\ListArticlesByAuthor;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', ShowAbout::class)->name('about');
Route::get('/articles', ListArticles::class)->name('articles');
Route::get('/articles/author/{author:name}', ListArticlesByAuthor::class)->name('articles.author');
Route::get('/articles/{article:slug}', ShowArticle::class)->name('articles.show');
Route::get('/contacts', FormContact::class)->name('contacts');
