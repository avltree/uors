<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Results;

use Avltree\Scraper\Domain\Exception\Results\InvalidName;
use Avltree\Scraper\Domain\Results\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    /** @test */
    public function shouldCreate(): void
    {
        $expectedValue = 'Bogus';

        $name = new class($expectedValue) extends Name {
        };

        $this->assertEquals($expectedValue, $name->value());
    }

    /**
     * @test
     * @dataProvider invalidData
     */
    public function shouldThrowExceptionOnInvalidName(string $invalidValue): void
    {
        $this->expectException(InvalidName::class);

        new class($invalidValue) extends Name {
        };
    }

    public function invalidData(): array
    {
        return [
            'empty-name'          => [''],
            // TODO those also should be invalid
//            'contains-whitespace' => ["Ja\nusz"],
//            'contains-numbers'    => ['J4nu5z'],
        ];
    }
}
