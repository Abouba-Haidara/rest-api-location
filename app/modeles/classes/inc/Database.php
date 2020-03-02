<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:16
 */

class Database {

    private  $dbname ;
    private  $hostDB ;
    private  $pwdBD ;
    private  $userDB;

    private $pdo ;

    public  function  __construct($hostdb ="localhost", $dbname,  $userdb, $pwdb )
    {
        $this->hostDB = $hostdb ;
        $this->dbname = $dbname ;
        $this->userDB = $userdb ;
        $this->pwdBD  = $pwdb ;
        try{
            $this->pdo = new PDO("mysql:host=".$this->hostDB."; dbname=".$this->dbname, $this->userDB, $this->pwdBD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        }catch (PDOException $e)
        {
            die("Erreur survenue :" . $e->getMessage()) ;
        }
    }

    /**
     * @param $sql
     * @param bool|array $params
     * @return bool|array
     */
    public  function  myQuery($sql, $params= false)
    {
        try
        {
            if(!$params)
            {
                $req = $this->pdo->prepare($sql);
                return $req->execute($params) ;
            }else{
                return $this->pdo->query($sql);
            }
        }
        catch(Exception $ex)
        {
            die("see error :" . $ex->getMessage()  . $ex->getCode());
        }

    }


    public  function  getLastInsert()
    {
        return $this->pdo->lastInsertId();
    }

    public  function  Myupdate($query)
    {
        return $this->pdo->exec($query);
    }



}