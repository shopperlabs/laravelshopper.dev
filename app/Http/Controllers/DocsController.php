<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Documentation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

final class DocsController extends Controller
{
    public function __construct(
        protected Documentation $docs
    ) {}

    public function showRootPage(): RedirectResponse
    {
        return redirect('docs/'.DEFAULT_VERSION);
    }

    public function index(string $version, Documentation $docs): RedirectResponse|JsonResponse|array
    {
        $major = Str::before($version, '.');

        if ((int) Str::before(array_values(Documentation::getDocVersions())[1], '.') + 1 === (int) $major) {
            $version = $major = '2.x';
        }

        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/index.json', 301);
        }

        if ($major < 1) {
            return [];
        }

        return response()->json($docs->indexArray($version));
    }

    public function show(string $version, ?string $page = null)
    {
        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version, 301);
        }

        dd($page);
        $sectionPage = $page ?: 'getting-started';
        $content = $this->docs->get($version, $sectionPage);
        $headings = $this->docs->getTableOfContents($version, $sectionPage);

        return $this->renderContent(
            version: $version,
            sectionPage: $sectionPage,
            page: $page,
            content: $content,
            headings: $headings
        );
    }

    public function extending(string $version, ?string $page = null)
    {
        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version, 301);
        }

        $version = $this->docs->getFullVersion($version, true);

        $sectionPage = $page ?: 'overview';
        $content = $this->docs->get($version, $sectionPage);
        $headings = $this->docs->getTableOfContents(
            version: $version,
            page: $sectionPage,
        );

        return $this->renderContent(
            version: $version,
            sectionPage: $sectionPage,
            page: $page,
            content: $content,
            headings: $headings
        );
    }

    protected function renderContent(
        string $version,
        string $sectionPage,
        ?string $page,
        ?string $content,
        Collection $headings,
    ): View|RedirectResponse|Response {
        if (is_null($content)) {
            $otherVersions = $this->docs->versionsContainingPage($page);

            return response()->view('docs', [
                'title' => 'Page not found',
                'index' => $this->docs->getIndex($version),
                'content' => view('missing', [
                    'otherVersions' => $otherVersions,
                    'page' => $page,
                ]),
                'headings' => $headings,
                'currentVersion' => $version,
                'versions' => Documentation::getDocVersions(),
                'currentSection' => $otherVersions->isEmpty() ? '' : '/'.$page,
                'canonical' => null,
            ], 404);
        }

        $title = (new Crawler($content))->filterXPath('//h1');

        $section = '';

        if ($this->docs->sectionExists($version, $page)) {
            $section .= '/'.$page;
        } elseif (! is_null($page)) {
            return redirect('/docs/'.$version);
        }

        $canonical = null;

        if ($this->docs->sectionExists($version, $sectionPage)) {
            $canonical = 'docs/'.$version.'/'.$sectionPage;
        }

        return view('docs', [
            'title' => count($title) ? $title->text() : null,
            'index' => $this->docs->getIndex($version),
            'content' => $content,
            'headings' => $headings,
            'currentVersion' => explode('/', $version)[0],
            'versions' => Documentation::getDocVersions(),
            'currentSection' => $section,
            'canonical' => $canonical,
        ]);
    }

    protected function isVersion(string $version): bool
    {
        return array_key_exists($version, Documentation::getDocVersions());
    }
}
