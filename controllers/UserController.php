<?php
require_once "models/user.php";
class userController{
    private $model = null;
    function __construct(){
        $this->model = new user;
    }
    function register(){
        include "views/register.php";
    }
    function register_(){
        $hoten = trim(strip_tags($_POST['hoten']));
        $email = trim(strip_tags($_POST['email']));
        $diachi = trim(strip_tags($_POST['diachi']));
        $dienthoai = trim(strip_tags($_POST['dienthoai']));
        $matkhau = trim(strip_tags($_POST['matkhau']));
        $mk_mahoa = password_hash($matkhau, PASSWORD_BCRYPT);
        $id_user = $this->model->luuuser($hoten, $email, $diachi, $dienthoai, $mk_mahoa);
        echo "Đã lưu thành công";
    }
    function login(){
        include "views/login.php";
    }
    function login_(){
        $email = trim(strip_tags($_POST['email']));
        $matkhau = trim(strip_tags($_POST['matkhau']));
        
        $kq = $this->model->checkuser($email, $matkhau);
        if(is_array($kq)==true){
            $_SESSION['id_user'] = $kq['id_user'];
            $_SESSION['hoten'] = $kq['hoten'];
            $_SESSION['email'] = $kq['email'];
            $_SESSION['vaitro'] = $kq['vaitro'];
            print_r($_SESSION);
            header("location:". ROOT_URL);
        }
        else {
            echo $kq;
        }
    }
    function changepass(){
        include "views/changepass.php";
    }
    function changepass_(){
        $email = $_SESSION['email'];
        $matkhauCu = trim(strip_tags($_POST['matkhauCu']));
        $kq = $this->model->checkuser($email, $matkhauCu);
        if(is_string($kq)==true){
            echo $kq; return;
        }
        $matkhauMoi1 = trim(strip_tags($_POST['matkhauMoi1']));
        $matkhauMoi2 = trim(strip_tags($_POST['matkhauMoi2']));
        if($matkhauMoi1 != $matkhauMoi2){
            echo "Hai mật khẩu không giống nhau"; return;
        }
        $mk_mahoa = password_hash($matkhauMoi1, PASSWORD_BCRYPT);
        $kq = $this->model->changepass($email, $mk_mahoa);
        echo "Đổi pass thành công";
    }
    function logout(){
        unset($_SESSION['hoten']);
        header("location:". ROOT_URL);
    }
}
?>