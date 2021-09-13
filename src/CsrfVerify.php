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

namespace CsrfVerify;

use CsrfVerify\entity\CsrfVerifyEntity;
use CsrfVerify\interfaces\CsrfVerifyInterface;
use CsrfVerify\interfaces\SimpleCacheInterface;

class CsrfVerify implements CsrfVerifyInterface
{

    protected $prefix = 'CsrfVerify:';

    /**
     * 创建
     * @param CsrfVerifyEntity $entity
     * @param SimpleCacheInterface $cache
     * @return string
     */
    public function create(CsrfVerifyEntity $entity, SimpleCacheInterface $cache): string
    {
        $token = $this->build($entity);
        $cacheName = $this->getCacheName($entity);
        $cache->set($cacheName, $token);
        return $token;
    }

    /**
     * 验证
     * @param string $token
     * @param CsrfVerifyEntity $entity
     * @param SimpleCacheInterface $cache
     * @return bool
     */
    public function verify(string $token, CsrfVerifyEntity $entity, SimpleCacheInterface $cache): bool
    {
        $cacheName = $this->getCacheName($entity);
        if ($cache->get($cacheName) == $token) {
            return true;
        }
        return false;
    }

    /**
     * 构建验证信息
     * @param CsrfVerifyEntity $entity
     * @return string
     */
    protected function build(CsrfVerifyEntity $entity): string
    {
        $tokenString = $entity->getMark() . '_' . $entity->getSecret() . time();
        $token = md5($tokenString);
        $token = strtoupper($token);
        return $token;
    }

    /**
     * 换取缓存名
     * @param CsrfVerifyEntity $entity
     * @return string
     */
    protected function getCacheName(CsrfVerifyEntity $entity): string
    {
        return $this->prefix = $entity->getMark() . ':' . $entity->getSecret();
    }

}