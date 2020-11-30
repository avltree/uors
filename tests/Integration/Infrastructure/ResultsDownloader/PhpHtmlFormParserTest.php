<?php declare(strict_types=1);

namespace Tests\Integration\Infrastructure\ResultsDownloader;

use Avltree\Scraper\Infrastructure\ResultsDownloader\PhpHtmlFormParser;
use PHPHtmlParser\Dom;
use PHPUnit\Framework\TestCase;

class PhpHtmlFormParserTest extends TestCase
{
    private Dom               $dom;
    private PhpHtmlFormParser $parser;

    protected function setUp(): void
    {
        $this->dom    = new Dom();
        $this->parser = new PhpHtmlFormParser($this->dom);
    }

    /** @test */
    public function shouldGetCompetitionNames(): void
    {
        // TODO should use pact mock server
        $html = file_get_contents('http://www.obronca.org/zawody/wyszukiwarka/');

        $competitionNames = $this->parser->getCompetitionNames($html, '#zawody');

        $this->assertNotEmpty($competitionNames);
    }
}
