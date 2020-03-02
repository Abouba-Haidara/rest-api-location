<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:16
 */

class Auth {


    public  function  Login($db, $login, $password)
    {
        $user = $db->myQuery("SELECT FROM users WHERE login=:login AND password=:password ", [["login"=>$login, "password"=>$password]]);
        if($user)
        {
            $this->isConnected();
        }
        return $user ;
    }

   private  function  getEncoded($field)
   {
     return htmlentities(trim($field));
   }
    private function  sendMail($email, $token)
    {
        $message = "";
        $subject = "";
        $headers = "";
        mail($email, $subject, $message,$headers);
    }
    public  function  register($db, $username , $password, $email)
    {
       $password = $this->getPasswordHash($password);
        $token = Str::getRandom(60);
        $user = $db->myQuery(
                    "INSERT INTO users SET username =?, password =?, email=?, confirmation_token =?",
                    [       $this->getEncoded($username),
                            $this->getEncoded($password),
                            $this->getEncoded($email),
                            $token
                    ]
                  );
        $user_id = $db->getLastInsert();
        $this->sendMail($email, $token);
    }

    private function getPasswordHash($password)
    {
        return password_hash($this->getEncoded($password), CRYPT_BLOWFISH);
    }


}