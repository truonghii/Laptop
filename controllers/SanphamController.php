<?php
require_once "models/sanpham.php";

class SanphamController {
   private $model = null;
   protected $listloai = null;
   function __construct(){
      $this-> model =new sanpham();
      $this->listloai = $this->model->layListLoai();
   }

   function index(){ 
      $sosp = 6;
      $spnb = $this->model->sanphamNoiBat($sosp);
      $spxn = $this->model->sanphamXemNhieu($sosp);

      $titlePage = "Trang chủ";
      $viewnoidung = "home.php";
      include "views/layout.php";
   }
   function detail(){
      global $params;
      
      $id = $params['id'];
      $sp = $this->model->detail($id);
      
      $titlePage = $sp['ten_sp'];
      $viewnoidung = "detail.php";
      include "views/layout.php";
   }
   function cat(){
      global $params;
      $idloai = $params['idloai'];
      $pageNum = isset($params['page'])==true? $params['page']:1;
      $pagePrev = $pageNum-1; $pageNext = $pageNum+1;
      $pageSize = 12;
      $demsoSP = $this->model->demSPTrongLoai($idloai);
      $tongSoTrang = ceil($demsoSP/$pageSize);
      $listsp = $this->model->sanphamTrongLoai($idloai, $pageNum, $pageSize);
      $ten_loai = $this->model->layTenLoai($idloai);
      $titlePage = $ten_loai;
      $viewnoidung = "sptrongloai.php";
      include "views/layout.php";
   }
   function addtocart(){  
      //$_SESSION['cart'] = [4657 => 1, 537 => 3, 2646 => 2, 229 => 4];
      global $params;
      $id_sp =  $params['id'];  //ví dụ 537
      $soluong= (int) $params['soluong']; //1
      if(isset($_SESSION['cart'][$id_sp])==true){
          $soluong = $_SESSION['cart'][$id_sp] + $soluong;
      }
      $_SESSION['cart'][$id_sp] = $soluong;
      header("location:". ROOT_URL. "showcart");
   }
   function showcart(){
      $titlePage = "Giỏ hàng";
      if(isset($_SESSION['cart'])==false || count($_SESSION['cart'])==0){
         // $tong_sl += $soluong;
         include "views/showcart_empty.php";
      } else{
         include "views/showcart.php";
      }
   }
   function checkout(){
      $titlePage = "Thanh toán";
      $viewnoidung = "views/checkout.php";
      include "views/checkout.php";
   }
   function checkout_(){
      $hoten = trim(strip_tags($_POST['hoten']));
      $email = trim(strip_tags($_POST['email']));
      $diachi = trim(strip_tags($_POST['diachi']));
      $dienthoai = trim(strip_tags($_POST['dienthoai']));
      $id_dh = $this->model->luudonhang($hoten, $email, $diachi, $dienthoai);
      $this->model->luuSPTrongGioHang($id_dh);
      unset($_SESSION['cart']);
      echo "Đã lưu xong đơn hàng $id_dh";
   }

   function searchForm(){ 
      
   }
   function searchResult(){ 
      global $params;
      $tk = trim(strip_tags($_POST['kyw']));
      $pageNum = isset($params['page'])==true? $params['page']:1;
      $pagePrev = $pageNum -1; $pageNext = $pageNum+1;
      $pageSize = 9;
      $demspTK = $this->model->demTK();
      $tongSoTrang = ceil($demspTK/$pageSize);
      $listTK = $this->model->search($tk, $pageNum, $pageSize);
      $titlePage = "Tìm kiếm";
      $viewnoidung = "search.php";
      include "views/layout.php";
   }
}
?>
