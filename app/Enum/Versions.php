<?php

declare(strict_types=1);

namespace App\Enum;

use App\Traits\ArrayableEnum;

enum Versions: string
{
    use ArrayableEnum;

    case VERSION_1X = '1.x';

    case VERSION_2X = '2.x';
}
