<?php
//require_once '/../templates/bootstrap.php';

/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 22/11/2016
 * Time: 12:09
 */

$db = App::getDatabase();
if(isset($_POST['username']) && isset($_POST['email']))
{
    $validator = new Validator($_POST);

    $validator->isAlpha("username", "votre pseudo n'est pass valide");
    if($validator->isValid())
    {
        $validator->isUniq("username", "users", $db, "ce pseudo est déjà pris");
    }
    if($validator->isValid())
    {
        $validator->isUniq("email", "users", $db, "cet email est déjà attribuer à un autre compte");
    }
    $validator->isEmail("email", "votre email n'est pass valide");

    $validator->isConfirmedPassword("password", "Vous devez rentrer un mot de passe valide, please!");

    if($validator->isValid())
    {

    }else
    {
        $errors = $validator->getErrors();
    }

    var_dump($validator->isValid());
    echo '<br>';
    var_dump($validator);
}


?>