<?php
declare(strict_types=1);

namespace App\VO;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class ItemId
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    private function __construct()
    {
    }

    public static function new(): self
    {
        $instance = new self();
        $instance->uuid = Uuid::uuid4();
        return $instance;
    }

    public static function fromString(string $uuid): self
    {
        $instance = new self();
        $instance->uuid = Uuid::fromString($uuid);
        return $instance;
    }

    public function __toString()
    {
        return (string)$this->uuid;
    }
}
