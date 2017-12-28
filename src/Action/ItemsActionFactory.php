<?php
declare(strict_types = 1);

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @codeCoverageIgnore
 */
final class ItemsActionFactory
{
    public function __invoke(ContainerInterface $container) : ItemsAction
    {
        return new ItemsAction(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
