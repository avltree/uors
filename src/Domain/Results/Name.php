<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Results;

use Avltree\Scraper\Domain\Exception\Results\InvalidName;

abstract class Name
{
    private string $value;

    // TODO add name normalization
    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new InvalidName($value);
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
