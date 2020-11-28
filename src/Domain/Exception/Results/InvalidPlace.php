<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Exception\Results;

class InvalidPlace extends \DomainException
{
    public function __construct(int $place)
    {
        parent::__construct("Invalid place: $place");
    }
}
