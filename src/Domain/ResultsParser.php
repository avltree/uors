<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain;

interface ResultsParser
{
    // TODO consider returning a collection
    public function parse(string $resultsHtml): array;
}
