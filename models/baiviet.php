<?php 
require_once "database.php";
class baiviet extends database {
    function detail($id_bv=0){
        $sql ="SELECT id_bv, tieu_de,hinh, ngay, noi_dung , an_hien
            FROM baiviet WHERE id_bv = $id_bv";
        return $this->queryOne($sql);
    }    
    function luudoitac($tieu_de,$hinh, $ngay, $noi_dung, $an_hien){
        $sql = "INSERT INTO baiviet SET tieu_de=:tieu_de, hinh=:hinh, ngay=:ngay,
        noi_dung=:noi_dung, an_hien=:an_hien";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":tieu_de", $tieu_de, PDO::PARAM_STR);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":noi_dung", $noi_dung, PDO::PARAM_STR);
        $stmt->bindParam(":an_hien", $an_hien, PDO::PARAM_INT);
        $stmt->execute();
        $id_bv = $this->conn->lastInsertId();
        return $id_bv;
    }
    function danhsachBV($pageNum=1, $pageSize=9){
        $startRow = ($pageNum - 1)*$pageSize;
        $sql = "SELECT * FROM baiviet ORDER BY id_bv DESC LIMIT $startRow, $pageSize";
        return $this ->query($sql);
    }
    function demBV(){
        $sql = "SELECT count(id_bv) as dem FROM baiviet";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function capnhatbaiviet($id_bv, $tieu_de, $ngay, $noi_dung, $an_hien){
        $sql = "UPDATE baiviet SET tieu_de=:tieu_de, ngay=:ngay, noi_dung=:noi_dung, an_hien=:an_hien WHERE id_bv=:id_bv ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":tieu_de", $tieu_de, PDO::PARAM_STR);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":noi_dung", $noi_dung, PDO::PARAM_STR);
        $stmt->bindParam(":an_hien", $an_hien, PDO::PARAM_STR);;
        $stmt->bindParam(":id_bv", $id_bv, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    function deleteBV($id_bv){
        $sql = "DELETE FROM baiviet WHERE id_bv=:id_bv";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_bv", $id_bv, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
