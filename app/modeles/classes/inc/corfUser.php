<?php


class CorfUser{
    private  $userID ;
    private  $firstrname ;
    private  $lastname ;
    private  $email ;
    private  $gender ;
    private  $birthday ;
    private  $relationship_status;
    private  $religion ;
    private  $birthplace ;
    private  $current_city;
    private  $home_phone ;
    private  $cell_phone ;
    private  $work_phone ;
    private  $address;
    private  $city;
    private  $ip_address;
    private  $create_date ;
    private  $user_type;
    private $posts_count;
    private  $statut;
    private  $country;
    private  $token;



    // constant values

    const  STATUT_USER_ACTIVE = 1 ; //utilisateur actif
    const  STATUT_USER_BANNED = 0 ; // utulisateur bannir
    const  STATUT_USER_DELETED= -1; // utulisateur supprimer ou desabonner



    //getter and setter

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getFirstrname()
    {
        return $this->firstrname;
    }

    /**
     * @param mixed $firstrname
     */
    public function setFirstrname($firstrname)
    {
        $this->firstrname = $firstrname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getRelationshipStatus()
    {
        return $this->relationship_status;
    }

    /**
     * @param mixed $relationship_status
     */
    public function setRelationshipStatus($relationship_status)
    {
        $this->relationship_status = $relationship_status;
    }

    /**
     * @return mixed
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * @param mixed $religion
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;
    }

    /**
     * @return mixed
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * @param mixed $birthplace
     */
    public function setBirthplace($birthplace)
    {
        $this->birthplace = $birthplace;
    }

    /**
     * @return mixed
     */
    public function getHomePhone()
    {
        return $this->home_phone;
    }

    /**
     * @param mixed $home_phone
     */
    public function setHomePhone($home_phone)
    {
        $this->home_phone = $home_phone;
    }

    /**
     * @return mixed
     */
    public function getCurrentCity()
    {
        return $this->current_city;
    }

    /**
     * @param mixed $current_city
     */
    public function setCurrentCity($current_city)
    {
        $this->current_city = $current_city;
    }

    /**
     * @return mixed
     */
    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    /**
     * @param mixed $cell_phone
     */
    public function setCellPhone($cell_phone)
    {
        $this->cell_phone = $cell_phone;
    }

    /**
     * @return mixed
     */
    public function getWorkPhone()
    {
        return $this->work_phone;
    }

    /**
     * @param mixed $work_phone
     */
    public function setWorkPhone($work_phone)
    {
        $this->work_phone = $work_phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param mixed $ip_address
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getPostsCount()
    {
        return $this->posts_count;
    }

    /**
     * @param mixed $posts_count
     */
    public function setPostsCount($posts_count)
    {
        $this->posts_count = $posts_count;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * *************************************************** operations **************************************************************
     */

    /**
     * Contructeur
     */
    public  function __construct()
    {

    }


    public  function  getProfileIcon($user, $db)
    {
       if(gettype($user) !="array")
       {
            $query =  $db->myquery("SELECT thumbnail FROM users WHERE userID =? ",["userID"=>$user])->fetch();
           $icon =   $query->thumbnail;
           if(corf_not_null($icon))
           {
               return DIR_WS_PHOTO . 'users/' . $user . '/resized' . $icon ;
           }else
           {
               return DIR_WS_IMAGE . 'defaultProfileImage.png' ;
           }
       }else if(gettype($user)){
           if(corf_not_null($user['thumbnail'])){
               return DIR_WS_PHOTO . 'users/' . $user['thumbnail'] . '/resized' . $user['thumbnail'];
           }else
           {
               return DIR_WS_IMAGE . 'defaultProfileImage.png' ;
           }
       }
    }
    public  function  getCorfUserContact($db)
    {
      return $db->myQuery("SELECT * FROM users_contact");
    }

    public  function  getCorfUserBasicInfo($db,$userID)
    {
       return $db->myQuery("
                SELECT us.userID FROM users as us
                LEFT  JOIN users_stats as uss
                ON us.userID = uss.userID
                WHERE us.userID  =:userID
                  ",
                 [(int)$userID]
                 )->fetchAll();
    }

    public  function  getCorfUserFriend()
    {

    }

    public  function  getCorfUserById($userID)
    {

    }

    public  function  getCorfUserByName($name)
    {

    }
    private  function  isConnected()
    {

    }
    public  function  Register($db, $login , $password)
    {


    }

    public  function  ResetPassword()
    {

    }

    public  function  hashPassword($password)
    {
        return password_hash($password, CRYPT_BLOWFISH);
    }

}