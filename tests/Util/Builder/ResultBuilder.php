<?php declare(strict_types=1);

namespace Tests\Util\Builder;

use Avltree\Scraper\Domain\Results\City;
use Avltree\Scraper\Domain\Results\Club;
use Avltree\Scraper\Domain\Results\ClubName;
use Avltree\Scraper\Domain\Results\Contender;
use Avltree\Scraper\Domain\Results\FirstName;
use Avltree\Scraper\Domain\Results\LastName;
use Avltree\Scraper\Domain\Results\Place;
use Avltree\Scraper\Domain\Results\Result;
use Avltree\Scraper\Domain\Results\Score;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class ResultBuilder
{
    private UuidInterface $id;
    private Place         $place;
    private Contender     $contender;
    private Club          $club;
    private Score         $score;

    private function __construct()
    {
        // TODO consider using other builders here
        $this->id        = Uuid::uuid4();
        $this->place     = new Place(random_int(1, 100));
        $this->contender = new Contender(Uuid::uuid4(), new FirstName('Jan'), new LastName('Kowalski'));
        $this->club      = new Club(new ClubName('Obrońca'), new City('Troszyn'));
        $this->score     = new Score(random_int(0, 100));
    }

    public static function new(): self
    {
        return new self();
    }

    public function build(): Result
    {
        return new Result($this->id, $this->place, $this->contender, $this->club, $this->score);
    }
}
