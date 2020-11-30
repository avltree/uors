<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Factory;

use Avltree\Scraper\Domain\Exception\UnsupportedWebsite;
use Avltree\Scraper\Domain\ResultsDownloader;
use Avltree\Scraper\Domain\ResultsDownloader\WebsiteFormResultsDownloader;
use Avltree\Scraper\Domain\WebsiteName;
use Avltree\Scraper\Infrastructure\ResultsDownloader\GuzzlePageDownloader;
use Avltree\Scraper\Infrastructure\ResultsDownloader\PhpHtmlFormParser;
use GuzzleHttp\Client;
use PHPHtmlParser\Dom;

class ResultsDownloaderFactory
{
    public function create(WebsiteName $website): ResultsDownloader
    {
        if (! in_array($website->value(), $this->supportedWebsiteNames(), true)) {
            throw new UnsupportedWebsite($website);
        }

        // TODO should be updated when more than one downloader is implemented
        // TODO use factories for parser and downloader
        return new WebsiteFormResultsDownloader(
            new GuzzlePageDownloader(new Client()), new PhpHtmlFormParser(new Dom())
        );
    }

    private function supportedWebsiteNames(): array
    {
        return [
            WebsiteName::OBRONCA,
        ];
    }
}
