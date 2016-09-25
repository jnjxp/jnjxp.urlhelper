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
 * @category  ViewHelper
 * @package   Jnjxp\UrlHelper
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\UrlHelper;

use Aura\Router\RouterContainer;

/**
 * Container
 *
 * @category Container
 * @package  Jnjxp\UrlHelper
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 */
class Container
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
     * Generator
     *
     * @var \Aura\Router\Generator
     *
     * @access protected
     */
    protected $generator;

    /**
     * Matcher
     *
     * @var \Aura\Router\Matcher
     *
     * @access protected
     */
    protected $matcher;

    /**
     * __construct
     *
     * @param RouterContainer $routerContainer Aura router container
     *
     * @access public
     */
    public function __construct(RouterContainer $routerContainer)
    {
        $this->generator = $routerContainer->getGenerator();
        $this->matcher   = $routerContainer->getMatcher();
    }

    /**
     * Get Helper
     *
     * @return UrlHelper
     *
     * @access public
     */
    public function getHelper()
    {
        if (null === $this->helper) {
            $this->helper = new UrlHelper(
                $this->generator,
                $this->matcher
            );
        }
        return $this->helper;
    }

    /**
     * Get Middleware
     *
     * @return UrlHelperMiddleware
     *
     * @access public
     */
    public function getMiddleware()
    {
        return new Middleware($this->getHelper());
    }
}
