<?php

declare(strict_types=1);

namespace App\Controller\Cms;

use App\Service\CmsService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getCmsService(): CmsService
    {
        return $this->container->get('cms_service');
    }
}
