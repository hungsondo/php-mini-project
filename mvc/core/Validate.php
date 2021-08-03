<?php

class Validate{
    
    public function checkReq($data){
        return empty($data);
    }
    
    public function checkMin($data,$min){
        if(strlen($data)>$min){
            return true;
        }
        return false;
    }
    public function checkMax($data,$max){
        if(strlen($data)<$max){
            return true;
        }
        return false;
    }
    public function checkLength($data,$min,$max){
        if(strlen($data)<$max&&strlen($data)>$min){
            return true;
        }
        return false;
    }
    public function checkEmail($str) {
        // Chứa các ký tự chữ cái, chữ số, dấu chấm, gạch dưới
        // Ký tự bắt đầu phải là chữ cái, ko viết hoa
        // Ký tự @
        // Nhóm ký tự trước @ có 4-32 ký tự không tính ký tự đầu tiên
        // Nhóm ký tự sau @ là domain một hoặc nhiều cấp

        return ( !(preg_match('/^[a-z][a-z0-9_\.]{4,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/', $str)));
    }
    public function checkName($str){
        $str = str_replace(array('-', '.', ' '), '', $str);
        // return preg_match('~[0-9]~',$str);       
        return ( !(preg_match('/^[aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤ
        ậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆ
        fFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌô
        ÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTu
        UùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+$/', $str)));
    }
    
    public function checkPhone($number){
        $number = str_replace(array('-', '.', ' '), '', $number);
        return (!preg_match('/^0[0-9]{9}$/', $number)) ;
    }
}

?>