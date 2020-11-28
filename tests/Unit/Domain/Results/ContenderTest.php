<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Results;

use Avltree\Scraper\Domain\Results\Contender;
use Avltree\Scraper\Domain\Results\FirstName;
use Avltree\Scraper\Domain\Results\LastName;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ContenderTest extends TestCase
{
    /** @test */
    public function shouldCreate(): void
    {
        $expectedId        = Uuid::uuid4();
        $expectedFirstName = new FirstName('Jan');
        $expectedLastName  = new LastName('Kowalski');

        $contender = new Contender($expectedId, $expectedFirstName, $expectedLastName);

        $this->assertEquals($expectedId, $contender->id());
        $this->assertEquals($expectedFirstName, $contender->firstName());
        $this->assertEquals($expectedLastName, $contender->lastName());
        $this->assertEquals('Jan Kowalski', $contender->fullName());
    }
}
