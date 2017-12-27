<?php
declare(strict_types=1);

use App\Action;

return [
    'dependencies' => [
        'factories' => [
            Action\IndexAction::class => Action\IndexActionFactory::class,
        ],
    ],
];
