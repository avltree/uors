<?php declare(strict_types=1);

namespace Avltree\Scraper\Infrastructure\ResultsDownloader;

use Avltree\Scraper\Domain\ResultsDownloader\PageDownloader;
use GuzzleHttp\Client;

class GuzzlePageDownloader implements PageDownloader
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function downloadIndex(string $uri): string
    {
        return $this->client->get($uri)->getBody()->getContents();
    }

    public function downloadResultsPage(string $uri, string $competitionName): string
    {
        return $this->client->post(
            $uri,
            [
                'form_params' => [
                    'zawody' => $competitionName,
                ],
            ]
        )->getBody()->getContents();
    }
}
