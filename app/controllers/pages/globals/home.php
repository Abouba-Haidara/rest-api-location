<?php
//require_once '/../templates/bootstrap.php';


/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 01:33
 */
echo "je suis la page home<br>";

try{
    $router = App::getRouter($_GET['url']);
    $router->get('/',  function(){ echo 'HomePage';});
    $router->get('/posts',  function(){ echo 'tout les articles';});



//$router->get('/article/:id-:slug',  function($id, $slug) use ($router) {echo $router->url("Posts#show",['id'=>1, 'slug'=>'coucous-mes-gens'] ) ; },'post.show')->with('id','[\d]+')->with('slug', '([a-z\-0-9]+)');

//pour utiliser une  pagination alors on fera ça  avec de parametre fourmi:
   /* $router->get('/article/:slug-:id/:page',  "Posts#show")->with('id','[\d]+')->with('page','[\d]+')->with('slug', '([a-z\-0-9]+)');

    $router->get('/article/:slug-:id',  "Posts#show")->with('id','[\d]+')->with('slug', '([a-z\-0-9]+)');

    $router->get('/posts/:id', "Posts#show");
    $router->post('/posts/:id', function($id){ echo 'poster pour  l \'article ' .$id .'<pre>' .print_r($_POST, true). '</pre>';});
 */
    $router->run();
}
catch(RouterException $e)
{
    die($e->getMessage());
}


?>