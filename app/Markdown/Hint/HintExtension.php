<?php

declare(strict_types=1);

namespace App\Markdown\Hint;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

final class HintExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addBlockStartParser(new HintStartParser);
        $environment->addRenderer(Hint::class, new HintRenderer);
    }
}
