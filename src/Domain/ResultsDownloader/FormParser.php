<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\ResultsDownloader;

interface FormParser
{
    // TODO consider using a collection
    // TODO use value objects
    public function getCompetitionNames(string $formHtml, string $formPattern): array;
}
