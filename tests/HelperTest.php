<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\UrlHelper;

use Aura\Router\RouterContainer;
use Aura\Router\Generator;
use Aura\Router\Matcher;

use Zend\Diactoros\ServerRequestFactory;

class HelperTest extends \PHPUnit_Framework_TestCase
{
    protected $matcher;

    protected $generator;

    protected $helper;

    public function setUp()
    {
        $this->matcher = $this->getMockBuilder(Matcher::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->generator = $this->getMockBuilder(Generator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->helper = new UrlHelper(
            $this->generator,
            $this->matcher
        );
    }

    public function testGetHelper()
    {
        $this->assertSame(
            $this->helper,
            $this->helper->__invoke()
        );
    }

    public function testShortGen()
    {
        $name = 'name';
        $params = ['params'];

        $this->generator->expects($this->once())
            ->method('generate')
            ->with($name, $params);

        call_user_func($this->helper, $name, $params);
    }

    public function testGen()
    {
        $name = 'name';
        $params = ['params'];

        $this->generator->expects($this->once())
            ->method('generate')
            ->with($name, $params);

        $this->helper->generate($name, $params);
    }

    public function testRequest()
    {
        $req = ServerRequestFactory::fromGlobals();
        $this->helper->setRequest($req);
        $this->assertSame($req, $this->helper->getRequest());
    }

    public function testDoubleRequest()
    {
        $this->setExpectedException(\Exception::class);
        $req = ServerRequestFactory::fromGlobals();
        $this->helper->setRequest($req);
        $this->helper->setRequest($req);
    }

    public function testGetRoute()
    {
        $this->matcher->expects($this->once())
            ->method('getMatchedRoute');

        $this->helper->getRoute();
    }

    public function testGetFailedRoute()
    {
        $this->matcher->expects($this->once())
            ->method('getFailedRoute');

        $this->helper->getFailedRoute();
    }

    public function testRawGen()
    {
        $name = 'name';
        $params = ['params'];

        $this->generator->expects($this->once())
            ->method('generateRaw')
            ->with($name, $params);

        $this->helper->generateRaw($name, $params);
    }
}
