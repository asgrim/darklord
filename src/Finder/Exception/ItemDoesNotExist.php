<?php
declare(strict_types=1);

namespace App\Finder\Exception;

use App\VO\ItemId;
use RuntimeException;

final class ItemDoesNotExist extends RuntimeException
{
    public static function forId(ItemId $itemId): self
    {
        return new self(sprintf('Item with ID %s does not exist', (string)$itemId));
    }
}
