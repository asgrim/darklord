<?php
declare(strict_types=1);
/** @var \Zend\Expressive\Application $app */

$app->get('/', \App\Action\IndexAction::class, 'index');
$app->get('/items', \App\Action\ItemsAction::class, 'items');
$app->get('/zones', \App\Action\ZonesAction::class, 'zones');
$app->get('/misc', \App\Action\MiscAction::class, 'misc');
$app->get('/item/{itemId}', \App\Action\ItemAction::class, 'item');
