<?php

declare(strict_types=1);

namespace App\View\Components\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class App extends Component
{
    public function render(): View
    {
        return view('layout.app');
    }
}
