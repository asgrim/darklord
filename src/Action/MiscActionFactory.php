<?php
declare(strict_types=1);

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @codeCoverageIgnore
 */
final class MiscActionFactory
{
    public function __invoke(ContainerInterface $container) : MiscAction
    {
        return new MiscAction(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
