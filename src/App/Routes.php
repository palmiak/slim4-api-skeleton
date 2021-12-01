<?php

declare(strict_types=1);

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/cms', App\Controller\Cms\GetAll::class);
$app->post('/cms', App\Controller\Cms\Create::class);
$app->get('/cms/{id}', App\Controller\Cms\GetOne::class);
$app->put('/cms/{id}', App\Controller\Cms\Update::class);
$app->delete('/cms/{id}', App\Controller\Cms\Delete::class);
