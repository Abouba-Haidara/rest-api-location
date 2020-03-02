<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 14/12/2016
 * Time: 13:44
 */

class post {

    private  $comment ;
    private  $image ;
    private   $is_profile ;
    private   $likes ;
    private  $pageID ;
    private   $post_Date;
    private  $post_status;
    private  $poster ;
    private  $postID;
    private  $profileID;
    private  $type ;
    private  $visibility;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getIsProfile()
    {
        return $this->is_profile;
    }

    /**
     * @param mixed $is_profile
     */
    public function setIsProfile($is_profile)
    {
        $this->is_profile = $is_profile;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getPageID()
    {
        return $this->pageID;
    }

    /**
     * @param mixed $pageID
     */
    public function setPageID($pageID)
    {
        $this->pageID = $pageID;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->post_Date;
    }

    /**
     * @param mixed $post_Date
     */
    public function setPostDate($post_Date)
    {
        $this->post_Date = $post_Date;
    }

    /**
     * @return mixed
     */
    public function getPostStatus()
    {
        return $this->post_status;
    }

    /**
     * @param mixed $post_status
     */
    public function setPostStatus($post_status)
    {
        $this->post_status = $post_status;
    }

    /**
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param mixed $poster
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
    }

    /**
     * @return mixed
     */
    public function getPostID()
    {
        return $this->postID;
    }

    /**
     * @param mixed $postID
     */
    public function setPostID($postID)
    {
        $this->postID = $postID;
    }

    /**
     * @return mixed
     */
    public function getProfileID()
    {
        return $this->profileID;
    }

    /**
     * @param mixed $profileID
     */
    public function setProfileID($profileID)
    {
        $this->profileID = $profileID;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param mixed $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }


    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }


}