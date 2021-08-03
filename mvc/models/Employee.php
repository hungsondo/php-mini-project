<?php

class Employee extends DB{

    public function getAll(){
        $qr = "SELECT * FROM employees";
        return mysqli_query($this->con, $qr);
    }

    public function get($id){
        $qr = "Select * from employees where id = $id ";
        return mysqli_query($this->con, $qr);
    }

    public function insert($data){
        $error = "";
        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $validate_result = $this->validateEmployee($name,$email,$phone);
        if($validate_result!=="ok"){
            return $validate_result;
        }
        $qr = "INSERT INTO employees ".
               "(name,email, phone) "."VALUES ".
               "('$name','$email','$phone')";
        return mysqli_query( $this->con, $qr );
    }

    public function update($id,$data){
        $id = (int) $id;
        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $validate_result = $this->validateEmployee($name,$email,$phone);
        if($validate_result!=="ok"){
            return $validate_result;
        }
        $qr = "UPDATE employees set name = '$name', email = '$email', phone = '$phone' where id = $id";
        return mysqli_query( $this->con, $qr );
    }

    public function delete($id){
        $qr = "DELETE FROM employees WHERE id = $id" ;
        return mysqli_query($this->con, $qr);
    }

    public function validateEmployee($name,$email,$phone){
        if($this->validate->checkName($name)){
            return "Tên không hợp lệ";
        }
        if($this->validate->checkEmail($email)){
            return "Email không hợp lệ";
        }
        if ($this->validate->checkPhone($phone)){
            return "Số điện thoại không hợp lệ";
        }
        else return "ok";
    }

}

?>