<?php

declare(strict_types=1);

namespace App\Markdown;

use App\Markdown\Extension\TorchlightExtension;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

final class GithubFlavoredMarkdownConverter extends MarkdownConverter
{
    public function __construct()
    {
        $config = [
            'heading_permalink' => [
                'html_class' => 'anchor',
                'id_prefix' => '',
                'apply_id_to_heading' => false,
                'heading_class' => '',
                'fragment_prefix' => '',
                'insert' => 'before',
                'min_heading_level' => 2,
                'max_heading_level' => 4,
                'title' => '',
                'symbol' => '#',
                'aria_hidden' => true,
            ],
            'table' => [
                'wrap' => [
                    'enabled' => true,
                    'tag' => 'div',
                    'attributes' => [
                        'class' => 'table-wrapper',
                    ],
                ],
            ],
        ];

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new GithubFlavoredMarkdownExtension);
        $environment->addExtension(new AttributesExtension);
        $environment->addExtension(new TorchlightExtension);

        parent::__construct($environment);
    }

    public function getEnvironment(): EnvironmentInterface
    {
        \assert($this->environment instanceof EnvironmentInterface);

        return $this->environment;
    }
}
