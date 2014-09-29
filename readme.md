#Key-Value Store by [@adammbalogh](http://twitter.com/adammbalogh)

[![Build Status](https://img.shields.io/travis/adammbalogh/key-value-store/master.svg?style=flat)](https://travis-ci.org/adammbalogh/key-value-store)
[![Coverage Status](https://img.shields.io/coveralls/adammbalogh/key-value-store.svg?style=flat)](https://coveralls.io/r/adammbalogh/key-value-store)
[![Quality Score](https://img.shields.io/scrutinizer/g/adammbalogh/key-value-store.svg?style=flat)](https://scrutinizer-ci.com/g/adammbalogh/key-value-store)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/adammbalogh/key-value-store.svg?style=flat)](https://packagist.org/packages/adammbalogh/key-value-store)
[![Total Downloads](https://img.shields.io/packagist/dt/adammbalogh/key-value-store.svg?style=flat)](https://packagist.org/packages/adammbalogh/key-value-store)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f1ddb443-d2a1-499a-926a-060cdecd4100/small.png)](https://insight.sensiolabs.com/projects/f1ddb443-d2a1-499a-926a-060cdecd4100)

**Key Value Store** is a library which abstracts the most used key value stores, like Redis or Memcached.

# Description

This library provides an abstraction layer for key values stores. It is literally an abstraction because it contains only contracts and fundemantal implementations. So you need to install a store specific implementation a.k.a. an adapter.

# Support

[![Support with Gittip](http://img.shields.io/gittip/adammbalogh.svg?style=flat)](https://www.gittip.com/adammbalogh/)

# Adapters

* **File** [key-value-store-file](https://github.com/adammbalogh/key-value-store-file)
* **Memcached** [key-value-store-memcached](https://github.com/adammbalogh/key-value-store-memcached)
* **Redis** [key-value-store-redis](https://github.com/adammbalogh/key-value-store-redis)

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
```

**To see other specific examples please visit the links in the [Adapters](https://github.com/adammbalogh/key-value-store#adapters) section.**

# Installation

This is an abstract package not a speficic implementation.

**Please visit the links in the [Adapters](https://github.com/adammbalogh/key-value-store#adapters) section.**

# API

## Key

```php
/**
 * @param string $key
 *
 * @return bool True if the deletion was successful, false if the deletion was unsuccessful.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function delete($key);

/**
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
 * @return array
 *
 * @throws InternalException
 */
public function getKeys();

/**
 * Returns the remaining time to live of a key that has a timeout.
 *
 * @param string $key
 *
 * @return int Ttl in seconds
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function getTtl($key);

/**
 * @param string $key
 *
 * @return bool True if the key does exist, false if the key does not exist.
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function has($key);

/**
 * Remove the existing timeout on key, turning the key from volatile (a key with an expire set)
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

## String

```php
/**
 * @param string $key
 * @param string $value
 *
 * @return int The length of the string after the append operation.
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function append($key, $value);

/**
 * @param string $key
 *
 * @return int The value of key after the decrement
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function decrement($key);

/**
 * @param string $key
 * @param int $decrement
 *
 * @return int The value of key after the decrement
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function decrementBy($key, $decrement);

/**
 * @param string $key
 *
 * @return string The value of the key
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function get($key);

/**
 * @param string $key
 *
 * @return int
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function getValueLength($key);

/**
 * @param string $key
 *
 * @return int The value of key after the increment
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function increment($key);

/**
 * @param string $key
 * @param int $increment
 *
 * @return int The value of key after the increment
 *
 * @throws \InvalidArgumentException
 * @throws KeyNotFoundException
 * @throws InternalException
 */
public function incrementBy($key, $increment);

/**
 * @param string $key
 * @param string $value
 *
 * @return bool True if the set was successful, false if it was unsuccessful
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function set($key, $value);

/**
 * @param string $key
 * @param string $value
 *
 * @return bool True if the set was successful, false if it was unsuccessful
 *
 * @throws \InvalidArgumentException
 * @throws InternalException
 */
public function setIfNotExists($key, $value);
```

## Server

```php
/**
 * @return void
 *
 * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
 */
public function flush();
```
