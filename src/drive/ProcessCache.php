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

/**
 * 进程内缓存
 * Class ProcessCache
 * @package CsrfVerify\drive
 */
class ProcessCache implements SimpleCacheInterface
{

    private static $cacheList = [];

    public function set(string $string, string $value): bool
    {
        self::$cacheList[$string] = $value;
        return true;
    }

    public function get(string $string): ?string
    {
        return self::$cacheList[$string] ?? null;
    }

    public function delete(string $string): bool
    {
        if (isset(self::$cacheList[$string])) {
            unset(self::$cacheList[$string]);
        }
        return true;
    }

}