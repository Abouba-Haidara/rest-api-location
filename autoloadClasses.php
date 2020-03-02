<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 01:37
 */

//pour inclure tout les constances

require_once 'app/tables.php' ;


function autoload($class)
{
    require 'app/modeles/classes/inc/'.str_replace('\\', '/', $class).'.php';
}

spl_autoload_register('autoload');

