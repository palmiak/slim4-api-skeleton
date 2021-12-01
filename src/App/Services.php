<?php

declare(strict_types=1);

$container['cms_service'] = static function (Pimple\Container $container): App\Service\CmsService {
    return new App\Service\CmsService($container['cms_repository']);
};

$container['language_service'] = static function (Pimple\Container $container): App\Service\LanguageService {
    return new App\Service\LanguageService($container['language_repository']);
};
