<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Results;

use Ramsey\Uuid\UuidInterface;

class Result
{
    // TODO refactor to entities and VOs
    private UuidInterface $id;
    private Place         $place;
    private Contender     $contender;
    private Club          $club;
    private Score         $score;

    public function __construct(UuidInterface $id, Place $place, Contender $contender, Club $club, Score $score)
    {
        $this->id        = $id;
        $this->place     = $place;
        $this->contender = $contender;
        $this->club      = $club;
        $this->score     = $score;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function place(): Place
    {
        return $this->place;
    }

    public function contender(): Contender
    {
        return $this->contender;
    }

    public function club(): Club
    {
        return $this->club;
    }

    public function score(): Score
    {
        return $this->score;
    }
}
