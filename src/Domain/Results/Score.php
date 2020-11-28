<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Results;

// TODO consider storing the percentage results also
use Avltree\Scraper\Domain\Exception\Results\InvalidScore;

class Score
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw InvalidScore::tooLow($value);
        }

        if ($value > 100) {
            throw InvalidScore::tooHigh($value);
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
