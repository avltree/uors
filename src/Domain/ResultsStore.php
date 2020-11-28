<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain;

interface ResultsStore
{
    // TODO consider using collection
    public function save(array $results): void;
}
