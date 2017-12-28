<?php
declare(strict_types=1);

use App\Action;

return [
    'dependencies' => [
        'factories' => [
            Action\IndexAction::class => Action\IndexActionFactory::class,
            Action\ItemsAction::class => Action\ItemsActionFactory::class,
            Action\ZonesAction::class => Action\ZonesActionFactory::class,
            Action\MiscAction::class => Action\MiscActionFactory::class,
            Action\ItemAction::class => Action\ItemActionFactory::class,
        ],
    ],
];
