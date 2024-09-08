<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Articles;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/articles', Articles::class)->name('articles');
