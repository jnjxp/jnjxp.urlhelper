<?php
/**
 * View Helper for Aura\Router
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  ViewHelper
 * @package   Jnjxp\UrlHelper
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://github.com/jnjxp/jnjxp.urlhelper
 */

namespace Jnjxp\UrlHelper;

use Aura\Router\Generator;
use Aura\Router\Matcher;

use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * UrlHelper
 *
 * @category ViewHelper
 * @package  Jnjxp\UrlHelper
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.urlhelper
 */
class UrlHelper
{
    /**
     * Generates URL paths from routes.
     *
     * @var Generator
     *
     * @access protected
     */
    protected $generator;

    /**
     * Contains Matched and Failed route after routing
     *
     * @var Matcher
     *
     * @access protected
     */
    protected $matcher;

    /**
     * Request
     *
     * @var Request
     *
     * @access protected
     */
    protected $request;

    /**
     * __construct
     *
     * @param Generator $generator route generator
     * @param Matcher   $matcher   route matcher
     *
     * @access public
     */
    public function __construct(Generator $generator, Matcher $matcher)
    {
        $this->generator = $generator;
        $this->matcher = $matcher;
    }

    /**
     * Generate URL or return helper
     *
     * @param string $name route name
     * @param array  $data array of params
     *
     * @return $this|string
     *
     * @access public
     */
    public function __invoke($name = null, $data = [])
    {
        if (null === $name) {
            return $this;
        }
        return $this->generate($name, $data);
    }

    /**
     * Set current request
     *
     * @param Request $request current request
     *
     * @return Request
     * @throws Exception if request already set
     *
     * @access public
     */
    public function setRequest(Request $request)
    {
        if (null !== $this->request) {
            throw new \Exception('Request already set');
        }
        $this->request = $request;
    }

    /**
     * Get current request
     *
     * @return Request
     *
     * @access public
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get current route
     *
     * @return \Aura\Router\Route|false
     *
     * @access public
     */
    public function getRoute()
    {
        return $this->matcher->getMatchedRoute();
    }

    /**
     * Get failed route
     *
     * @return \Aura\Router\Route
     *
     * @access public
     */
    public function getFailedRoute()
    {
        return $this->matcher->getFailedRoute();
    }

    /**
     * Generate URL
     *
     * @param string $name name of route
     * @param array  $data params
     *
     * @return string
     *
     * @access public
     */
    public function generate($name, $data = [])
    {
        return $this->generator->generate($name, $data);
    }

    /**
     * Generate raw URL
     *
     * @param string $name name of route
     * @param array  $data params
     *
     * @return string
     *
     * @access public
     */
    public function generateRaw($name, $data = [])
    {
        return $this->generator->generateRaw($name, $data);
    }
}
