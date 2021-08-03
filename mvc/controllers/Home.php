<?php
class Home extends Controller
{
    protected $employee;
    function __construct(){
        if( !isset($_SESSION['username']) ){
            header('location: /mini-project/Login');
        }
        $this->employee = $this->model("Employee");
    }

    function Index(){
        $list = $this->employee->getAll();
        $this->view("home", 
            [
                "EmployeeList" => $list
            ]);
    }

    function Delete($id){
        $result = $this->employee->delete($id);
        if($result)     $_SESSION['message']="Xóa nhân viên thành công";
        header('Location: http://localhost/mini-project/Home');
    }

    function Insert(){
            $this->view("insert");
    }

    function postInsert(){
        $data = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "phone" => $_POST["phone"]
        ];
        $result = $this->employee->insert($data);
        if ($result !== true){
            $this->view("insert",[
                "err" => $result
            ]);
        }
        else {
            $_SESSION['message']="Thêm mới nhân viên thành công";
            header('Location: http://localhost/mini-project/Home');
        }
    }

    function Update($id){
        $b = $this->employee->get($id);
        $row = mysqli_fetch_array($b);
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->view("update",[
                "id" => $id,
                "name" => $row["name"],
                "email" => $row["email"],
                "phone" => $row["phone"],
            ]);
        }
        
    }

    function postUpdate($id){
            $b = $this->employee->get($id);
            $row = mysqli_fetch_array($b);
            $data = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "phone" => $_POST["phone"]
            ];
            $result = $this->employee->update($id,$data);
            if ($result !== true){
                    $this->view("update",[
                        "id" => $id,
                        "name" => $row["name"],
                        "email" => $row["email"],
                        "phone" => $row["phone"],
                        "err" => $result,
                ]);
            }
            else {
                $_SESSION['message']="Cập nhật nhân viên thành công";
                header('Location: http://localhost/mini-project/Home');
            }
    }
}



?>