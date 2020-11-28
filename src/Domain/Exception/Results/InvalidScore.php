<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Exception\Results;

class InvalidScore extends \DomainException
{
    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function tooLow(int $score): self
    {
        return new self("Score cannot be lower than 0, $score given");
    }

    public static function tooHigh(int $score): self
    {
        return new self("Expected score cannot exceed 100, $score given");
    }
}
