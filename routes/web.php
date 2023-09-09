<?php

declare(strict_types=1);

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '1.x');
}

Route::redirect('/', '/docs', 301);

Route::get('docs', [DocsController::class, 'showRootPage']);
Route::get('docs/{version}/index.json', [DocsController::class, 'index']);
Route::get('docs/{version}/extending/{page?}', [DocsController::class, 'extending'])
    ->name('docs.extending');
Route::get('docs/{version}/{page?}', [DocsController::class, 'show'])
    ->name('docs.version');

Route::redirectMap([
    'facebook' => 'https://facebook.com/laravelshopper',
    'twitter' => 'https://twitter.com/laravelshopper',
    'linkedin' => 'https://www.linkedin.com/company/shopperlabs',
    'github' => 'https://github.com/shopperlabs/shopper',
    'discord' => 'https://discord.gg/vXKBTdKRxc',
    'youtube' => 'https://www.youtube.com/@shopperlabs7150',
]);
