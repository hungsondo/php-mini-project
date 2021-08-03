<?php
class Login extends Controller
{
    protected $user;
    function __construct(){
        if (isset($_SESSION['username']) || isset($_COOKIE['token'])){
            if(isset($_COOKIE['token'])){
                $_SESSION['username']=openssl_decrypt($_COOKIE['token'],"AES-128-ECB","key");
            }
            header('location: /mini-project/Home');
        }
        $this->user = $this->model("User");
    }

    public function index(){
        $this->view("login");
    }

    public function handleLogin(){
        $result_msg = false;
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($_POST['username'])||empty($_POST['password'])){
                $this->view("login", [
                    "result"=>$result_msg,
            ]);
        }
        $result=$this->user->login($username);
        if (mysqli_num_rows($result)==1){
            $row=mysqli_fetch_array($result);
            $db_password=$row['password'];
            if (password_verify($password,$db_password)){
                $_SESSION['username']=$username;
                $token = openssl_encrypt($username,"AES-128-ECB","key");
                if(isset($_POST['remember'])){
                    setcookie("token",$token, time() + 900, "/");
                }
                header('Location: /mini-project/Home');
            }else {
                $_SESSION['message']="Wrong  Password";
                header('Location: /mini-project/Login');
            }
        }else {
            $_SESSION['message']="Wrong Username";
            header('Location: /mini-project/Login');
        }       
    }

    public function Logout(){
        unset($_SESSION['username']);
        session_destroy();
        setcookie( "token", "", time()- 900, "/","", 0);
        header('Location: /mini-project/login');

    }

}



?>