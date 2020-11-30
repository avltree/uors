<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Factory;

use Avltree\Scraper\Domain\Exception\UnsupportedWebsite;
use Avltree\Scraper\Domain\Factory\ResultsDownloaderFactory;
use Avltree\Scraper\Domain\ResultsDownloader;
use Avltree\Scraper\Domain\WebsiteName;
use PHPUnit\Framework\TestCase;

class ResultsDownloaderFactoryTest extends TestCase
{
    private ResultsDownloaderFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new ResultsDownloaderFactory();
    }

    /**
     * @test
     * @dataProvider supportedWebsites
     */
    public function shouldCreateDownloader(string $websiteName, string $expectedClass): void
    {
        $website = new WebsiteName($websiteName);

        $downloader = $this->factory->create($website);

        $this->assertInstanceOf($expectedClass, $downloader);
    }

    public function supportedWebsites(): array
    {
        return [
            [WebsiteName::OBRONCA, ResultsDownloader\WebsiteFormResultsDownloader::class],
        ];
    }

    /**
     * @test
     * @dataProvider unsupportedWebsites
     */
    public function shouldThrowExceptionOnUnsupportedWebsite(string $websiteName): void
    {
        $website = new WebsiteName($websiteName);

        $this->expectException(UnsupportedWebsite::class);

        $this->factory->create($website);
    }

    public function unsupportedWebsites(): array
    {
        return [
            ['Not supported'],
        ];
    }
}
