<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlePage?></title>
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/c33.css">
</head>
<body>
    <div id="container">
        <header>
            <?php include "header.php"; ?>
        </header>
        <nav>
            <?php include "menu.php"; ?>
        </nav>
        <h2>Giỏ Hàng</h2>
        <div id="cart">
        
            <?php $tongtien = $tongsoluong = 0; ?>
            <div>
                <span> Tên sp </span>
                <span>Số lượng</span>
                <span>Giá</span>
                <span>Tiền</span>
                
            </div>
            <?php foreach($_SESSION['cart'] as $id_sp => $soluong){ ?>
                
                <?php
                    $sp = $this -> model -> detail($id_sp);
                    $tien = $sp['gia']*$soluong;
                    $tongtien += $tien;
                    $tongsoluong += $soluong;
                ?>
                <div>
                    <span> <?=$sp['ten_sp']?> </span>
                    <input type="number" name="soluong[]" value="<?=$soluong?>">
                    <span><?= number_format($sp['gia'], 0, "", ".");?> </span>
                    <span><?= number_format($tien, 0, "", "."); ?></span>
                </div>
                <div></div>
                <?php } ?>
                <div>
                    <b>Tổng số lượng:</b>
                    <b><?=$tongsoluong?></b>
                    <b>Tổng tiền:  </b>
                    <b><?= number_format($tongtien, 0, "", ".");?></b>
                </div>
                <div id="last">
                    <a href="">Trở lại trang trước</a>
                    <a href="checkout">Thanh toán đơn hàng</a>
                </div>
        </div>

        
    </div> 
    
</body>
</html>




