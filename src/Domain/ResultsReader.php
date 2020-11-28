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
        return $this->parser->parse($this->downloader->readHtml());
    }
}
