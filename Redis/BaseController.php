<?php
/**
 * Created by PhpStorm.
 * User: smallzz
 * Date: 2018/11/20
 * Time: 下午3:21
 */

namespace Redis;


class BaseController
{
    protected $redis = null;
    protected $options = [
        'host'       => '127.0.0.1',
        'port'       => 6379,
        'password'   => '',
        'select'     => 0,
        'timeout'    => 0,
        'expire'     => 0,
        'persistent' => false,
        'prefix'     => '',
    ];
    function __construct($options = []){

        if (!extension_loaded('redis')) {
            throw new \ErrorException('not support: redis');
        }
        if (!empty($options)) {
            $this->options = array_merge($this->options, $options);
        }
        $func          = $this->options['persistent'] ? 'connect' : 'connect';
        $this->redis = new \Redis;
        $this->redis->$func($this->options['host'], $this->options['port'], $this->options['timeout']);
    }
}