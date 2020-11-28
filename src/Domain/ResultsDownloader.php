<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain;

interface ResultsDownloader
{
    public function readHtml(): string;
}
