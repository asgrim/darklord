<?php
declare(strict_types=1);

namespace App\Action;

use App\Finder\FindItemById;
use App\VO\ItemId;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

final class ItemAction implements MiddlewareInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    /**
     * @var FindItemById
     */
    private $findItemById;

    public function __construct(TemplateRendererInterface $renderer, FindItemById $findItemById)
    {
        $this->renderer = $renderer;
        $this->findItemById = $findItemById;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : HtmlResponse
    {
        return new HtmlResponse($this->renderer->render(
            'app::item',
            [
                'item' => $this->findItemById->find(ItemId::fromString($request->getAttribute('itemId'))),
            ]
        ));
    }
}
