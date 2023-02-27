<?php 
namespace Models;

class User
{
    private $userId;
    private $email;
    private $password;

    public function __construct($userId=null, $email=null, $password=null)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}



?>