<?php

use Illuminate\Support\Facades\Route;
use Naykel\Postit\Livewire\PostTable;

Route::middleware(['web'])->prefix('posts')->name('posts')->group(function () {
    Route::get('/', PostTable::class)->name('.index');
});

/** ---------------------------------------------------------------------------
 *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
 * ------------------------------------------------------------------------- */
// /////////////////////////////////////////////////////////////////////////////
// Route::get('/{page:slug}', [PageController::class, 'show'])->name('posts.show');
// /////////////////////////////////////////////////////////////////////////////
/** ---------------------------------------------------------------------------
 *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
 * ------------------------------------------------------------------------- */
