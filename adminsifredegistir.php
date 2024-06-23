<?php
$db=new PDO("mysql:host=localhost;dbname=sporsalonu;charset=utf8","root","");
if($_POST)
{
    $Atc=$_POST["tc"];
    $Amail=$_POST["email"];
    $Asifre1=$_POST["sifre1"];
    $Asifre2=$_POST["sifre2"];
    $Acode=$_POST["code"];
    if($Amail!=""and $Asifre1!=""and $Asifre2!="" and $Atc!="" and $Acode!="")
    {
        if($Asifre1==$Asifre2)
        {
            $c=$db->query("Select * from admin_kayit where code='".$Acode."'and email='".$Amail."'and tc='".$Atc."'")->rowCount();
            if($c!=0)
            {
             if($db->query("update admin_kayit set sifre='".md5($Asifre1)."',code=''where email='".$Amail."' ")) 
             {
                echo"Sifre başarılı ile değişti giriş ekranına yönlendiriliyorsun";
                header("refresh:3; url=giris3.php");

             }
             else
             {
                echo"bir hata oluştu";
             }
            }
            else
            {
                echo"Girdiğiniz bilgiler veya kodunuz Hatalı";
            }

        }
        else
        {
            echo"Şifreler uyuşmuyor";
        }

    }
    else
    {
        echo"Lütfen Tüm Alanları doldurunuz";
 
    }
}


?>
<style>
.input
{
    padding: 10px;
    background-color: #eee;
}
.c
{
    width: 25%;
    padding: 10px;
    margin-bottom: 10px;
}
.btn
{
    padding: 10px;
}
</style>
<form action="" method="POST">
<div class="input">
        <input type="text" name="tc" placeholder=" TC kimlik" class="c">
    </div>
    <div class="input">
        <input type="text" name="email"placeholder=" Email" class="c">
    </div>
    <div class="input">
       <input type="text" name="sifre1" placeholder=" Şifreniz"class="c">
    </div>    
    <div class="input">
       <input type="text" name="sifre2"placeholder=" Şifrenizi Tekrar Giriniz" class="c">
    </div>   
    <div class="input">
       <input type="text" name="code" placeholder=" Emailize gelen kodu giriniz" class="c">
    </div>  
    <button class="btn">Şifreyi Değiştir</button> 


</form>

