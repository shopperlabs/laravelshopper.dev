<?php

declare(strict_types=1);

namespace App;

use App\Enum\Versions;
use App\Markdown\GithubFlavoredMarkdownConverter;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class Documentation
{
    public function __construct(
        protected Filesystem $files,
        protected Cache $cache,
    ) {}

    public function getIndex($version): ?string
    {
        return $this->cache->remember('docs.'.$version.'.index', 5, function () use ($version) {

            $path = base_path('resources/docs/'.$version.'/documentation.md');

            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, (new GithubFlavoredMarkdownConverter)
                    ->convert($this->files->get($path)));
            }

            return null;
        });
    }

    public function getTableOfContents(string $version, string $page): Collection
    {
        return $this->cache->remember('docs.'.$version.'.'.$page.'.toc', 5, function () use ($version, $page) {
            $path = base_path('resources/docs/'.$version.'/'.$page.'.md');

            if ($this->files->exists($path)) {
                $content = $this->files->get($path);

                return collect(explode(PHP_EOL, $content))
                    ->reject(fn (string $line): bool => ! Str::startsWith($line, '## ') && ! Str::startsWith($line, '### '))
                    ->map(fn (string $line): array => [
                        'level' => mb_strlen(trim(Str::before($line, '# '))) + 1,
                        'title' => $title = trim(Str::after($line, '# ')),
                        'anchor' => Str::slug($title),
                    ]);
            }

            return collect();
        });
    }

    public function get(string $version, string $page): ?string
    {
        return $this->cache->remember('docs.'.$version.'.'.$page, 5, function () use ($version, $page) {
            $path = base_path('resources/docs/'.$version.'/'.$page.'.md');

            if ($this->files->exists($path)) {
                $content = $this->files->get($path);

                $content = (new GithubFlavoredMarkdownConverter)->convert($content);

                return $this->replaceLinks($version, $content);
            }

            return null;
        });
    }

    public function indexArray(string $version)
    {
        return $this->cache->remember('docs.{'.$version.'}.index', CarbonInterval::hour(), function () use ($version) {
            $path = base_path('resources/docs/'.$version.'/documentation.md');

            if (! $this->files->exists($path)) {
                return [];
            }

            return [
                'pages' => collect(explode(PHP_EOL, $this->replaceLinks($version, $this->files->get($path))))
                    ->filter(fn ($line) => Str::contains($line, '/docs/{{version}}/'))
                    ->map(fn ($line) => resource_path(
                        Str::of($line)
                            ->afterLast('(/')
                            ->before(')')
                            ->replace('{{version}}', $version)
                            ->append('.md')
                    ))
                    ->filter(fn ($path) => $this->files->exists($path))
                    ->mapWithKeys(function ($path) {
                        $contents = $this->files->get($path);

                        preg_match('/\# (?<title>[^\\n]+)/', $contents, $page);
                        preg_match_all('/<a name="(?<fragments>[^"]+)"><\\/a>\n#+ (?<titles>[^\\n]+)/', $contents, $section);

                        return [
                            (string) Str::of($path)->afterLast('/')->before('.md') => [
                                'title' => $page['title'],
                                'sections' => collect($section['fragments'])
                                    ->combine($section['titles'])
                                    ->map(fn ($title) => ['title' => $title]),
                            ],
                        ];
                    }),
            ];
        });
    }

    public static function replaceVersion(string $version, $content): array|string
    {
        return str_replace('{{version}}', $version, (string) $content);
    }

    public static function replaceLinks(string $version, $content): array|string
    {
        return str_replace('%7B%7Bversion%7D%7D', $version, self::replaceVersion($version, $content));
    }

    public function sectionExists(string $version, ?string $page): bool
    {
        return $this->files->exists(
            base_path('resources/docs/'.$version.'/'.$page.'.md')
        );
    }

    public function getFullVersion(string $version, bool $extending = false): string
    {
        return $extending ? "{$version}/extending" : $version;
    }

    public function versionsContainingPage(string $page): Collection
    {
        return collect(Documentation::getDocVersions())
            ->filter(fn ($version) => $this->sectionExists($version, $page));
    }

    public static function getDocVersions(): array
    {
        return Versions::values();
    }
}
