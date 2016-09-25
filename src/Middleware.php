<?php
/**
 * UrlHelper
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Middleware
 * @package   Jnjxp\UrlHelper
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\UrlHelper;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Middleware
 *
 * @category Middleware
 * @package  Jnjxp\UrlHelper
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 */
class Middleware
{
    /**
     * Helper
     *
     * @var UrlHelper
     *
     * @access protected
     */
    protected $helper;

    /**
     * __construct
     *
     * @param UrlHelper $helper url helper
     *
     * @access public
     */
    public function __construct(UrlHelper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * __invoke
     *
     * @param Request  $request  Request
     * @param Response $response Response
     * @param callable $next     next callable
     *
     * @return Response
     *
     * @access public
     */
    public function __invoke(
        Request $request,
        Response $response,
        callable $next
    ) {
        $this->helper->setRequest($request);
        return $next($request, $response);
    }
}
