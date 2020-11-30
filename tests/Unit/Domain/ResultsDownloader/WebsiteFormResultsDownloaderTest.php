<?php declare(strict_types=1);

namespace Tests\Unit\Domain\ResultsDownloader;

use Avltree\Scraper\Domain\ResultsDownloader\FormParser;
use Avltree\Scraper\Domain\ResultsDownloader\PageDownloader;
use Avltree\Scraper\Domain\ResultsDownloader\WebsiteFormResultsDownloader;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class WebsiteFormResultsDownloaderTest extends TestCase
{
    private PageDownloader|MockObject    $pageDownloader;
    private FormParser|MockObject        $formParser;
    private WebsiteFormResultsDownloader $downloader;

    protected function setUp(): void
    {
        $this->pageDownloader = $this->createMock(PageDownloader::class);
        $this->formParser     = $this->createMock(FormParser::class);
        $this->downloader     = new WebsiteFormResultsDownloader($this->pageDownloader, $this->formParser);
    }

    /** @test */
    public function shouldDownloadPages(): void
    {
        $formUrl  = 'http://www.obronca.org/zawody/wyszukiwarka/';
        $formHtml = 'some-form-html';

        // TODO refactor when config is used and VOs are defined
        $this->pageDownloader->method('downloadIndex')
            ->with($formUrl)
            ->willReturn($formHtml);
        $this->formParser->method('getCompetitionNames')
            ->with($formHtml, '#zawody')
            ->willReturn(['uri-1', 'uri-2']);
        $this->pageDownloader->expects($this->exactly(2))
            ->method('downloadResultsPage')
            ->withConsecutive([$formUrl, 'uri-1'], [$formUrl, 'uri-2'])
            ->willReturn('some-page-html');

        $pages = $this->downloader->readHtml();

        $this->assertCount(2, $pages);
    }
}
