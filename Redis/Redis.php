<?php
/**
 * Created by PhpStorm.
 * User: smallzz
 * Date: 2018/11/20
 * Time: 下午3:19
 */

namespace Redis;


class Redis extends BaseController
{
    public function getInc(){

        $this->redis->lPop();

    }
}