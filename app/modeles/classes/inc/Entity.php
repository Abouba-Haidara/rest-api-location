<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 08/12/2016
 * Time: 01:31
 */

abstract class Entity  implements \ArrayAccess{

    protected  $erreurs = [] ;
    protected  $id ;

    public  function  __construct(array $data = array())
    {
          if(!empty($data))
          {
              $this->hydrate($data);
          }
    }

    public  function  isNew()
    {
        return empty($this->id) ;
    }

    public  function getErreurs()
    {
        return $this->erreurs ;
    }

    public  function  getId()
    {
        return $this->id ;
    }


    public  function  setId($id)
    {
        $this->id = (int)$id ;
    }

    public  function hydrate(array $data)
    {
        foreach($data as $attribut => $v)
        {
            $methode = 'set' . ucfirst($attribut) ;

            if(is_callable($this, $methode))
            {
                $this->$methode($v);
            }
        }
    }


    public  function offsetGet($var)
    {
        if(isset($this->$var) && is_callable(array(this,$var)))
        {
          return $this->$var();
        }
    }

    public  function offsetSet($var, $valeur)
    {
        $methode= 'set' . ucfirst($var) ;
        if(isset($this->$var) && is_callable(array(this, $methode)))
        {
            $this->$methode($valeur);
        }
    }



    public  function  offsetExists($var)
    {
        return isset($var) && is_callable(array($this,$var));
    }

    public function  offsetUnset($var)
    {
      throw  new \Exception("impossible de supprimer une valeur quelconque!!!") ;
    }


}