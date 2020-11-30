<?php declare(strict_types=1);

namespace Avltree\Scraper\Infrastructure\ResultsDownloader;

use Avltree\Scraper\Domain\ResultsDownloader\FormParser;
use PHPHtmlParser\Dom;
use PHPHtmlParser\Dom\Node\AbstractNode;
use PHPHtmlParser\Dom\Node\HtmlNode;

class PhpHtmlFormParser implements FormParser
{
    private Dom $dom;

    public function __construct(Dom $dom)
    {
        $this->dom = $dom;
    }

    public function getCompetitionNames(string $formHtml, string $formPattern): array
    {
        $this->dom->loadStr($formHtml);
        /** @var HtmlNode $select */
        $select = $this->dom->find($formPattern)[0];

        // TODO exclude some invalid data
        return array_values(
            array_map(
                static fn (HtmlNode $node) => $node->text,
                array_filter(
                    $select->getChildren(),
                    static fn (AbstractNode $node): bool => $node instanceof HtmlNode && '-- wybierz --' !== $node->text
                )
            )
        );
    }
}
