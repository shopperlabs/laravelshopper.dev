<?php

declare(strict_types=1);

namespace App\Markdown\Hint;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\StringContainerInterface;

final class Hint extends AbstractBlock implements StringContainerInterface
{
    private ?string $header = 'Hot Tip!';

    protected string $literal;

    public function getTitle(): ?string
    {
        $words = $this->getHeaderWords();

        if (count($words) > 1) {

            array_shift($words);

            return implode(' ', $words);
        }

        if ($words[0] === 'tip') {
            return 'Hot Tip!';
        }

        if ($words[0] === 'warning') {
            return 'Warning!';
        }

        if ($words[0] === 'info') {
            return 'Info!';
        }

        if ($words[0] === 'danger') {
            return 'Danger!';
        }

        if ($words[0] === 'best-practice') {
            return 'Best Practice';
        }

        return null;
    }

    public function getType(): ?string
    {
        $words = $this->getHeaderWords();

        if (count($words) > 0) {
            return $words[0];
        }

        return null;
    }

    public function getHeaderWords(): array
    {
        return \preg_split('/\s+/', $this->header ?? '') ?: [];
    }

    public function setHeader($header): void
    {
        $this->header = $header;
    }

    public function setLiteral(string $literal): void
    {
        $this->literal = $literal;
    }

    public function getLiteral(): string
    {
        return $this->literal;
    }
}
