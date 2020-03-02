<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 12:58
 */

class Session {

    private  static  $instance =  null;
    public  function getInstance()
    {
        if(!self::$instance)
        {
           self::$instance =  new Session();
        }
        return self::$instance;
    }

     public  function  __construct()
     {
       session_start();
     }

    public  function  setFlash($key, $valueMessage)
    {
        $_SESSION[$key]   =  $valueMessage ;
    }
    public  function  getFlash()
    {
      $flash = $_SESSION["flash"];
        unset ($_SESSION["flash"]);
        return $flash;

    }
    public  function  asFlashes()
    {
        return isset($_SESSION["flash"]);
    }


    public  function  delete()
    {
        session_destroy();
    }

    public  function  setSessionId($id)
    {
        session_id($id);
    }


    public  function  setSessionName($autogeneratename)
    {
        session_name($autogeneratename);
    }

    public  function  setSession_path($path)
    {
        session_save_path($path);
    }


    public  function  getSessionStatut()
    {
        return session_status();
    }

}