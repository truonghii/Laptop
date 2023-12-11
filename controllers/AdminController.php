<?php
    require_once "models/user.php";
    class AdminController{
        private $model = null;
        function __construct(){
            $this->model = new user;
        }
        function index(){
            $this->checkLoginAdmin();
            $titlePage = "Trang Admin";
            $viewnoidung = "views/admin/index.php";
            include "views/admin/layout.php";
        }
        function login(){
            include "views/admin/login.php";
        }
        function login_(){
            $email = trim(strip_tags( $_POST['email'] )) ;
            $matkhau = trim(strip_tags( $_POST['matkhau'] )) ;
            $kq = $this->model->checkuser($email , $matkhau);  //trả về array hoặc string
            if (is_array($kq)==false) { // không thành công
                echo $kq; //header("location:". ROOT_URL."admin/login"); 
                exit();
            } 
            if ($kq['vaitro']!=1 ) {echo "Bạn không phải là admin"; exit(); }
            $_SESSION['id_user'] = $kq['id_user'];
            $_SESSION['hoten'] = $kq['hoten'];
            $_SESSION['email'] = $kq['email'];
            $_SESSION['vaitro'] = 1;
            echo "<h2>Đã đăng nhập admin thành công</h2>";
            if (isset($_SESSION['back'])==true) {
                header("location:". $_SESSION['back']); 
                unset($_SESSION['back']);
                exit();
            }
            echo "<a href='". ROOT_URL."admin'> Vào xem phần quản trị </a>" ;
        
        }
        function logout(){
            unset($_SESSION['hoten']);
            header("location:". ROOT_URL);
        }
        function checkLoginAdmin(){        
            if (isset($_SESSION['vaitro'])==false || $_SESSION['vaitro']!=1){
                $_SESSION['back'] =  $_SERVER['REQUEST_URI'];
                header("location:". ROOT_URL."admin/login");
                exit();
            }
        }
    }
?>