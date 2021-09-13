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
use think\facade\Session;

/**
 * TP框架内置缓存实现
 * Class ThinkphpCache
 * @package CsrfVerify\drive
 */
class ThinkphpCache implements SimpleCacheInterface
{

    public function set(string $string, string $value): bool
    {
        Session::set($string, $value);
        return true;
    }

    public function get(string $string): ?string
    {
        $cache = Session::get($string);
        return empty($cache) ? null : $cache;
    }

    public function delete(string $string): bool
    {
        Session::delete($string);
        return true;
    }


}