<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\UrlHelper;

use Aura\Router\RouterContainer;
use Aura\Router\Generator;
use Aura\Router\Matcher;

class ContainerTest extends \PHPUnit_Framework_TestCase
{

    protected $contianer;

    public function setUp()
    {
        $matcher = $this->getMockBuilder(Matcher::class)
            ->disableOriginalConstructor()
            ->getMock();

        $generator = $this->getMockBuilder(Generator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $routerContainer = $this->getMockBuilder(RouterContainer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $routerContainer->expects($this->once())
            ->method('getMatcher')
            ->will($this->returnValue($matcher));

        $routerContainer->expects($this->once())
            ->method('getGenerator')
            ->will($this->returnValue($generator));

        $this->container = new Container($routerContainer);
    }

    public function testGetHelper()
    {
        $this->assertInstanceOf(
            UrlHelper::class,
            $this->container->getHelper()
        );
    }

    public function testGetMiddleware()
    {
        $this->assertInstanceOf(
            Middleware::class,
            $this->container->getMiddleware()
        );
    }

}
