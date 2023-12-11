<style>
    #frmchangepass { width:650px; margin:auto; border:2px solid darkblue; padding:10px 10px;}
#frmchangepass > div { margin-bottom: 15px;}
#frmchangepass > div > label { display: block;}
#frmchangepass > div > input { padding: 8px; outline: none; width: 100%;}
#frmchangepass > div > button { width: 130px; height: 35px;} 

</style>
<form id="frmchangepass" action="changepass_" method="post">
    <div>
        <label>Email</label>
        <input type="email" name="email" disabled value="<?=$_SESSION['email']?>">
    </div>
    <div><label>Mật khẩu</label> <input type="password" name="matkhauCu"></div>
    <div><label>Mật khẩu</label> <input type="password" name="matkhauMoi1"></div>
    <div><label>Mật khẩu</label> <input type="password" name="matkhauMoi2"></div>
    <div><button type="submit">Đổi mật khẩu</button></div>
</form>