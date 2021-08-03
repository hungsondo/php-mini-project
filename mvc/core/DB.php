<?php

class DB{

    public $con;
    public $validate;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "12345";
    protected $dbname = "sun";
    

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
        $this->validate = new Validate();
    }

}

?>