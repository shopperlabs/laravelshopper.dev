<?php

declare(strict_types=1);

namespace App\Markdown;

use App\Markdown\Hint\HintExtension;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;

final class GithubFlavoredMarkdownExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new StrikethroughExtension());
        $environment->addExtension(new TableExtension());
        $environment->addExtension(new TaskListExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new HintExtension());
    }
}
