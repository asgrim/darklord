<?php
declare(strict_types=1);

namespace App\Finder;

use App\Entity\Item;
use App\VO\ItemId;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineFindItemById implements FindItemById
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function find(ItemId $itemId) : Item
    {
        /** @var Item|null $item */
        $item = $this->entityManager->find(Item::class, (string)$itemId);

        if (null === $item) {
            throw Exception\ItemDoesNotExist::forId($itemId);
        }

        return $item;
    }
}
