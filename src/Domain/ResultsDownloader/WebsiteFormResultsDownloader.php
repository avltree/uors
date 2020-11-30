<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\ResultsDownloader;

use Avltree\Scraper\Domain\ResultsDownloader;

class WebsiteFormResultsDownloader implements ResultsDownloader
{
    // TODO those should be injected from config based on WebsiteName
    private string         $formUrl = 'http://www.obronca.org/zawody/wyszukiwarka/';
    private string         $formPattern = '#zawody';
    private PageDownloader $pageDownloader;
    private FormParser     $formParser;

    public function __construct(PageDownloader $pageDownloader, FormParser $formParser)
    {
        $this->pageDownloader = $pageDownloader;
        $this->formParser     = $formParser;
    }

    public function readHtml(): array
    {
        $formHtml = $this->pageDownloader->downloadIndex($this->formUrl);

        return array_map(
            fn (string $competitionName) => $this->pageDownloader->downloadResultsPage(
                $this->formUrl,
                $competitionName
            ),
            $this->formParser->getCompetitionNames($formHtml, $this->formPattern)
        );
    }
}
