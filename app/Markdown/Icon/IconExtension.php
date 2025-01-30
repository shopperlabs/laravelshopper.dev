<?php

declare(strict_types=1);

namespace App\Markdown\Icon;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

final class IconExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addInlineParser(new IconParser);
        $environment->addRenderer(IconNode::class, new IconRenderer);
    }
}
