<?php
    require_once "models/sanpham.php";
    class AdminSPController{
        private $model = null;
        function __construct(){
            $this->model = new sanpham();
            $this->listloai = $this->model->layListLoai();
        }
        function index(){
            global $params;
            $this->checkLoginAdmin();
            $pageNum = isset($params['page'])==true? $params['page']:1;
            $pagePrev = $pageNum -1; $pageNext = $pageNum+1;
            $pageSize = 10;
            $demspSP = $this->model->demSP();
            $tongSoTrang = ceil($demspSP/$pageSize);
            $listsp = $this->model->danhsachsanpham($pageNum, $pageSize);

            $titlePage = "Quản trị sản phẩm";
            $viewnoidung = "views/admin/sanphamds.php";
            include "views/admin/layout.php";
        }
        function add(){
            $this->checkLoginAdmin();

            $titlePage = "Thêm sản phẩm";
            $viewnoidung = "views/admin/sanphamthem.php";
            include "views/admin/layout.php";
        }
        function add_(){
            $this->checkLoginAdmin();
            $id_loai = (int) $_POST['id_loai'];
            $ten_sp = trim(strip_tags($_POST['ten_sp']));
            $ngay = trim(strip_tags($_POST['ngay']));
            $gia = (int) $_POST['gia'];
            $gia_km = (int) $_POST['gia_km'];
            $anhien = (int) $_POST['anhien'];
            $hot = (int) $_POST['hot'];
            $mota = $_POST['mota'];
            $hinh = $_FILES['hinh'];
            $tenfile = $hinh['name'];
            $tmp_name = $hinh['tmp_name'];
            $src= "\\../public/images/\\$tenfile";
            move_uploaded_file($tmp_name, __DIR__.$src);
            $id_sp = $this->model->luusanpham($id_loai, $ten_sp, $ngay, $gia, $gia_km, ROOT_URL. "public/images/". $tenfile,
            $anhien, $hot, $mota);      
            header("location:". ROOT_URL. "admin/sp");
        }
        function edit(){
            global $params;
            $this->checkLoginAdmin();
            $id = $params['id'];
            $sp = $this->model->detail($id);
            $titlePage = "Chỉnh sửa sản phẩm";
            $viewnoidung = "views/admin/sanphamsua.php";
            include "views/admin/layout.php";
        }
        function edit_(){
            $this->checkLoginAdmin();
            $id_sp = (int) $_POST['id_sp'];
            $ten_sp = trim(strip_tags($_POST['ten_sp']));
            $ngay = trim(strip_tags($_POST['ngay']));
            $gia = (int) $_POST['gia'];
            $gia_km = (int) $_POST['gia_km'];
            $anhien = (int) $_POST['anhien'];
            $hot = (int) $_POST['hot'];
            $mota = $_POST['mota'];
            $this->model->capnhatsanpham($id_sp, $ten_sp, $ngay, $gia, $gia_km,
            $anhien, $hot, $mota);
            header("location:". ROOT_URL. "admin/sp");
        }
        function delete(){
            global $params;
            $this->checkLoginAdmin();
            $id = $params['id'];
            $sp = $this->model->deleteSP($id);
            header("location:". ROOT_URL. "admin/sp");
        }
        function detail(){
            echo "<h1>Chi tiết sản phẩm";
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