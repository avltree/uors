<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain;

class ResultsReader
{
    private ResultsDownloader $downloader;
    private ResultsParser     $parser;

    public function __construct(ResultsDownloader $downloader, ResultsParser $parser)
    {
        $this->downloader = $downloader;
        $this->parser     = $parser;
    }

    // TODO consider returning a collection
    public function read(): array
    {
        // TODO should use VOs instead of strings
        return array_map(fn (string $html): array => $this->parser->parse($html), $this->downloader->readHtml());
    }
}
