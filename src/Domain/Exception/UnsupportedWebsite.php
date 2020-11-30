<?php declare(strict_types=1);

namespace Avltree\Scraper\Domain\Exception;

use Avltree\Scraper\Domain\WebsiteName;

class UnsupportedWebsite extends \DomainException
{
    public function __construct(WebsiteName $website)
    {
        parent::__construct(sprintf("Website '%s' is not supported", $website->value()));
    }
}
