<?php
declare(strict_types=1);

namespace AppTest\Finder\Exception;

use App\Finder\Exception\ItemDoesNotExist;
use App\VO\ItemId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Finder\Exception\ItemDoesNotExist
 */
final class ItemDoesNotExistTest extends TestCase
{
    public function testForId(): void
    {
        $itemId = ItemId::new();

        $exception = ItemDoesNotExist::forId($itemId);

        self::assertInstanceOf(\RuntimeException::class, $exception);
        self::assertSame(sprintf('Item with ID %s does not exist', (string)$itemId), $exception->getMessage());
    }
}
