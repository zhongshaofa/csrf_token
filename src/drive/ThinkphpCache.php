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

namespace CsrfVerify\drive;


use CsrfVerify\interfaces\SimpleCacheInterface;
use think\facade\Cache;

/**
 * TP框架内置缓存实现
 * Class ThinkphpCache
 * @package CsrfVerify\drive
 */
class ThinkphpCache implements SimpleCacheInterface
{

    public function set(string $string, string $value): bool
    {
        Cache::set($string, $value);
        return true;
    }

    public function get(string $string): ?string
    {
        $cache = Cache::get($string);
        return isEmpty($cache) ? null : $cache;
    }

    public function delete(string $string): bool
    {
        Cache::delete($string);
        return true;
    }


}