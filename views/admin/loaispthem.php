<h1> Thêm loại sản phẩm</h1>
<form id="frmthemloaisp" action="<?=ROOT_URL?>admin/addloai_" method="post">
    <div>
        <label >Tên loại sản phẩm</label>
        <input type="text" class="txt" name="ten_loai">
    </div>
    <div>
        <label >Thứ tự</label>
        <input type="number" class="txt" name="thutu">
    </div>
    <div>
        <label >Ẩn hiện</label>
        <input type="radio" name="anhien" value="0">Ẩn
        <input type="radio" name="anhien" value="1" checked>Hiện
    </div>
    <div>
        <button type="submit">Thêm loại sản phẩm</button>
    </div>
</form>