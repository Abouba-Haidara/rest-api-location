<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 14/12/2016
 * Time: 12:26
 */

class Errors extends \Exception
{
    public  function  __construct()
    {
        throw new Exception();
    }


}