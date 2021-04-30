<?php

class User{
    private $userID, $firstName, $lastName, $userName, $password, $role, $id;

    public function __construct($userID, $firstName, $lastName, $userName, $password, $role){
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->password = $password;
        $this->role = $role;
    }

    public function getUserID(){
        return $this->userID;
    }
    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getRole()
    {
        return $this->role;
    }

    public function getId(){
        return $this->id;

    }

    public function setId($id){
        $this->id = $id;

    }

}



?>

