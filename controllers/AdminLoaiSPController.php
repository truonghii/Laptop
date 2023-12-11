<?php  
    require_once "models/loai.php";
    class AdminLoaiSPController{
        private $model = null;
        function __construct(){
            $this ->model = new loai();
        }
        function index(){
            global $params;
            $this->checkLoginAdmin();
            $pageNum = isset($params['page'])==true? $params['page']:1;
            $pagePrev = $pageNum -1; $pageNext = $pageNum+1;
            $pageSize = 10;
            $demspSP = $this->model->demLoaiSP();
            $tongSoTrang = ceil($demspSP/$pageSize);
            $listLoaiSP = $this->model->danhsachLoaiSP($pageNum, $pageSize);

            $titlePage = "Quản trị loại sản phẩm";
            $viewnoidung = "views/admin/loaispds.php";
            include "views/admin/layout.php";
        }
        function add(){
            $this->checkLoginAdmin();

            $titlePage = "Thêm loại sản phẩm";
            $viewnoidung = "views/admin/loaispthem.php";
            include "views/admin/layout.php";
        }
        function add_(){
            $this->checkLoginAdmin();
            $ten_loai = trim(strip_tags($_POST['ten_loai']));
            $thutu = (int) $_POST['thutu'];
            $anhien = (int) $_POST['anhien'];
            $id_loai = $this->model->luuloaisanpham($ten_loai, $thutu, $anhien);
            echo "Đã lưu xong loại sản phẩm $id_loai";
        }
        function edit(){
            global $params;
            $this->checkLoginAdmin();
            $id = $params['id'];
            $sp = $this->model->detail($id);
            $titlePage = "Chỉnh sửa loại sản phẩm";
            $viewnoidung = "views/admin/loaispsua.php";
            include "views/admin/layout.php";
        }
        function edit_(){
            $this->checkLoginAdmin();
            $id_loai = (int) $_POST['id_loai'];
            $ten_loai = trim(strip_tags($_POST['ten_loai']));
            $thutu = (int) $_POST['thutu'];
            $anhien = (int) $_POST['anhien'];
            $this->model->capnhatloaisp($id_loai, $ten_loai, $thutu, $anhien);
            echo "Đã cập nhật xong loại sản phẩm $id_loai";
        }   
        function delete(){
            global $params;
            $this->checkLoginAdmin();
            $id = $params['id'];
            $sp = $this->model->deleteLoaiSP($id);
            header("location:". ROOT_URL. "admin/loai");
        }
        function detail(){
            echo "<h1>Chi tiết loại</h1>";
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