<style>
    #frmthemdt { width: 900px; margin: auto; border: 2px solid darkblue; padding: 10px 10px;}
#frmthemdt > div { margin-bottom: 15px;}
#frmthemdt > div > label { display: block;}
#frmthemdt  .txt { height: 40px; outline: none; width: 100%;}
#frmthemdt > div > button { width: 130px; height: 35px;} 
#frmthemdt .haicot { display: flex; justify-content: space-between}
#frmthemdt .haicot > div { width: 48%;  }
#frmthemdt #mota { height: 120px;}

</style>
<form id="frmthemdt" action="<?=ROOT_URL?>doitac/adddt_" method="post" enctype="multipart/form-data">
    <div class="haicot">
        <div><label>Tên đối tác</label><input type="text" class="txt" id="ten_dt" name="ten_dt"></div>
        <div><label>Địa chỉ liên kết</label><input type="text" class="txt" name="url"></div>

    </div>
    <div>
        <label>Hình</label><input type="file" name="hinh" id="hinh" class="txt"></input>
    </div>
    <div>
        <label>Mô tả</label><textarea name="mo_ta" id="mo_ta" class="txt"></textarea>
    </div>
    <div>
        <label>Thứ tự</label><textarea name="thu_tu" id="thu_tu" class="txt"></textarea>
    </div>
    
    <div>
        <button type="submit">Thêm sản phẩm</button>
    </div>
</form>