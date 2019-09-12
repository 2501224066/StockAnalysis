<?php

/**
 * 生成随机字符
 * @param int $len 长度
 * @param bool $is_str 是否为字母
 */
function randStr($len=6, $is_str=false) : string
{
    if ($is_str) {
        return str_random($len);
    }else{
        return rand(pow(10, $len-1) , pow(10, $len)-1);
    }
}