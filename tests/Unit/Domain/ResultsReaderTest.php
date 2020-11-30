<?php declare(strict_types=1);

namespace Tests\Unit\Domain;

use Avltree\Scraper\Domain\ResultsDownloader;
use Avltree\Scraper\Domain\ResultsParser;
use Avltree\Scraper\Domain\ResultsReader;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Util\Builder\ResultBuilder;

class ResultsReaderTest extends TestCase
{
    private ResultsDownloader|MockObject $downloader;
    private ResultsParser|MockObject     $parser;
    private ResultsReader                $reader;

    protected function setUp(): void
    {
        $this->downloader = $this->createMock(ResultsDownloader::class);
        $this->parser     = $this->createMock(ResultsParser::class);
        $this->reader     = new ResultsReader($this->downloader, $this->parser);
    }

    /** @test */
    public function shouldReadResults(): void
    {
        $this->downloader->method('readHtml')
            ->willReturn(['<div>Dummy HTML</div>']);
        $this->parser->method('parse')
            ->willReturn(
                [
                    ResultBuilder::new()->build()
                ]
            );

        $results = $this->reader->read();

        $this->assertCount(1, $results);
    }
}
