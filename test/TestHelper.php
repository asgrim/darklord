<?php
declare(strict_types=1);

namespace AppTest;

use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ServerRequestInterface;

final class TestHelper
{
    /**
     * Returns a DelegateInterface implementation that will always cause a test to fail if executed.
     *
     * @return DelegateInterface
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public static function shouldNotReachDelegate() : DelegateInterface
    {
        return new class implements DelegateInterface {
            public function process(ServerRequestInterface $request)
            {
                Assert::fail('Should not reach delegate');
            }
        };
    }

    public static function simpleCallableDelegate(callable $callable) : DelegateInterface
    {
        return new class($callable) implements DelegateInterface {
            /**
             * @var callable
             */
            private $callable;

            public function __construct(callable $callable)
            {
                $this->callable = $callable;
            }

            public function process(ServerRequestInterface $request)
            {
                $callable = $this->callable;
                return $callable($request);
            }
        };
    }
}
