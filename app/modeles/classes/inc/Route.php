<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 29/11/2016
 * Time: 12:25
 */

class Route {

    private $path;
    private $callable;
    private  $matches =[];
    private  $params  =[];

    public  function  __construct($path, $callable)
    {

        $this->path = trim($path, '/');
        $this->callable = $callable;
    }


    public  function  match($url)
    {
      $url = trim($url, '/');

        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);

        $regex  = "#^$path$#i";



        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }
        var_dump($matches);


        array_shift($matches); //permet de degager le 1er element d'un tableau

        $this->matches = $matches;


        return true;
    }


    private  function  paramMatch($match)
    {

        if(isset($this->params[$match[1]]))
        {
            return '('  . $this->params[$match[1]] . ')' ;
        }
        return '([^/]+)' ;
    }

    /**
     *role permet de stocker les paramatre
     * @param $param :le parametre
     * @param $regex :'expression regulier a verifier
     */


    public function  with($param,$regex)
    {
          $this->params[$param]   = str_replace('(', '(?:',$regex);
        return $this;
    }


    /**
     * role :
     * @return mixed
     */
    public  function  call()
    {
        /*
         * on verifie si la fonction est une chaine de caractere
         */

       if(is_string($this->callable))
       {
           /*
            *si oui  alors on va exploser la chaine de caractere par #
            * en premier paramtre on aura le nom du controller
            *
            */

           $params = explode("#", $this->callable);

           $controller = $params[0] . 'controller';
           /*
            * on est instancier une un controller
            */
           $controller =  new controller();
           /*
            * une fois ok on appel l'action ici paramas
            * $action =  [1]]
            * $controller->$params()
            *
            */
           return  call_user_func_array([$controller, $params[1]] , $this->matches); //appel par closure
       }else
       {
           /*
            * sinon on retourne la fonction la collable
            *
            * permet d'appeler une fonction de rapel plutot que directement utiliser un match
            */
           return  call_user_func_array($this->callable, $this->matches);
       }
    }


    /**
     * @param $params
     * @return mixed|string
     */
    public  function  getUrl($params)
    {
        /*
         * on sauvegarde le chemin,  par exemple /post/:id
         */
        $path  =  $this->path ;
        /*
         * parcourt tout le parametre sachant que $k vaut id
         */
        foreach($params   as $k=>$value)
            {
                /*
                 * on remplace :id par la valeur dans la variable $path
                 */
                $path = str_replace(":$k", $value, $path) ;
            }
         /*
          * lorsq'il fini on retourne $path
          */
           return $path;
    }

}