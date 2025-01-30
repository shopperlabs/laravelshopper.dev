<?php

declare(strict_types=1);

namespace App\Markdown\Icon;

use League\CommonMark\Node\Inline\AbstractInline;

final class IconNode extends AbstractInline
{
    public function __construct(
        public string $icon,
    ) {
        parent::__construct();
    }
}
