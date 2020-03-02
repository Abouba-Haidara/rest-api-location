</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="public/css/profile.css">
    <title>Corfriend</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:15
 */
if(isset($_GET['url']) && !empty($_GET['url']))
         {
             if(file_exists($_GET['url'] . '.php'))
             {
                 $page = htmlentities(trim($_GET['url']));
             }else
             {
                 $url = "error";
             }
         }
         else
         {
             $url = "home" ;
         }
?>
<?php
extract($_GET);
 switch($url)
 {
     case "profile":
         require_once 'profile.php';
     break;

     case "messenger":
         /*do something here*/
         break;

     case "photosAll" :
      //view all photos
         break;

     case "photo" :
      // view photo
         break;

     case "friend_list" :

         break ;

     case "friends":

         break ;

     case "friend" :

         break;
     case "user_friend_profile" :

         break ;
     case "home" :
         require_once 'home.php';
         break;

 }
?>
