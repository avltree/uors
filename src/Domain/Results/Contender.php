<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Results;

use Ramsey\Uuid\UuidInterface;

class Contender
{
    private UuidInterface $id;
    private FirstName     $firstName;
    private LastName      $lastName;

    public function __construct(UuidInterface $id, FirstName $firstName, LastName $lastName)
    {
        $this->id        = $id;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function firstName(): FirstName
    {
        return $this->firstName;
    }

    public function lastName(): LastName
    {
        return $this->lastName;
    }

    public function fullName(): string
    {
        return sprintf('%s %s', $this->firstName->value(), $this->lastName->value());
    }
}
