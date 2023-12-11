<form id="frmthemsp" action="<?=ROOT_URL?>admin/addsp_" method="post" enctype="multipart/form-data">
    <div class="haicot">
        <div><label>Tên sản phẩm</label><input type="text" class="txt" name="ten_sp"></div>
        <div><label>Ngày</label><input type="date" class="txt" name="ngay"></div>
    </div>
    <div class="haicot">
        <div><label>Gía</label><input type="text" class="txt" name="gia"></div>
        <div><label>Giá km</label><input type="text" class="txt" name="gia_km"></div>
    </div>
    <div class="haicoi">
        <div><label>Ẩn hiện</label>
            <input type="radio" name="anhien" value="0">Ẩn
            <input type="radio" name="anhien" value="1" checked>Hiện
        </div>
        <div><label>Nổi bật</label>
            <input type="radio" name="hot" value="1">Nổi bật
            <input type="radio" name="hot" value="0" checked>Bình thường
        </div>
    </div>
    <div>
        <p>idL: <select name="id_loai" class="form-control">
            <?php foreach($this->listloai as $loai) {?>

            <option value="<?=$loai['id_loai']?>">
                <?=$loai['ten_loai']?>
            </option>
            <?php }?>
            </select>
            
        </p>
    </div>
    <div>
        <label>Mô tả</label><textarea name="mota" id="mota" class="txt"></textarea>
    </div>
    <div>
        <label>Hình</label><input type="file" name="hinh" id="hinh" class="txt"></input>
    </div>
    <div>
        <button type="submit">Thêm sản phẩm</button>
    </div>
</form>