<?php

class User extends DB{

    public function login($username){
        $qr = "SELECT * FROM users WHERE username='{$username}'";
        return mysqli_query($this->con, $qr);
    }
}

?>