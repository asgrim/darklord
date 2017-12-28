<?php
declare(strict_types=1);

namespace AppTest\Action;

use App\Action\IndexAction;
use AppTest\TestHelper;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * @covers \App\Action\IndexAction
 */
final class IndexActionTest extends TestCase
{
    /**
     * @var TemplateRendererInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $renderer;

    /**
     * @var IndexAction
     */
    private $action;

    public function setUp()
    {
        $this->renderer = $this->createMock(TemplateRendererInterface::class);

        $this->action = new IndexAction($this->renderer);
    }

    public function testActionRendersTemplate() : void
    {
        $content = uniqid('content', true);
        $this->renderer->expects(self::once())->method('render')->with('app::index')->willReturn($content);

        /** @var Response\JsonResponse $response */
        $response = $this->action->process(
            new ServerRequest(['/']),
            TestHelper::shouldNotReachDelegate()
        );

        self::assertInstanceOf(Response\HtmlResponse::class, $response);
        self::assertSame($content, $response->getBody()->getContents());
    }
}
