<?php

declare(strict_types=1);

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/cms', App\Controller\Cms\GetAll::class);
$app->post('/cms', App\Controller\Cms\Create::class);
$app->get('/cms/{id}', App\Controller\Cms\GetOne::class);
$app->put('/cms/{id}', App\Controller\Cms\Update::class);
$app->delete('/cms/{id}', App\Controller\Cms\Delete::class);

$app->get('/language', App\Controller\Language\GetAll::class);
$app->post('/language', App\Controller\Language\Create::class);
$app->get('/language/{id}', App\Controller\Language\GetOne::class);
$app->put('/language/{id}', App\Controller\Language\Update::class);
$app->delete('/language/{id}', App\Controller\Language\Delete::class);
