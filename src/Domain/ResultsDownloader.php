<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain;

interface ResultsDownloader
{
    // TODO consider using collection of VOs
    public function readHtml(): array;
}
