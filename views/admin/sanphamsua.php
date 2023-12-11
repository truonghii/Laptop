<h1>Form sửa sản phẩm</h1>
<form id="frmsuasp" action="<?=ROOT_URL?>admin/editsp_" method="post" >
<div class="haicot">
    <div><label>Tên sản phẩm</label> 
         <input class="txt" type="text" name="ten_sp" value="<?=$sp['ten_sp']?>" > 
    </div>
    <div> <label>Ngày</label> 
         <input class="txt" type="date" name="ngay" value="<?=$sp['ngay']?>" > 
    </div>
</div>
<div class="haicot">
    <div> <label>Gia</label> 
          <input class="txt" type="number" name="gia" value="<?=$sp['gia']?>" > 
    </div>
    <div> <label>Gia km</label> 
          <input class="txt" type="number" name="gia_km" value="<?=$sp['gia_km']?>" > 
    </div>
</div>
<div class="haicot">
    <div> <label>Ẩn hiện</label> 
      <input type="radio" name="anhien" <?=$sp['anhien']==0? "checked":"";?> value="0" >Ẩn 
      <input type="radio" name="anhien" value="1" <?=$sp['anhien']==1? "checked":""?>>Hiện 
    </div>
    <div> <label>Nổi bật</label> 
     <input type="radio" name="hot" value="0" <?=$sp['hot']==0? "checked":""?>>Bình thường
     <input type="radio" name="hot" value="1" <?=$sp['hot']==1? "checked":""?> >Nổi bật 
    </div>
</div>
<div> <label>Mô tả</label> 
      <textarea class="txt" name="mota" id="mota"><?=$sp['mota']?></textarea>
</div>
<div> <label>Hình</label> 
      <input class="txt" type="file" name="hinh" > <br> <i><?=$sp['hinh']?></i>
</div>
<div> <input type="hidden" name="id_sp" value="<?=$sp['id_sp']?>" >
      <button type="submit">Lưu sản phẩm</button> 
</div>
</form>
