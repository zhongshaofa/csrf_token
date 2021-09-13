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


/**
 * 简单缓存
 * Interface SimpleCacheInterface
 * @package CsrfVerify\interfaces
 */
interface SimpleCacheInterface
{

    /**
     * 设置缓存
     * @param string $string
     * @param string $value
     * @return bool
     */
    public function set(string $string, string $value): bool;

    /**
     * 获取缓存
     * @param string $string
     * @return string|null
     */
    public function get(string $string): ?string;

    /**
     * 删除缓存
     * @param string $string
     * @return bool
     */
    public function delete(string $string): bool;

}