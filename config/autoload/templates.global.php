<?php
declare(strict_types=1);

return [
    'dependencies' => [
        'factories' => [
            Zend\Expressive\Template\TemplateRendererInterface::class =>
                Zend\Expressive\ZendView\ZendViewRendererFactory::class,
            Zend\View\HelperPluginManager::class =>
                Zend\Expressive\ZendView\HelperPluginManagerFactory::class,
        ],
    ],
    'templates' => [
        'layout' => 'layout/default',
        'map' => [
            'layout/default' => 'templates/layout/default.phtml',
            'error/error'   => 'templates/error/error.phtml',
            'error/404'      => 'templates/error/404.phtml',
        ],
        'paths' => [
            'app' => ['templates/app'],
            'layout' => ['templates/layout'],
            'error' => ['templates/error'],
        ],
    ],
    'view_helpers' => [
        'factories' => [
        ],
        'invokables' => [
        ],
        'aliases' => [
        ],
    ],
];