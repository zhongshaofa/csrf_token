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

use CsrfVerify\CsrfVerify;
use CsrfVerify\drive\ProcessCache;
use CsrfVerify\entity\CsrfVerifyEntity;
use PHPUnit\Framework\TestCase;

/**
 * ./vendor/bin/phpunit tests/CsrfVerifyTest.php
 * Class CsrfVerifyTest
 * @package Test
 */
class CsrfVerifyTest extends TestCase
{

    private $entity;

    private $service;

    private $cache;

    private $cacheName1 = "test1";

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->entity = new CsrfVerifyEntity(
            '张三',
            'azdfafghd356363785rs'
        );
        $this->cache = new ProcessCache();
        $this->service  = new CsrfVerify();
    }

    public function testCreate()
    {
        $token = $this->service->create($this->entity, $this->cache);

        $this->cache->set($this->cacheName1,$token);

        $this->assertNotEmpty($token);
    }

    public function testVerify()
    {
        $token = $this->cache->get($this->cacheName1);

        $verify = $this->service->verify($token, $this->entity, new ProcessCache());

        $this->assertEquals($verify, true);
    }

}