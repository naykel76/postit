<?php

use Illuminate\Support\Facades\Route;
use Naykel\Postit\Livewire\PostCreateEdit;
use Naykel\Postit\Livewire\PostTable;

Route::middleware(['web'])->prefix('admin/posts')->name('admin.posts')->group(function () {
    Route::get('/', PostTable::class)->name('.index');
    Route::get('/{post:slug}/edit', PostCreateEdit::class)->name('.edit');
    Route::post('/create', PostCreateEdit::class)->name('.create');
});


// put this at the bottom of web.php
/** ---------------------------------------------------------------------------
 *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
 * ------------------------------------------------------------------------- */
// /////////////////////////////////////////////////////////////////////////////
// Route::get('/{post:slug}', [PageController::class, 'show'])->name('posts.show');
// /////////////////////////////////////////////////////////////////////////////
/** ---------------------------------------------------------------------------
 *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
 * ------------------------------------------------------------------------- */
