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

namespace CsrfVerify\interfaces;

use CsrfVerify\entity\CsrfVerifyEntity;

interface CsrfVerifyInterface
{

    /**
     * 生成
     * @param CsrfVerifyEntity $entity 实体
     * @param SimpleCacheInterface $cache 缓存工具
     * @return string
     */
    public function create(CsrfVerifyEntity $entity, SimpleCacheInterface $cache): string;


    /**
     * 校验
     * @param string $token token
     * @param CsrfVerifyEntity $entity 实体
     * @param SimpleCacheInterface $cache 缓存工具
     * @return bool
     */
    public function verify(string $token, CsrfVerifyEntity $entity, SimpleCacheInterface $cache): bool;

}