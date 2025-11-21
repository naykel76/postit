<?php

use Illuminate\Support\Facades\Route;
use Naykel\Postit\Livewire\Posts\CreateEdit as PostCreateEdit;
use Naykel\Postit\Livewire\Posts\Index as PostIndex;

Route::middleware(['web'])->prefix('admin')->name('admin')->group(function () {
    Route::get('/posts', PostIndex::class)->name('.posts.index');
    Route::get('/posts/create', PostCreateEdit::class)->name('.posts.create');
    Route::get('/posts/{post:slug}/edit', PostCreateEdit::class)->name('.posts.edit');
});

