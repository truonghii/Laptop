<?php 
require_once "database.php";
class sanpham extends database {
    function detail($id_sp=0){
        $sql= "SELECT id_sp, ten_sp, gia, gia_km, hinh, soluotxem, ngay, hot, anhien, mota
            FROM sanpham WHERE id_sp = $id_sp";
        return $this->queryOne($sql);
    }
    function sanphamTrongLoai($id_loai=0, $pageNum=1, $pageSize=9){
        $startRow = ($pageNum-1)*$pageSize;
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh
            FROM sanpham WHERE id_loai=$id_loai ORDER BY ngay DESC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function layTenLoai($id_loai=0){
        $sql = "SELECT ten_loai FROM loai WHERE id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['ten_loai'];
    }
    function demSPTrongLoai($id_loai=0){
        $sql = "SELECT count(id_sp) as dem FROM sanpham WHERE id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function layListLoai(){
        $sql = "SELECT id_loai, ten_loai, thutu, anhien
            FROM loai WHERE anhien=1 ORDER BY thutu";
        return $this->query($sql);
    }
    function sanphamXemNhieu($sosp=9){
        $sql = "SELECT id_sp, ten_sp, gia, hinh
            FROM sanpham ORDER BY soluotxem DESC LIMIT 0, $sosp";
        return $this->query($sql);
    }
    function sanphamNoiBat($sosp=9){
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh
            FROM sanpham WHERE hot = 1 ORDER BY ngay DESC LIMIT 0, $sosp";
        return $this->query($sql);
    }
    function luudonhang($hoten, $email, $diachi, $dienthoai){
        $sql = "INSERT INTO donhang SET hoten =:ht, email=:em, diachi=:dc, dienthoai=:dt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht", $hoten, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":dc", $diachi, PDO::PARAM_STR);
        $stmt->bindParam(":dt", $dienthoai, PDO::PARAM_STR);
        $stmt->execute();
        $id_dh = $this->conn ->lastInsertId();
        return $id_dh;
    }
    function luuSPTrongGioHang($id_dh){
        foreach($_SESSION['cart'] as $id_sp => $soluong){
            $sp = $this->detail($id_sp);
            $sql = "INSERT INTO donhangchitiet SET id_dh=:id_dh, id_sp=:id_sp, ten_sp=:ten_sp, soluong=:sl, gia=:gia";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_dh", $id_dh, PDO::PARAM_INT);
            $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
            $stmt->bindParam(":ten_sp", $sp['ten_sp'], PDO::PARAM_STR);
            $stmt->bindParam(":sl", $soluong, PDO::PARAM_INT);
            $stmt->bindParam(":gia", $sp['gia'], PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    function luusanpham($id_loai, $ten_sp, $ngay, $gia, $gia_km,$hinh,
    $anhien, $hot, $mota){
        $sql = "INSERT INTO sanpham SET id_loai=:id_loai, ten_sp=:ten_sp, gia=:gia,
        gia_km=:gia_km,hinh=:hinh, ngay=:ngay, anhien=:anhien, hot=:hot, mota=:mota";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":mota", $mota, PDO::PARAM_STR);  
        $stmt->execute();
        $id_sp = $this->conn->lastInsertId();
        return $id_sp;
    }
    function capnhatsanpham($id_sp, $ten_sp, $ngay, $gia, $gia_km,
    $anhien, $hot, $mota){
        $sql = "UPDATE sanpham SET ten_sp=:ten_sp, gia=:gia,
            gia_km=:gia_km, ngay=:ngay, anhien=:anhien, hot=:hot, mota=:mota WHERE id_sp=:id_sp ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":mota", $mota, PDO::PARAM_STR);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    function danhsachsanpham($pageNum=1, $pageSize=9){
        $startRow = ($pageNum - 1)*$pageSize;
        $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT $startRow, $pageSize";
        return $this ->query($sql);
    }
    function demSP(){
        $sql = "SELECT count(id_sp) as dem FROM sanpham";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function deleteSP($id_sp){
        $sql = "DELETE FROM sanpham WHERE id_sp=:id_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->execute();
    }
    function search($tk, $pageNum=1, $pageSize=9){
        $startRow = ($pageNum-1)*$pageSize;
        $sql = "SELECT * FROM sanpham WHERE ten_sp LIKE '%$tk%' LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function demTK(){
        $sql = "SELECT * FROM sanpham WHERE ten_sp LIKE '%$tk%' ";
        
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
}//class sanpham
?>
