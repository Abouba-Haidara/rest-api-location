<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 08/12/2016
 * Time: 02:40
 */

abstract class HandlerError
{
    protected $errorMessage;

    public function __construct($errorMessage)
    {
        $this->setErrorMessage($errorMessage);
    }

    abstract public function isValid($value);

    public function setErrorMessage($errorMessage)
    {
        if (is_string($errorMessage))
        {
            $this->errorMessage = $errorMessage;
        }
    }

    public function errorMessage()
    {
        return $this->errorMessage;
    }
}