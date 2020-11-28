<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Results;

use Avltree\Scraper\Domain\Exception\Results\InvalidPlace;

class Place
{
    private int $number;

    public function __construct(int $number)
    {
        if ($number <= 0) {
            throw new InvalidPlace($number);
        }

        $this->number = $number;
    }

    public function number(): int
    {
        return $this->number;
    }
}
