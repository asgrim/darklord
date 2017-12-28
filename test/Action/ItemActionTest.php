<?php
declare(strict_types=1);

namespace AppTest\Action;

use App\Action\ItemAction;
use App\Entity\Item;
use App\Finder\FindItemById;
use App\VO\ItemId;
use AppTest\TestHelper;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @covers \App\Action\ItemAction
 */
final class ItemActionTest extends TestCase
{
    /**
     * @var TemplateRendererInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $renderer;

    /**
     * @var FindItemById|\PHPUnit_Framework_MockObject_MockObject
     */
    private $findItemById;

    /**
     * @var ItemAction
     */
    private $action;

    public function setUp(): void
    {
        $this->renderer = $this->createMock(TemplateRendererInterface::class);
        $this->findItemById = $this->createMock(FindItemById::class);

        $this->action = new ItemAction($this->renderer, $this->findItemById);
    }

    public function testActionRendersTemplate() : void
    {
        $item = Item::fromName(uniqid('item', true));

        $this->findItemById->expects(self::once())
            ->method('find')
            ->with($item->id())
            ->willReturn($item);

        $content = uniqid('content', true);
        $this->renderer->expects(self::once())
            ->method('render')
            ->with('app::item', ['item' => $item])
            ->willReturn($content);

        /** @var Response\JsonResponse $response */
        $response = $this->action->process(
            (new ServerRequest(['/']))->withAttribute('itemId', (string)$item->id()),
            TestHelper::shouldNotReachDelegate()
        );

        self::assertInstanceOf(Response\HtmlResponse::class, $response);
        self::assertSame($content, $response->getBody()->getContents());
    }
}
