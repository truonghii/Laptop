<?php
require_once "models/doitac.php";
class DoitacController{
    private $model = null;
    function __construct(){
        $this -> model = new doitac();
    }
    function index(){
        global $params;
        $pageNum = isset($params['page'])==true? $params['page']:1;
        $pagePrev = $pageNum -1; $pageNext = $pageNum+1;
        $pageSize = 10;
        $demspSP = $this->model->demDT();
        $tongSoTrang = ceil($demspSP/$pageSize);
        $listDT = $this->model->danhsachDT($pageNum, $pageSize);

        $titlePage = "Đối tác";
        $viewnoidung = "views/doitac/doitacds.php";
        include "views/doitac/layout.php";
    }
    function add(){
        $titlePage = "Thêm đối tác";
        $viewnoidung = "views/doitac/doitacthem.php";
        include "views/doitac/layout.php";
    }
    function add_(){
        $ten_dt = trim(strip_tags($_POST['ten_dt']));
        $url = trim(strip_tags($_POST['url']));
        $mo_ta = trim(strip_tags($_POST['mo_ta']));
        $thu_tu = (int) $_POST['thu_tu'];
        $hinh = $_FILES['hinh'];
        $tenfile = $hinh['name'];
        $tmp_name = $hinh['tmp_name'];
        $src= "\\../public/images/\\$tenfile";
        move_uploaded_file($tmp_name, __DIR__.$src);
        $ma_dt = $this->model->luusanpham($ten_dt, ROOT_URL. "public/images/". $tenfile, 
            $url, $mo_ta, $thu_tu); 
        echo "Đã lưu xong";
    }
    function edit(){
        global $params;
        $id = $params['id'];
        $sp = $this->model->detail($id);

        $titlePage = "Chỉnh đối tác";
        $viewnoidung = "views/doitac/doitacsua.php";
        include "views/doitac/layout.php";
    }
    function edit_(){
        $ma_dt = (int) $_POST['ma_dt'];
        $ten_dt = trim(strip_tags($_POST['ten_dt']));
        $mo_ta = trim(strip_tags($_POST['mo_ta']));
        $thu_tu = trim(strip_tags($_POST['thu_tu']));
        $this->model->capnhatdoitac($ma_dt, $ten_dt, $mo_ta, $thu_tu);
        echo "Đã cập nhật xong đối tác $ma_dt";
    }   
    function delete(){
        global $params;
        $id = $params['id'];
        $sp = $this->model->deleteDT($id);
        echo"Đã xóa đối tác";
    }
}
?>