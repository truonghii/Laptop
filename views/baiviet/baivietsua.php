<style>
    #formthembv { width: 900px; margin: auto; border: 2px solid darkblue; padding: 10px 10px;}
#formthembv > div { margin-bottom: 15px;}
#formthembv > div > label { display: block;}
#formthembv  .txt { height: 40px; outline: none; width: 100%;}
#formthembv > div > button { width: 130px; height: 35px;} 
#formthembv .haicot { display: flex; justify-content: space-between}
#formthembv .haicot > div { width: 48%;  }
#formthembv #mota { height: 120px;}

</style>
<form id="formthembv" action="<?=ROOT_URL?>baiviet/editbv_" method="post" enctype="multipart/form-data">
    <div class="haicot">
        <div><label>Tiêu đề</label><input type="text" class="txt" id="tieu_de" name="tieu_de" value="<?=$sp['tieu_de']?>"></div>
        <div><label>Ngày</label><input type="date" class="txt" name="ngay" value="<?=$sp['ngay']?>"></div>
    </div>
    <div>
        <label>Hình</label><input type="text" name="hinh" id="hinh" class="txt" value="<?=$sp['hinh']?>"></input>
    </div>
    <div>
        <label>Nội dung</label><input type="text" name="noi_dung" id="noi_dung" class="txt" value="<?=$sp['noi_dung']?>"></input>
    </div>
    <div><label>Ẩn hiện</label>
        <input type="radio" name="an_hien" <?=$sp['an_hien']==0? "checked":"";?> value="0" >Ẩn 
        <input type="radio" name="an_hien" value="1" <?=$sp['an_hien']==1? "checked":""?>>Hiện 
        </div>
    <div><input type="hidden" name="id_bv" value="<?=$sp['id_bv']?>" >
        <button type="submit">Sửa bài viết</button>
    </div>
</form>