<?php
declare(strict_types=1);

namespace AppTest\Finder;

use App\Entity\Item;
use App\Finder\DoctrineFindItemById;
use App\Finder\Exception\ItemDoesNotExist;
use App\VO\ItemId;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Finder\DoctrineFindItemById
 */
final class DoctrineFindItemByIdTest extends TestCase
{
    /**
     * @var EntityManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $entityManager;

    /**
     * @var DoctrineFindItemById
     */
    private $finder;

    public function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);

        $this->finder = new DoctrineFindItemById($this->entityManager);
    }

    public function testFindWithItemThatExists(): void
    {
        $item = Item::fromName(uniqid('itemName', true));
        $this->entityManager->expects(self::once())
            ->method('find')
            ->with(Item::class, (string)$item->id())
            ->willReturn($item);

        self::assertSame($item, $this->finder->find($item->id()));
    }

    public function testFindThrowsExceptionWhenItemDoesNotExist(): void
    {
        $itemId = ItemId::new();
        $this->entityManager->expects(self::once())
            ->method('find')
            ->with(Item::class, (string)$itemId)
            ->willReturn(null);

        $this->expectException(ItemDoesNotExist::class);
        $this->finder->find($itemId);
    }
}
