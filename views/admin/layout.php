<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlePage?></title>
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/admin101.css">
</head>
<body>
    <div id="container">
        <header>
            <b id="userinfo">
                <?php if(isset($_SESSION['hoten'])) echo "Chào ". $_SESSION['hoten']; ?>
            </b>
        </header>
        <nav>
            <ul id="thanhmenu">
                <li><a href="<?=ROOT_URL."admin"?>">Trang chủ</a></li>
                <li><a href="<?=ROOT_URL."admin/loai"?>">Quản trị danh mục</a></li>
                <li><a href="<?=ROOT_URL."admin/sp"?>">Quản trị sản phẩm</a></li>
                <li><a href="">Quản trị đơn hàng</a></li>
                <li><a href="<?= ROOT_URL ?>admin/logout">Thoát</a></li>
            </ul>
        </nav>
        <main>
            <article>
                <?php include $viewnoidung ?>
            </article>
        </main>
    </div>
</body>
</html>