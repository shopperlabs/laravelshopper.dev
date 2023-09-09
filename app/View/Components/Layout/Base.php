<?php

declare(strict_types=1);

namespace App\View\Components\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Base extends Component
{
    public function render(): View
    {
        return view('layout.base');
    }
}
