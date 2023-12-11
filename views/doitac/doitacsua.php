<style>
    #frmsuadt { width: 900px; margin: auto; border: 2px solid darkblue; padding: 10px 10px;}
#frmsuadt > div { margin-bottom: 15px;}
#frmsuadt > div > label { display: block;}
#frmsuadt  .txt { height: 40px; outline: none; width: 100%;}
#frmsuadt > div > button { width: 130px; height: 35px;} 
#frmsuadt .haicot { display: flex; justify-content: space-between}
#frmsuadt .haicot > div { width: 48%;  }
#frmsuadt #mota { height: 120px;}

</style>
<form id="frmsuadt" action="<?=ROOT_URL?>doitac/editdt_" method="post" enctype="multipart/form-data">
    <div class="haicot">
        <div><label>Tên đối tác</label><input type="text" class="txt" id="ten_dt" name="ten_dt" value="<?=$sp['ten_dt']?>"></div>
        <div><label>Địa chỉ liên kết</label><input type="text" class="txt" name="url" value="<?=$sp['url']?>"></div>

    </div>
    <div>
        <label>Hình</label><input type="text" name="hinh" id="hinh" class="txt" value="<?=$sp['hinh']?>"></input>
    </div>
    <div>
        <label>Hình</label><img src="<?=$sp['hinh']?>" alt="">
    </div>
    <div>
        <label>Mô tả</label><input type="text" name="mo_ta" id="mo_ta" class="txt" value="<?=$sp['mo_ta']?>"></input>
    </div>
    <div>
        <label>Thứ tự</label><input type="text" name="thu_tu" id="thu_tu" class="txt" value="<?=$sp['thu_tu']?>"></input>
    </div>
    
    <div><input type="hidden" name="ma_dt" value="<?=$sp['ma_dt']?>" >
        <button type="submit">Lưu đối tác</button>
    </div>
</form>