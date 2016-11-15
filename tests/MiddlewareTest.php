<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\UrlHelper;

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;

class MiddlewareTest extends \PHPUnit_Framework_TestCase
{

    public function testSetRequest()
    {
        $helper = $this->getMockBuilder(UrlHelper::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request  = ServerRequestFactory::fromGlobals();
        $response = new Response;

        $helper->expects($this->once())
            ->method('setRequest')
            ->with($request);

        $ware = new Middleware($helper);

        $ware($request, $response, function (){});
    }
}
