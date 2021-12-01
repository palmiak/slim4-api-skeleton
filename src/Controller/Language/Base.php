<?php

declare(strict_types=1);

namespace App\Controller\Language;

use App\Service\LanguageService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getLanguageService(): LanguageService
    {
        return $this->container->get('language_service');
    }
}
