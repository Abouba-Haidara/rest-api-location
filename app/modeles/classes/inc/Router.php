<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 29/11/2016
 * Time: 11:43
 */

class Router {
    /**
     * contient l'url qu'on a taper
     * @var
     */
    private  $url;
    /** contient tout les routes
     * @var array
     */
    private  $routes = [] ;
    /**
     * contient le nom de router
     * @var array
     */
    private  $nameRouter = [] ;

   public  function __construct($url)
    {
        $this->url = $url ;
    }


    public  function  get($path, $callable, $name =null)
    {
       return $this->add($path,$callable, $name , 'GET');
    }


    public  function  post($path, $callable, $name = null)
    {
        return $this->add($path,$callable, $name, 'POST');
    }



    public  function delete($path, $callable, $name =null)
    {

    }

    public  function put($path, $callable, $name =null)
    {

    }


    private function  add($path, $callable, $name  , $method)
    {
        $route = new Route($path,$callable);

        $this->routes[$method][] = $route ;

        /*
         * on verifie le collable est une chaine de caractere et que le nom est null alors on nom reçoit le collable
         */


        if(is_string($callable) && $name == null)
        {
            $name =  $callable ;
        }
        if($name)
        {
            $this->nameRouter[$name] = $route ;
        }
        return $route;
    }





    public  function  run()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']]))
        {
            throw new RouterException("REQUEST_METHOD DOES NOT EXIST");
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }

        throw new RouterException("No matching routes");
    }



    public function  url($name, $params=[])
    {

        /*
         * on verifier si aucune route ne definie dans ce cas on leve une exception
         */

        if(!isset($this->nameRouter[$name]))
        {

            throw new RouterException("No routes  matches this name");
        }

        /*
         * sinon on a une qui est definie
         */

        return $this->nameRouter[$name]->getUrl($params);
    }

}