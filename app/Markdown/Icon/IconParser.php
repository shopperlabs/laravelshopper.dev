<?php

declare(strict_types=1);

namespace App\Markdown\Icon;

use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;

final class IconParser implements InlineParserInterface
{
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::regex(':icons.([a-zA-Z0-9-]+):');
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        $cursor = $inlineContext->getCursor();
        $match = $inlineContext->getSubMatches();

        $icon = $match[0];

        $iconNode = new IconNode($icon);

        $inlineContext->getContainer()->appendChild($iconNode);

        $cursor->advanceBy(strlen($inlineContext->getFullMatch()));

        return true;
    }
}
