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

namespace CsrfVerify\entity;

/**
 * 实体
 * Class CsrfVerifyEntity
 * @package CsrfVerify\entity
 */
class CsrfVerifyEntity
{

    /**
     * 标识（例如：用户ID）
     * @var string
     */
    protected $mark;

    /**
     * 秘钥，可自行定义
     * @var string
     */
    protected $secret;

    /**
     * CsrfVerifyEntity constructor.
     * @param string $mark 标识（例如：用户ID）
     * @param string $secret 秘钥，可自行定义
     */
    public function __construct(string $mark, string $secret)
    {
        $this->mark = $mark;
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getMark(): string
    {
        return $this->mark;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

}