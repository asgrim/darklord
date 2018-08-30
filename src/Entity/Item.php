<?php
declare(strict_types=1);

namespace App\Entity;

use App\VO\ItemId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var string
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=1024, nullable=false)
     * @var string
     */
    private $name;

    private function __construct()
    {
        $this->id = (string)ItemId::new();
    }

    public static function fromName(string $name): self
    {
        $instance = new self();
        $instance->name = $name;
        return $instance;
    }

    public function id() : ItemId
    {
        return ItemId::fromString($this->id);
    }

    public function name(): string
    {
        return $this->name;
    }
}
