<?php
//require_once '/../templates/bootstrap.php';

/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 12:47
 */
$db = App::getDatabase();
if(!empty($_POST))
{
    $validator = App::getValidator($_POST);
    $validator->isAlpha($_POST["email"], "cet email est deja utilisé par un autre compte");
    App::getAuth()->register($db, $_POST["username"], $_POST["password"], $_POST["email"]);
}else
{
    echo "redirect";
}


