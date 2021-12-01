<?php

declare(strict_types=1);

$container['cms_repository'] = static function (Pimple\Container $container): App\Repository\CmsRepository {
    return new App\Repository\CmsRepository($container['db']);
};
