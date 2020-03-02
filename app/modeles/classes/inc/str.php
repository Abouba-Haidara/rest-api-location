<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 24/11/2016
 * Time: 00:51
 */

class Str {
    static  function  getRandom($lenght)
    {
        $TokenAlea = "123456789abcdefghijklmnpoqrstuwvyzxABCDELFKTPLRZXYMNIV";
        return substr(shuffle(str_repeat($TokenAlea, $lenght)),0,$lenght);
    }
}