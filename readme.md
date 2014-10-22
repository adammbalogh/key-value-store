#Key Value Store

[![Author](http://img.shields.io/badge/author-@adammbalogh-blue.svg?style=flat)](https://twitter.com/adammbalogh)
[![Build Status](https://img.shields.io/travis/adammbalogh/key-value-store/master.svg?style=flat)](https://travis-ci.org/adammbalogh/key-value-store)
[![Coverage Status](https://img.shields.io/coveralls/adammbalogh/key-value-store.svg?style=flat)](https://coveralls.io/r/adammbalogh/key-value-store)
[![Quality Score](https://img.shields.io/scrutinizer/g/adammbalogh/key-value-store.svg?style=flat)](https://scrutinizer-ci.com/g/adammbalogh/key-value-store)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/adammbalogh/key-value-store.svg?style=flat)](https://packagist.org/packages/adammbalogh/key-value-store)
[![Total Downloads](https://img.shields.io/packagist/dt/adammbalogh/key-value-store.svg?style=flat)](https://packagist.org/packages/adammbalogh/key-value-store)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f1ddb443-d2a1-499a-926a-060cdecd4100/small.png)](https://insight.sensiolabs.com/projects/f1ddb443-d2a1-499a-926a-060cdecd4100)

**Key Value Store** is a library which abstracts the most used key value stores, like Redis or Memcached.

# Description

This library provides an abstraction layer for key value stores. It is literally an abstraction because it contains only contracts and fundemantal implementations. So you need to install a store specific implementation a.k.a. an adapter.

# Adapters

**These are separate repositories!**

| Adapter name  | Repository |
|---------------|------------|
| Memory        | [key-value-store-memory](https://github.com/adammbalogh/key-value-store-memory) |
| Shared Memory | [key-value-store-shared-memory](https://github.com/adammbalogh/key-value-store-shared-memory) |
| File          | [key-value-store-file](https://github.com/adammbalogh/key-value-store-file) |
| Memcached     | [key-value-store-memcached](https://github.com/adammbalogh/key-value-store-memcached) |
| Redis         | [key-value-store-redis](https://github.com/adammbalogh/key-value-store-redis) |
| Replicator    | [key-value-store-replicator](https://github.com/adammbalogh/key-value-store-replicator) |
| Null          | [key-value-store-null](https://github.com/adammbalogh/key-value-store-null) |

### Planned adapters

* Apc
* Couchbase
* Memcache
* ?

# Installation

This is an abstract package not a store specific implementation.

**Please visit the links in the [Adapters](https://github.com/adammbalogh/key-value-store#adapters) section.**

# Usage

*with Redis (through predis/predis)*

```php
<?php
use AdammBalogh\KeyValueStore\KeyValueStore;
use AdammBalogh\KeyValueStore\Adapter\RedisAdapter as Adapter;
use Predis\Client as RedisClient;

$redisClient = new RedisClient();

$adapter = new Adapter($redisClient);

$kvs = new KeyValueStore($adapter);

$kvs->set('sample_key', 'Sample value');
$kvs->get('sample_key');
$kvs->delete('sample_key');
```

**To see other specific examples please visit the links in the [Adapters](https://github.com/adammbalogh/key-value-store#adapters) section.**

# API

You can call all of the API methods on a instance of ```KeyValueStore```.

## Key

```php
/**
 * Removes a key.
 *
 * @param string $key
 *
 * @return bool True if the deletion was successful, false if the deletion was unsuccessful.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function delete($key);

/**
 * Sets a key's time to live in seconds.
 *
 * @param string $key
 * @param int $seconds
 *
 * @return bool True if the timeout was set, false if the timeout could not be set.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function expire($key, $seconds);

/**
 * Returns the remaining time to live of a key that has a timeout.
 *
 * @param string $key
 *
 * @return int Ttl in seconds.
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function getTtl($key);

/**
 * Determines if a key exists.
 *
 * @param string $key
 *
 * @return bool True if the key does exist, false if the key does not exist.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function has($key);

/**
 * Removes the existing timeout on key, turning the key from volatile (a key with an expire set)
 * to persistent (a key that will never expire as no timeout is associated).
 *
 * @param string $key
 *
 * @return bool True if the persist was success, false if the persis was unsuccessful.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function persist($key);
```

## Value

```php
/**
 * Gets the value of a key.
 *
 * @param string $key
 *
 * @return mixed The value of the key.
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function get($key);

/**
 * Sets the value of a key.
 *
 * @param string $key
 * @param mixed $value Can be any of serializable data type.
 *
 * @return bool True if the set was successful, false if it was unsuccessful.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function set($key, $value);
```

## Server

```php
/**
 * Removes all keys.
 *
 * @return void
 *
 * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
 */
public function flush();
```

# Support

[![Support with Gittip](http://img.shields.io/gittip/adammbalogh.svg?style=flat)](https://www.gittip.com/adammbalogh/)
