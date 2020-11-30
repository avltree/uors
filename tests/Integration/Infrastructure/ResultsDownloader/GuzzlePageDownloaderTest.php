<?php declare(strict_types=1);

namespace Tests\Integration\Infrastructure\ResultsDownloader;

use Avltree\Scraper\Infrastructure\ResultsDownloader\GuzzlePageDownloader;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class GuzzlePageDownloaderTest extends TestCase
{
    private Client               $client;
    private GuzzlePageDownloader $downloader;

    protected function setUp(): void
    {
        // TODO replace with pact mock server
        $this->client = new Client();
        $this->downloader = new GuzzlePageDownloader($this->client);
    }

    /** @test */
    public function shouldDownloadIndex(): void
    {
        $index = $this->downloader->downloadIndex('http://www.obronca.org/zawody/wyszukiwarka/');

        $this->assertStringContainsString('form method="post"', $index);
    }

    /** @test */
    public function shouldDownloadResultsPage(): void
    {
        $resultsPage = $this->downloader->downloadResultsPage(
            'http://www.obronca.org/zawody/wyszukiwarka/',
            '2020-11-15 Zawody otwarte TURNIEJ NIEPODLEGŁOŚCI'
        );

        $this->assertStringNotContainsString(
            'Niestety nie znaleziono żadnych wyników dla podanych kryteriów',
            $resultsPage
        );
        $this->assertStringContainsString('<div class="table-responsive">', $resultsPage);
    }
}
