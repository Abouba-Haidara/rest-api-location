<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:17
 */

abstract class Table {

    private  $name ;
    public  function  __construct()
    {


    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}