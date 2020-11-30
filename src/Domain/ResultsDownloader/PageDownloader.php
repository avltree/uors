<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\ResultsDownloader;

// TODO the uris should not be params, instead they should be configurable, separate clients for websites
interface PageDownloader
{
    // TODO use VOs
    public function downloadIndex(string $uri): string;

    // TODO use VOs
    public function downloadResultsPage(string $uri, string $competitionName): string;
}
