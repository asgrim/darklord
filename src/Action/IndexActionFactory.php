<?php
declare(strict_types=1);

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @codeCoverageIgnore
 */
final class IndexActionFactory
{
    public function __invoke(ContainerInterface $container) : IndexAction
    {
        return new IndexAction(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
