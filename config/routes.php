<?php
declare(strict_types=1);
/** @var \Zend\Expressive\Application $app */

$app->get('/', \App\Action\IndexAction::class, 'index');
$app->get('/items', \App\Action\IndexAction::class, 'items');
$app->get('/zones', \App\Action\IndexAction::class, 'zones');
$app->get('/misc', \App\Action\IndexAction::class, 'misc');
