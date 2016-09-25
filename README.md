# jnjxp.urlhelper
View helper for Aura Router

[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

```php
<?php

use Jnjxp\Urlhelper;

// Pass an aura router container to the urlHelperContainer
$urlHelperContainer = new UrlHelper\Container($routerContainer);

// add the middleware to your stack to have the request injected
// probably want to add it quite late
$stack->middle($urlHelperContainer->getMiddleware());

// add the helper to aura html helpers
$helpers->set('url', [$urlHelperContainer, 'getHelper']);


```


[ico-version]: https://img.shields.io/packagist/v/jnjxp/urlhelper.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jnjxp/jnjxp.urlhelper/develop.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jnjxp/jnjxp.urlhelper.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jnjxp/jnjxp.urlhelper.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jnjxp/urlhelper
[link-travis]: https://travis-ci.org/jnjxp/jnjxp.urlhelper
[link-scrutinizer]: https://scrutinizer-ci.com/g/jnjxp/jnjxp.urlhelper
[link-code-quality]: https://scrutinizer-ci.com/g/jnjxp/jnjxp.urlhelper
