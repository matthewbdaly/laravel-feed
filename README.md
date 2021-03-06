# laravel-feed

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-feed.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-feed)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-feed/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-feed?branch=master)

Laravel service provider for using the Zend Framework feed package.

Installation
------------

```bash
composer require matthewbdaly/laravel-feed
```

Usage
-----

Refer to the [Zend documentation](https://docs.zendframework.com/zend-feed/intro/) on how to use it. This package simply allows you to resolve the appropriate interfaces to instances of the reader, writer and PubSubHubbub implementations.

The implementation of the reader uses HTTPlug, so you will also need to install a client implementation [as specified here](http://docs.php-http.org/en/latest/httplug/users.html) in order to actually use this client. That way, you won't be locked into any particular HTTP client.
