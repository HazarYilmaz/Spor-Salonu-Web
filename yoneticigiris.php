<?php
session_start();
try {
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
} catch (PDOException $e) {
    echo $e->getMessage();
}



if (isset($_POST["gonder"])) {

    //textlerden veriyi aldı değişkene atayıverdi
    $Mgiristc = $_POST["txttc"];
    $sifre = $_POST["txtsifre"];
   

    if ($sifre != "" && $Mgiristc != "") {
        $kullanicikontrol = $db->prepare("SELECT * FROM admin_kayit WHERE tc=?");
        $kullanicikontrol->execute([$Mgiristc]);
        $kullanici = $kullanicikontrol->fetch(PDO::FETCH_ASSOC);
        //verileri aldı

        if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
            //verileri dogruysa

            //burda da girilen sifreyi tekrar heshledi sessiona atıverdi
            $hashedPassword = password_hash($sifre, PASSWORD_DEFAULT);
           $_SESSION['txttc']=$_POST['txttc'];
           
           $_SESSION['txtsifre']=$hashedPassword;
           //beni hatırla işratlendiyse kurabiye olusturcaz
           if (isset($_POST["beniHatirla"])) {

            $cookie1 = setcookie("txttc", $Mgiristc, time() + 60 * 60 * 24 * 7, "/", "", true, true);
            $cookie2 = setcookie("txtsifre", $hashedPassword, time() + 60 * 60 * 24 * 7, "/", "", true, true);




           }
           //beni hatırla olusturulmadıysa kurabiyeleri yiyoruz
           else{

            $cookie1 = setcookie("txttc", $Mgiristc, time() - 60 * 60 * 24 * 7, "/", "", true, true);
            $cookie2 = setcookie("txtsifre", $hashedPassword, time() - 60 * 60 * 24 * 7, "/", "", true, true);

           }
           
           echo "<script>
                    if (confirm('Giriş Başarılı')) {
                        window.location.href = 'anasayfa.php';
                    }
                    else
                    {
                        window.location.href = 'anasayfa.php';
                    }

                </script>";
           


          
        } else {
            echo "<script>
                    if (confirm('Kullanıcı Adı veya şifreniz yanlış. Tamam\'a basarak tekrar giriş yapabilirsiniz.')) {
                        window.location.href = 'giris3.php';
                    }
                    else
                    {
                        window.location.href = '';
                    }

                </script>";
        }
    }
}
?>



