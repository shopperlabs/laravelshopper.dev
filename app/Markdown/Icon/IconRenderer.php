<?php

declare(strict_types=1);

namespace App\Markdown\Icon;

use Illuminate\Support\Facades\Blade;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

final class IconRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): string
    {
        if (! $node instanceof IconNode) {
            throw new \InvalidArgumentException('Expected an instance of '.IconNode::class);
        }

        return Blade::render(sprintf('<x-icons.%s aria-hidden="true" />', $node->icon));
    }
}
