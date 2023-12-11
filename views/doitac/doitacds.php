<div id="danhsachsanpham">
    <h2>Danh sách sản phẩm</h2>
    <div id="listsp">
        <div class="sp">
            <b>Tên DT</b> <b>Hình</b> <b>URL</b> <b>Mô tả</b> <b>Thứ tự</b><b>Action</b>
        </div>
        <?php foreach($listDT as $sp){ ?>
            <div class="sp">
                <span><?=$sp['ten_dt']?></span>
                <span ><img style="width:100px; height: 100px" src="<?=$sp['hinh']?>"></span>
                <span><?=$sp['url']?></span>
                <span><?=$sp['mo_ta']?></span>
                <span><?=$sp['thu_tu']?></span>
                <span>
                    <a href="<?=ROOT_URL."doitac/editdt?id=".$sp['ma_dt']?>">Sửa | </a>
                    <a href="<?=ROOT_URL."doitac/deletedt?id=".$sp['ma_dt']?>"
                    onclick="return confirm('Xóa hả?')">Xóa</a>
                </span>
            </div>
        <?php } ?>
    </div>
    </div>
