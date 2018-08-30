<?php
declare(strict_types=1);

namespace App\Action;

use App\Finder\DoctrineFindItemById;
use Doctrine\ORM\EntityManagerInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @codeCoverageIgnore
 */
final class ItemActionFactory
{
    public function __invoke(ContainerInterface $container) : ItemAction
    {
        return new ItemAction(
            $container->get(TemplateRendererInterface::class),
            new DoctrineFindItemById(
                $container->get(EntityManagerInterface::class)
            )
        );
    }
}
