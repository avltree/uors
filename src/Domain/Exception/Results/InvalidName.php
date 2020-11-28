<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Exception\Results;

class InvalidName extends \DomainException
{
    // TODO custom messages
    public function __construct(string $name)
    {
        parent::__construct("Invalid name provided: '$name'");
    }
}
