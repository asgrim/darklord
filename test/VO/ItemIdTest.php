<?php
declare(strict_types=1);

namespace AppTest\VO;

use App\VO\ItemId;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * @covers \App\VO\ItemId
 */
final class ItemIdTest extends TestCase
{
    public function testValidIdCanBeCreatedFromUuidString()
    {
        $uuidString = (string)Uuid::uuid4();
        $value = ItemId::fromString($uuidString);

        self::assertSame($uuidString, (string)$value);
    }

    public function testValidIdCanBeCreated()
    {
        $id = ItemId::new();

        self::assertInstanceOf(ItemId::class, $id);
        self::assertTrue(Uuid::isValid((string)$id));
    }

    public function invalidUuidProvider(): array
    {
        return [
            'empty' => [''],
            'string' => [uniqid('notAUuid', true)],
        ];
    }

    /**
     * @param mixed $invalidUuid
     * @dataProvider invalidUuidProvider
     */
    public function testInvalidIdCannotBeCreated(string $invalidUuid): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ItemId::fromString($invalidUuid);
    }
}
