<?php
declare(strict_types=1);

namespace AppTest\Action;

use App\Action\ItemsAction;
use AppTest\TestHelper;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @covers \App\Action\ItemsAction
 */
final class ItemsActionTest extends TestCase
{
    /**
     * @var TemplateRendererInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $renderer;

    /**
     * @var ItemsAction
     */
    private $action;

    public function setUp()
    {
        $this->renderer = $this->createMock(TemplateRendererInterface::class);

        $this->action = new ItemsAction($this->renderer);
    }

    public function testActionRendersTemplate() : void
    {
        $content = uniqid('content', true);
        $this->renderer->expects(self::once())->method('render')->with('app::items')->willReturn($content);

        /** @var Response\JsonResponse $response */
        $response = $this->action->process(
            new ServerRequest(['/']),
            TestHelper::shouldNotReachDelegate()
        );

        self::assertInstanceOf(Response\HtmlResponse::class, $response);
        self::assertSame($content, $response->getBody()->getContents());
    }
}
