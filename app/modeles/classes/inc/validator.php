<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 01:06
 */

class Validator {
    private  $donnees ;
    private  $db ;
    private $errors = [] ;
     public  function __construct($donnees = [])
    {
        $this->donnees = $donnees ;

    }



    public  function  getErrors()
    {
        return $this->errors;
    }



    private  function  getfield($field)
    {
        if(!isset($field))
        {
            return null ;
        }
        return htmlentities(trim($this->donnees[$field]));
    }


    public  function  isUniq($field, $table, $db , $errorsMsg)
    {
     
      $row = $db->myQuery("SELECT id FROM $table WHERE $field =? ", [$this->getfield($field)]);
        if($row)
        {
            $this->errors[$field] = $errorsMsg ;
        }
    }


    public  function  isEmail($field, $errorsMsg)
    {
        if(!filter_var($this->getfield($field), FILTER_VALIDATE_EMAIL))
        {
            $this->errors[$field] = $errorsMsg ;
        }
    }

    public  function  isAlpha($field, $errorsMsg)
    {
        if(!preg_match("/^[a-zA-Z0-9_]+$/", $this->getfield($field)))
        {
           $this->errors[$field] = $errorsMsg ;
        }

    }
    public  function  isValid()
    {
      return (empty($this->errors)); //si le tableau est vide donc on retourne true sinon false
    }


    public  function  isConfirmedPassword($field, $errorsMsg)
    {
        $value =$this->getfield($field);
        if(empty($value)  && $value != $this->getfield($field . "_confirm"))
        {
            $this->errors[$field] = $errorsMsg ;
        }
    }


    public  function  checkSetField($field, $errorsMessage)
    {
        if(!isset($field) && empty($field))
        {
            $this->errors[$field] = $errorsMessage ;
        }else
        {
            return true ;
        }
    }

}