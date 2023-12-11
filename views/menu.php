<ul id="thanhmenu">
    <li><a href="<?=ROOT_URL?>">Trang chủ</a></li>
    <?php foreach($this->listloai as $loai){ ?>
    <li>
        <a href="<?=ROOT_URL."loai?idloai=".$loai['id_loai'];?>">
        <?=$loai['ten_loai']?>
        </a>
    </li>
    <?php } ?>
    
    
   
    <li>       
                <?php
                    $count = 0;
                    if (isset($_SESSION["cart"])) {
                        $count = count($_SESSION["cart"]);
                    }
    
                    
                ?>
                
                
                
                <a href="<?=ROOT_URL."showcart"?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            
            <span style="color: black; border: solid 2px white; border-radius: 100%;"><?php
                echo $count;
            ?></span>
        </a>
    </li>
    <li>

        <?php
        if (isset($_SESSION['hoten'])&&($_SESSION['vaitro'])==0){
            echo '<a href="#"  >'."Chào " . $_SESSION['hoten'] . '</a>';
            echo '<span>|</span>';
            echo '<a href="logout" >Đăng xuất</a>';
        } else if(isset($_SESSION['hoten'])&&($_SESSION['vaitro'])==1) { 
            echo '<a href="#"  >'."Chào " . $_SESSION['hoten'] . '</a>';
            echo '<span>|</span>';
            echo '<a href="admin" >Admin</a>';
            echo '<span>|</span>';
            echo '<a href="logout" >Đăng xuất</a>';
        }else{
        ?>
        <a href="<?=ROOT_URL."login"?>" >Đăng nhập</a>
        <span>|</span>
        <a href="<?=ROOT_URL."register"?>" >Đăng ký</a>
        <?php } ?>

    </li>
    <li>

        <?php
        if (isset($_SESSION[' '])){
            echo '<a href="#"  >'."Chào " . $_SESSION['hoten'] . '</a>';
        }
        ?>
    </li>
</ul>
