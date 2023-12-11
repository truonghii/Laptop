<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlePage?></title>
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/c33.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div id="container">
        <header>
            <?php include "header.php"; ?>
        </header>
        <nav>
            <?php include "menu.php"; ?>
        </nav>
        <div class="container-fluid pt-5">
        <form class="row px-xl-5" onsubmit="return validForm()" action="checkout_" method="post">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin đặt hàng</h4>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input id="fname" class="form-control" type="text" name="hoten" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input id="femail" class="form-control" type="text" name="email"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input id="fdt" class="form-control" type="text" name="dienthoai"  placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input id="fdc" class="form-control" type="text" name="diachi" placeholder="Địa chỉ">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thông tin hóa đơn</h4>
                    </div>
                    <div class="card-body">
                    <?php $tongtien = $tongsoluong = 0; ?>
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        <?php foreach($_SESSION['cart'] as $id_sp => $soluong){?>
                            
                        <?php
                            $sp = $this -> model -> detail($id_sp);
                            $tien = $sp['gia']*$soluong;
                            $tongtien += $tien;
                            $tongsoluong += $soluong;
                            
                        ?>
                        <div class="d-flex justify-content-between">
                            <p> <?=$sp['ten_sp']?> </p>

                            <p><?= number_format($tien, 0, "", "."); ?></p>
                        </div>
                        <div></div>
                        <?php } ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng số sản phẩm</h6>
                            <h6 class="font-weight-medium">
                                <?= $tongsoluong ?>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <h5 class="font-weight-bold"><?= number_format($tongtien, 0, "", "."); ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <!-- <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" id="paypal">
                                <label class="custom-control-label" for="paypal">Chuyển khoản ngân hàng</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div> -->
                    <input type="hidden" name="tongSP" value="<?= $tongSP ?>">
                    <input type="hidden" name="tongTien" value="<?= $tongTien ?>">
                    <div class="card-footer border-secondary bg-transparent"><a href="checkout">
                        <button type="submit"  name="xuatHoaDon"
                            class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <footer> 
            <?php include "footer.php"; ?>
        </footer>
    </div> 
    <script>
        function validateForm() {
    var fname = document.forms["contactForm"]["fname"].value;
    var femail = document.forms["contactForm"]["femail"].value;
    var fdt = document.forms["contactForm"]["fdt"].value;
    var fdc = document.forms["contactForm"]["fdc"].value;
   


    if (fname == null || fname == "") {
        alert("Chưa nhập tên");
        return false;
    } else if (femail == null || femail == "") {
        alert("Chưa nhập eamil");
        return false;
    }else if (fdt == null || fdt == "") {
        alert("Chưa nhập số điện thoại");
        return false;
    } else (fdc == null || fdc == "") {
        alert("Chưa nhập địa chỉ");
        return false;
    }
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>


