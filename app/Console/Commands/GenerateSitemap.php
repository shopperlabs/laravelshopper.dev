<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;

final class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle(): int
    {
        SitemapGenerator::create(config('app.url'))
            ->shouldCrawl(function (UriInterface $url) {
                // Crawl everything without "docs" in the path, as we'll crawl the docs separately...
                return ! Str::contains($url->getPath(), 'docs');
            })
            ->hasCrawled(function (Url $url) {
                if ($url->segment(1) === 'features') {
                    $url->setPriority(0.5);
                }

                return $url;
            })
            ->writeToFile(public_path('sitemap_pages.xml'));

        SitemapGenerator::create(config('app.url').'/docs/'.DEFAULT_VERSION)
            ->shouldCrawl(fn (UriInterface $url) => Str::contains($url->getPath(), 'docs'))
            ->writeToFile(public_path('sitemap_docs.xml'));

        SitemapIndex::create()
            ->add('sitemap_pages.xml')
            ->add('sitemap_docs.xml')
            ->writeToFile(public_path('sitemap.xml'));

        return 0;
    }
}
