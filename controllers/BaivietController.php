<?php
require_once "models/baiviet.php";
class BaivietController{
    private $model = null;
    function __construct(){
        $this -> model = new baiviet();
    }
    function index(){
        global $params;
        $pageNum = isset($params['page'])==true? $params['page']:1;
        $pagePrev = $pageNum -1; $pageNext = $pageNum+1;
        $pageSize = 10;
        $demspSP = $this->model->demBV();
        $tongSoTrang = ceil($demspSP/$pageSize);
        $listBV = $this->model->danhsachBV($pageNum, $pageSize);

        $titlePage = "Bài viết";
        $viewnoidung = "views/baiviet/baivietds.php";
        include "views/baiviet/layout.php";
    }
    function add(){
        $titlePage = "Thêm bài viết";
        $viewnoidung = "views/baiviet/baivietthem.php";
        include "views/baiviet/layout.php";
    }
    function add_(){
        $tieu_de = trim(strip_tags($_POST['tieu_de']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $noi_dung = trim(strip_tags($_POST['noi_dung']));
        $an_hien = (int) $_POST['an_hien'];
        $hinh = $_FILES['hinh'];
        $tenfile = $hinh['name'];
        $tmp_name = $hinh['tmp_name'];
        $src= "\\../public/images/\\$tenfile";
        move_uploaded_file($tmp_name, __DIR__.$src);
        $id_bv = $this->model->luudoitac($tieu_de, ROOT_URL. "public/images/". $tenfile, 
            $ngay, $noi_dung, $an_hien); 
            header("location:". ROOT_URL. "baiviet");
    }
    function edit(){
        global $params;
        $id = $params['id'];
        $sp = $this->model->detail($id);

        $titlePage = "Chỉnh bài viết";
        $viewnoidung = "views/baiviet/baivietsua.php";
        include "views/baiviet/layout.php";
    }
    function edit_(){
        $id_bv = (int) $_POST['id_bv'];
        $tieu_de = trim(strip_tags($_POST['tieu_de']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $noi_dung = trim(strip_tags($_POST['noi_dung']));
        $an_hien = (int) $_POST['an_hien'];
        $this->model->capnhatbaiviet($id_bv, $tieu_de, $ngay, $noi_dung, $an_hien);
        header("location:". ROOT_URL. "baiviet");
    }   
    function delete(){
        global $params;
        $id = $params['id'];
        $sp = $this->model->deleteBV($id);
        header("location:". ROOT_URL. "baiviet");
    }
}
?>