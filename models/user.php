<?php
require_once "database.php";
class user extends database{
    function luuuser($hoten, $email, $diachi, $dienthoai, $mk_mahoa){
        $sql = "INSERT INTO users SET hoten=:ht, email=:em, diachi=:dc, dienthoai=:dt, matkhau=:mk";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht", $hoten, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":dc", $diachi, PDO::PARAM_STR);
        $stmt->bindParam(":dt", $dienthoai, PDO::PARAM_STR);
        $stmt->bindParam(":mk", $mk_mahoa, PDO::PARAM_STR);
        $stmt->execute();
        $id_user = $this->conn->lastInsertId();
        return $id_user;
    }
    function changepass($email, $mk_mahoa){
        $sql="UPDATE users SET matkhau=:mk";
        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(":mk", $mk_mahoa, PDO::PARAM_STR);
        $stmt->execute();
        $id_user = $this->conn->lastInsertId();
        return $id_user;
    }
    function checkuser($email, $matkhau){
        $sql = "SELECT * FROM users WHERE email=:em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if($recordnum !=1) return "Email không tồn tại";
        $user = $stmt ->fetch();
        $mk_mahoa = $user['matkhau'];
        if(password_verify($matkhau, $mk_mahoa) ==false) return "Mật khẩu không đúng";
        else return $user;
    }
    
    
}
?>