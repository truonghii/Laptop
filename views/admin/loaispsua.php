<form id="frmsualoaisp" action="<?=ROOT_URL?>admin/editloai_" method="post" >
<div><label>Tên loại sản phẩm</label> 
<input class="txt" type="text" name="ten_loai" value="<?=$sp['ten_loai']?>" > </div>
<div> <label>Thứ tự</label> 
<input  class="txt" type="number" name="thutu" value="<?=$sp['thutu']?>"> </div>
<div> <label>Ẩn hiện</label> 
  <input type="radio" name="anhien" value="0" <?=$sp['anhien']==0? "checked":"";?> >Ẩn 
  <input type="radio" name="anhien"  value="1" <?=$sp['anhien']==1? "checked":""?> >Hiện 
</div>
<input type="hidden" name="id_loai" value="<?=$sp['id_loai']?>" >
<div> <button type="submit">Cập nhật loại sản phẩm</button> </div>
</form>
