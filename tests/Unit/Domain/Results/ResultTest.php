<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Results;

use Avltree\Scraper\Domain\Results\City;
use Avltree\Scraper\Domain\Results\Club;
use Avltree\Scraper\Domain\Results\ClubName;
use Avltree\Scraper\Domain\Results\Contender;
use Avltree\Scraper\Domain\Results\FirstName;
use Avltree\Scraper\Domain\Results\LastName;
use Avltree\Scraper\Domain\Results\Place;
use Avltree\Scraper\Domain\Results\Result;
use Avltree\Scraper\Domain\Results\Score;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ResultTest extends TestCase
{
    /** @test */
    public function shouldCreate(): void
    {
        // TODO consider using builders when needed
        $expectedId        = Uuid::uuid4();
        $expectedPlace     = new Place(1);
        $expectedContender = new Contender(Uuid::uuid4(), new FirstName('Jan'), new LastName('Kowalski'));
        $expectedClub      = new Club(new ClubName('Obrońca'), new City('Troszyn'));
        $expectedScore     = new Score(99);

        $result = new Result($expectedId, $expectedPlace, $expectedContender, $expectedClub, $expectedScore);

        $this->assertEquals($expectedId, $result->id());
        $this->assertEquals($expectedPlace, $result->place());
        $this->assertEquals($expectedContender, $result->contender());
        $this->assertEquals($expectedClub, $result->club());
        $this->assertEquals($expectedScore, $result->score());
    }
}
