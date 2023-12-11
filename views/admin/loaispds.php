
<div id="danhsachsanpham">
    <h2>Danh sách sản phẩm</h2>
    <div id="listLoaiSP">
        <div class="loai">
            <b>Tên Loại</b> <b>Thứ Thự</b> <b>Ân Hiện</b> <b>Action</b>
        </div>
        <?php foreach($listLoaiSP as $loai){ ?>
            <div class="loai">
                <span><?=$loai['ten_loai']?></span>
                <span><?=$loai['thutu']?></span>
                <span><?=($loai['anhien']==0) ? "Đang ẩn":"Đang hiện"?></span>
                <span>
                    <a href="<?=ROOT_URL."admin/editloai?id=".$loai['id_loai']?>">Sửa | </a>
                    <a href="<?=ROOT_URL."admin/deleteloai?id=".$loai['id_loai']?>"
                    onclick="return confirm('Xóa hả?')">Xóa</a>
                </span>
            </div>
        <?php } ?>
    </div>
 </div>

 <!-- phân trang -->
 <div id="pagination">
            <?php if($pageNum>=2){ ?>
            <a href='<?=ROOT_URL."admin/loai?page=1";?>'>Trang đầu</a>
            <?php } ?>
            <?php if ($pagePrev>=1){ ?>
            <a href='<?=ROOT_URL."admin/loai?page=$pagePrev";?>'>Trang trước</a>
            <?php } ?>
            <?php if ($pageNext<$tongSoTrang){?>
            <a href='<?=ROOT_URL."admin/loai?page=$pageNext";?>'>Trang sau</a>
            <?php } ?>
            <?php if($pageNum<$tongSoTrang){ ?>
            <a href='<?=ROOT_URL."admin/loai?page=$tongSoTrang";?>'>Trang cuối</a>
            <?php } ?>
    </div>