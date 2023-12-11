<div id="danhsachsanpham">
    <h2>Danh sách sản phẩm</h2>
    <div id="listsp">
        <div class="sp">
            <b>Tiêu đề</b> <b>Hình</b> <b>Ngày</b> <b>Nội dung</b> <b>Ẩn hiện</b><b>Action</b>
        </div>
        <?php foreach($listBV as $sp){ ?>
            <div class="sp">
                <span><?=$sp['tieu_de']?></span>
                <span ><img style="width:100px; height: 100px" src="<?=$sp['hinh']?>"></span>
                <span><?=$sp['ngay']?></span>
                <span><?=$sp['noi_dung']?></span>
                <span><?=($sp['an_hien']==0) ? "Đang ẩn":"Đang hiện"?></span>
                <span>
                    <a href="<?=ROOT_URL."baiviet/editbv?id=".$sp['id_bv']?>">Sửa | </a>
                    <a href="<?=ROOT_URL."baiviet/deletebv?id=".$sp['id_bv']?>"
                    onclick="return confirm('Xóa hả?')">Xóa</a>
                </span>
            </div>
        <?php } ?>
    </div>
    </div>
