<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Results;

use Avltree\Scraper\Domain\Exception\Results\InvalidPlace;
use Avltree\Scraper\Domain\Results\Place;
use PHPUnit\Framework\TestCase;

class PlaceTest extends TestCase
{
    /**
     * @test
     * @dataProvider validData
     */
    public function shouldCreate(int $expectedNumber): void
    {
        $place = new Place($expectedNumber);

        $this->assertEquals($expectedNumber, $place->number());
    }

    public function validData(): array
    {
        return [
            [1], [33], [90]
        ];
    }

    /**
     * @test
     * @dataProvider invalidData
     */
    public function shouldThrowExceptionOnInvalidPlace(int $invalidNumber): void
    {
        $this->expectException(InvalidPlace::class);

        new Place($invalidNumber);
    }

    public function invalidData(): array
    {
        return [
            [-4], [0]
        ];
    }
}
