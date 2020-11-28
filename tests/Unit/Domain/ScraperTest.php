<?php declare(strict_types=1);

namespace Tests\Unit\Domain;

use Avltree\Scraper\Domain\ResultsReader;
use Avltree\Scraper\Domain\ResultsStore;
use Avltree\Scraper\Domain\Scraper;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Util\Builder\ResultBuilder;

class ScraperTest extends TestCase
{
    private ResultsReader|MockObject $reader;
    private ResultsStore|MockObject  $store;
    private Scraper                  $scraper;

    protected function setUp(): void
    {
        $this->reader  = $this->createMock(ResultsReader::class);
        $this->store   = $this->createMock(ResultsStore::class);
        $this->scraper = new Scraper($this->reader, $this->store);
    }

    /** @test */
    public function shouldScrapeResults(): void
    {
        $expectedResults = [ResultBuilder::new()->build()];
        $this->reader->expects($this->once())
            ->method('read')
            ->willReturn($expectedResults);
        $this->store->expects($this->once())
            ->method('save')
            ->with($expectedResults);

        $this->scraper->scrape();
    }
}
