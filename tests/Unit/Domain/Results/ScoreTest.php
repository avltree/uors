<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Results;

use Avltree\Scraper\Domain\Exception\Results\InvalidScore;
use Avltree\Scraper\Domain\Results\Score;
use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase
{
    /**
     * @test
     * @dataProvider validData
     */
    public function shouldCreate(int $expectedValue): void
    {
        $score = new Score($expectedValue);

        $this->assertEquals($expectedValue, $score->value());
    }

    public function validData(): array
    {
        return [
            'min'    => [0],
            'max'    => [100],
            'normal' => [random_int(0, 100)],
        ];
    }

    /**
     * @test
     * @dataProvider invalidData
     */
    public function shouldThrowExceptionOnInvalidValue(int $invalidScore, string $expectedMessage): void
    {
        $this->expectException(InvalidScore::class);
        $this->expectExceptionMessage($expectedMessage);

        new Score($invalidScore);
    }

    public function invalidData(): array
    {
        return [
            'below-0'   => [-4, 'Score cannot be lower than 0, -4 given'],
            'above-100' => [101, 'Expected score cannot exceed 100, 101 given'],
        ];
    }
}
