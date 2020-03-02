<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:16
 */
use inc_class\HtmlForm;


class App{

    private static $db = null;
    private static $validator = null;
    private  static  $user = null;
    private  static  $auth = null;
    private  static  $form = null ;
    private  static  $router = null ;
    private  static  $error = null ;


    public  function  __wakeup()
    {
        trigger_error("Cannot deserialize instance of class", E_USER_ERROR) ;
    }
    public  function  __clone()
    {
        trigger_error("Cannot clone instance of class ",E_USER_ERROR) ;
    }
    private function __construct(){}

    public static function getDatabase()
    {
        if(!self::$db){
            self::$db = new Database("localhost",'corfriend','root','');
        }
        return self::$db;
    }

    public  static  function getException()
    {
        if(!self::$error)
        {
            self::$error = new Errors();
        }
        return self::$error;
    }

    public  static  function  getAuth()
    {
        if(!self::$auth)
        {
            self::$auth = new Auth();
        }
        return  self::$auth ;
    }


    public static function  getUser()
    {
        if(!self::$user)
        {
        self::$user  = new CorfUser();
        }
        return self::$user ;
    }

    public  static  function  getValidator($field)
    {
        if(!self::$validator)
        {
            self::$validator = new Validator($field);
        }
        return self::$validator;
    }


    public  static  function  getForm()
    {
        if(!self::$form)
        {
            self::$form = new HtmlForm();
        }
        return self::$form;
    }

    public static  function  getRouter($url)
    {
        if(!self::$router)
        {
            self::$router = new Router($url);
        }
        return  self::$router;
    }


}