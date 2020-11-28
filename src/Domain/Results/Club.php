<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Results;

class Club
{
    private ClubName $name;
    private City $city;

    public function __construct(ClubName $name, City $city)
    {
        $this->name = $name;
        $this->city = $city;
    }

    public function name(): ClubName
    {
        return $this->name;
    }

    public function city(): City
    {
        return $this->city;
    }
}
