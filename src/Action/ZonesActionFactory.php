<?php
declare(strict_types = 1);

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @codeCoverageIgnore
 */
final class ZonesActionFactory
{
    public function __invoke(ContainerInterface $container) : ZonesAction
    {
        return new ZonesAction(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
