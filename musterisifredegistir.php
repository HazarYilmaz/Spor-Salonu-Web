<?php
$db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
if($_POST) {
    $Atc = $_POST["tc"];
    $Amail = $_POST["email"];
    $Asifre1 = $_POST["sifre1"];
    $Asifre2 = $_POST["sifre2"];
    $Acode = $_POST["code"];
    if($Amail != "" && $Asifre1 != "" && $Asifre2 != "" && $Atc != "" && $Acode != "") {
        if($Asifre1 == $Asifre2) {
            $c = $db->query("SELECT * FROM musteri_kayit WHERE code='".$Acode."' AND email='".$Amail."' AND tc='".$Atc."'")->rowCount();
            if($c != 0) {
                $hashedPassword = password_hash($Asifre1, PASSWORD_DEFAULT);
                if($db->query("UPDATE musteri_kayit SET sifre='".$hashedPassword."', code='' WHERE email='".$Amail."'")) {
                    echo "<script>
                        if (confirm('Şifreniz başarıyla değiştirildi. Giriş yapabilirsiniz.')) {
                            window.location.href = 'giris.php';
                        } else {
                            window.location.href = 'gisi.php';
                        }
                    </script>";
                } else {
                    echo "<script>
                        if (confirm('Bir sorun oluştu.')) {
                            window.location.href = 'musterisifredegistir.php';
                        } else {
                            window.location.href = 'musterisifredegistir.php';
                        }
                    </script>";
                }
            } else {
                echo "<script>
                    if (confirm('Girdiğiniz bilgiler veya kodunuz hatalı.')) {
                        window.location.href = 'musterisifredegistir.php';
                    } else {
                        window.location.href = 'musterisifredegistir.php';
                    }
                </script>";
            }
        } else {
            echo "<script>
                if (confirm('Şifreler uyuşmuyor.')) {
                    window.location.href = 'musterisifredegistir.php';
                } else {
                    window.location.href = 'musterisifredegistir.php';
                }
            </script>";
        }
    } else {
        echo "<script>
            if (confirm('Lütfen tüm alanları doldurunuz.')) {
                window.location.href = 'musterisifredegistir.php';
            } else {
                window.location.href = 'musterisifredegistir.php';
            }
        </script>";
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
       <input type="password" name="sifre1" placeholder=" Şifreniz"class="c">
    </div>    
    <div class="input">
       <input type="password" name="sifre2"placeholder=" Şifrenizi Tekrar Giriniz" class="c">
    </div>   
    <div class="input">
       <input type="text" name="code" placeholder=" Emailize gelen kodu giriniz" class="c">
    </div>  
    <button class="btn">Şifreyi Değiştir</button> 


</form>

