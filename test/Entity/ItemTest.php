<?php
declare(strict_types=1);

namespace AppTest\Entity;

use App\Entity\Item;
use App\VO\ItemId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Entity\Item
 */
final class ItemTest extends TestCase
{
    public function testMethods(): void
    {
        $name = uniqid('itemName', true);
        $item = Item::fromName($name);

        self::assertInstanceOf(ItemId::class, $item->id());
        self::assertSame($name, $item->name());
    }
}
