<?php

// +----------------------------------------------------------------------
// | EasyAdmin
// +----------------------------------------------------------------------
// | PHP交流群: 763822524
// +----------------------------------------------------------------------
// | 开源协议  https://mit-license.org 
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zhongshaofa/EasyAdmin
// +----------------------------------------------------------------------

namespace Test;


use CsrfVerify\drive\ProcessCache;
use PHPUnit\Framework\TestCase;

/**
 * ./vendor/bin/phpunit tests/CacheTest.php
 * Class CacheTest
 * @package Test
 */
class CacheTest extends TestCase
{

    private $cache;

    private $cacheName='test';

    private $cacheValue='testValue';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->cache = new ProcessCache();
    }

    public function testSet()
    {
        $result = $this->cache->set($this->cacheName, $this->cacheValue);
        $this->assertEquals($result, true);
    }

    public function testGet()
    {
        $result = $this->cache->get($this->cacheName);
        $this->assertEquals($result, $this->cacheValue);
    }

    public function testDelete()
    {
        $result =  $this->cache->delete($this->cacheName);
        $this->assertEquals($result, true);
        $result = $this->cache->get($this->cacheName);
        $this->assertEmpty($result);
    }

}