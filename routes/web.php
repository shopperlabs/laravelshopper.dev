<?php

declare(strict_types=1);

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/docs')->name('home');

Route::get('docs', [DocsController::class, 'showRootPage']);
Route::get('docs/{version}/index.json', [DocsController::class, 'index']);
Route::get('docs/{version}/extending/{page?}', [DocsController::class, 'extending'])
    ->name('docs.extending');
Route::get('docs/{version}/{page?}', [DocsController::class, 'show'])
    ->name('docs.version');
