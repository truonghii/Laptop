<div id="danhsachsanpham">
    <h2>Danh sách sản phẩm</h2>
    <div id="listsp">
        <div class="sp">
            <b>Tên SP</b> <b>Loại</b> <b>Giá</b> <b>Giá KM</b> <b>Ngày</b>
            <b>Ẩn Hiện</b> <b>Nổi bật</b> <b>Action</b>
        </div>
        <?php foreach($listsp as $sp){ ?>
            <div class="sp">
                <span><?=$sp['ten_sp']?></span>
                <span><?=$this->model->layTenLoai($sp['id_loai'])?></span>
                <span><?=$sp['gia']?></span>
                <span><?=$sp['gia_km']?></span>
                <span><?=$sp['ngay']?></span>
                <span><?=($sp['anhien']==0) ? "Đang ẩn":"Đang hiện"?></span>
                <span><?=($sp['hot']==0) ? "Đang ẩn":"Đang hiện"?></span>
                <span>
                    <a href="<?=ROOT_URL."admin/editsp?id=".$sp['id_sp']?>">Sửa | </a>
                    <a href="<?=ROOT_URL."admin/deletesp?id=".$sp['id_sp']?>"
                    onclick="return confirm('Xóa hả?')">Xóa</a>
                </span>
            </div>
        <?php } ?>
    </div>

    <!-- phân trang -->
    <div id="pagination">
            <?php if($pageNum>=2){ ?>
            <a href='<?=ROOT_URL."admin/sp?page=1";?>'>Trang đầu</a>
            <?php } ?>
            <?php if ($pagePrev>=1){ ?>
            <a href='<?=ROOT_URL."admin/sp?page=$pagePrev";?>'>Trang trước</a>
            <?php } ?>
            <?php if ($pageNext<$tongSoTrang){?>
            <a href='<?=ROOT_URL."admin/sp?page=$pageNext";?>'>Trang sau</a>
            <?php } ?>
            <?php if($pageNum<$tongSoTrang){ ?>
            <a href='<?=ROOT_URL."admin/sp?page=$tongSoTrang";?>'>Trang cuối</a>
            <?php } ?>
    </div>
</div>