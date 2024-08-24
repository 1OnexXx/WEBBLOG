<?php 

class Users{
    private string $username;
    private string $email;
    private string $password;

    private string $role;

    public function __construct($username, $email , $password ,$role){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role; 

    }


}



?>