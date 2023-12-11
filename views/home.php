<div id="spnoibat">
    <h2>Sản phảm nổi bật</h2>
    <div id="listsp">
        <?php foreach($spnb as $sp){ ?>
        <div class="sp">
            <h4><a href="<?=ROOT_URL."sp?id=".$sp['id_sp'];?>"> <?=$sp['ten_sp']?> </a></h4>
            <img src="<?=$sp['hinh']?>">
            <b>Giá <?=number_format($sp['gia'],0,"",".")?> VNĐ</b>
            
            <a href="<?=ROOT_URL."addtocart?id=".$sp['id_sp']?>&soluong=1">
                <button>
                    Thêm vào giỏ
                </button>
            </a>
            
            
        </div>
        <?php } ?>
    </div>
</div>
<hr>
<div id="spxemnhieu">
    <h2>Sản phẩm xem nhiều</h2>
    <div id="listsp">
        <?php foreach($spxn as $sp){ ?>
        <div class="sp">
            <h4><a href="<?=ROOT_URL."sp?id=".$sp['id_sp'];?>"> <?=$sp['ten_sp']?> </a></h4>
            <img src="<?=$sp['hinh']?>">
            <b>Giá <?=number_format($sp['gia'],0,"",".")?> VNĐ</b>
            <a href="<?=ROOT_URL."addtocart?id=".$sp['id_sp']?>&soluong=1">
                <button>
                    Thêm vào giỏ
                </button>
            </a>
        </div>
        <?php } ?>
    </div>
</div>