<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Results;

use Avltree\Scraper\Domain\Results\City;
use Avltree\Scraper\Domain\Results\Club;
use Avltree\Scraper\Domain\Results\ClubName;
use PHPUnit\Framework\TestCase;

class ClubTest extends TestCase
{
    /** @test */
    public function shouldCreate(): void
    {
        $expectedName = new ClubName('Obrońca');
        $expectedCity = new City('Troszyn');

        $club = new Club($expectedName, $expectedCity);

        $this->assertEquals($expectedName, $club->name());
        $this->assertEquals($expectedCity, $club->city());
    }
}
