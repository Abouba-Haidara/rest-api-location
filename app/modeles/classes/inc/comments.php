<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 30/11/2016
 * Time: 21:57
 */

class Comments {

    /**
     * permet d'envoyer tout les commmentaires liés a un contenu
     * @param $db
     * @param $ref
     * @param $ref_id
     * @return mixed
     */
    public  function  getAll($db, $ref, $ref_id)
    {
        $sql = "SELECT * FROM comments WHERE ref=:ref AND ref_id=:ref_id  ORDER  BY date_created DESC " ;

        return $db->myQuery($sql, ['ref'=>$ref, 'ref_id'=>$ref_id])->fetchAll();
    }


    /**
     * permet d'envoyer le 10 dernier commentaires
     * @param $db
     * @param $ref
     * @param $ref_id
     * @return mixed
     */

    public  function  getLastComment($db, $ref, $ref_id)
    {
        $sql = "SELECT * FROM comments WHERE ref=:ref AND ref_id=:ref_id  ORDER  BY date_created DESC  LIMIT 0, 10" ;

        $comments = $db->myQuery($sql, ['ref'=>$ref, 'ref_id'=>$ref_id])->fetchAll();

        $replies = []  ;

        foreach($comments as $k  => $comment)
        {
            /**
             * si le comment a un parent alors dans ce cas on supprime le commentaire
             */
            if($comment->parent_id)
            {
                $replies[$comment->parent_id][]   = $comment ;
                unset($comments[$k] ); //on supprime le commentaire
            }
        }


        foreach($comments as $k  => $comment)
        {
            /**
             * on verifie à chaque fois qu'on detecte qu'un commentaire à un id dans le replies on rajoute un nouvelle index
             */

            if(isset($replies[$comment->id]))
            {
                $comments[$k]->replies  = $replies[$comment->id] ;
            }
            else
            {
                /**
                 * sinon le commentaire n'as pas de reponse dans ce cas on lui injecte cette propiete replies
                 */
                $comments[$k]->replies = []  ;
            }
        }

        /**
         * on utilise la boucle foreach pour peubler le tableau contenant les differentes reponses
         *
         */



        return $comments ;
    }


    /**
     *
     * permet de sauvegarde d'un commentaire
     * @param $db
     * @param $ref
     * @param $ref_id
     * @return mixed
     */
    public  function  saveComment($db, $ref, $ref_id)
    {
        $sql  = "INSERT INTO comments SET username =:username, email=:email, content=:content, date_created=:date_created, ref=:ref, ref_id=:ref_id"; ;
       return $db->myQuery($sql,
                         [
                             'username'      =>        htmlentities(trim($_POST['username'])),
                             'email'         =>        htmlentities(trim($_POST['email'])),
                             'content'       =>        htmlentities(trim($_POST['content'])),
                             'date_create'   =>        date('Y-m-d H:i:s'),
                             'ref'           =>        $ref,
                             'ref_id'        =>        $ref_id
                         ]);
    }





}