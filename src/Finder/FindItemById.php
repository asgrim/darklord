<?php
declare(strict_types=1);

namespace App\Finder;

use App\Entity\Item;
use App\VO\ItemId;

interface FindItemById
{
    /**
     * @param ItemId $itemId
     * @return Item
     * @throws Exception\ItemDoesNotExist
     */
    public function find(ItemId $itemId): Item;
}
