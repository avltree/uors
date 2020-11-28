<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain;

class Scraper
{
    private ResultsReader $reader;
    private ResultsStore  $store;

    public function __construct(ResultsReader $reader, ResultsStore $store)
    {
        $this->reader = $reader;
        $this->store  = $store;
    }

    public function scrape(): void
    {
        $this->store->save($this->reader->read());
    }
}
