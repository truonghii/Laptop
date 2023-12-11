<?php 
require_once "database.php";
class doitac extends database {
    function detail($ma_dt=0){
        $sql ="SELECT ma_dt, ten_dt, hinh, url, mo_ta , thu_tu
            FROM doi_tac WHERE ma_dt = $ma_dt";
        return $this->queryOne($sql);
    }    
    function luusanpham($ten_dt, $hinh, $url, $mo_ta, $thu_tu){
        $sql = "INSERT INTO doi_tac SET ten_dt=:ten_dt, hinh=:hinh, url=:url,
        mo_ta=:mo_ta, thu_tu=:thu_tu";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ten_dt", $ten_dt, PDO::PARAM_STR);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->bindParam(":mo_ta", $mo_ta, PDO::PARAM_STR);
        $stmt->bindParam(":thu_tu", $thu_tu, PDO::PARAM_INT);
        $stmt->execute();
        $ma_dt = $this->conn->lastInsertId();
        return $ma_dt;
    }
    function danhsachDT($pageNum=1, $pageSize=9){
        $startRow = ($pageNum - 1)*$pageSize;
        $sql = "SELECT * FROM doi_tac ORDER BY ma_dt DESC LIMIT $startRow, $pageSize";
        return $this ->query($sql);
    }
    function demDT(){
        $sql = "SELECT count(ma_dt) as dem FROM doi_tac";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function capnhatdoitac($ma_dt, $ten_dt, $mo_ta, $thu_tu){
        $sql = "UPDATE doi_tac SET ten_dt=:ten_dt, mo_ta=:mo_ta, thu_tu=:thu_tu WHERE ma_dt=:ma_dt ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ten_dt", $ten_dt, PDO::PARAM_STR);
        $stmt->bindParam(":mo_ta", $mo_ta, PDO::PARAM_STR);
        $stmt->bindParam(":thu_tu", $thu_tu, PDO::PARAM_STR);;
        $stmt->bindParam(":ma_dt", $ma_dt, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    function deleteDT($ma_dt){
        $sql = "DELETE FROM doi_tac WHERE ma_dt=:ma_dt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ma_dt", $ma_dt, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
