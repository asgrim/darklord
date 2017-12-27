<?php
declare(strict_types=1);

if (!getenv('HEROKU')) {
    return [];
}

return [
    'debug' => true,
    'config_cache_enabled' => false,
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'url' => \getenv('DATABASE_URL'),
                ],
            ],
        ],
    ],
];
