<?php
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
    
} catch(PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST["unuttum"])) {
    $Atc = $_POST["kayittc"];
    $Amail = $_POST["kayitmail"];

    $c = $db->query("SELECT * FROM musteri_kayit WHERE tc='".$Atc."'")->rowCount();
    if($c == 0) {
        echo "<script>
        if (confirm('Böyle bir kullanıcı bulunamadı!')) {
            window.location.href = 'musterigiris.html';
        }
        else
        {
            window.location.href = 'musterigiris.html';
        }

    </script>";


        
    } else {
        $c1 = $db->query("SELECT * FROM musteri_kayit WHERE email='".$Amail."'")->rowCount();
        if($c1 == 0) {
            echo "<script>
        if (confirm('Böyle bir kullanıcı bulunamadı!')) {
            window.location.href = 'musterigiris.html';
        }
        else
        {
            window.location.href = 'musterigiris.html';
        }

    </script>";

        } else {
            $code = uniqid();
            if($db->query("UPDATE musteri_kayit SET code='".$code."' WHERE tc='".$Atc."' AND email='".$Amail."'")) {
               
                
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtp.outlook.com";
                $mail->SMTPAuth = true;
                $mail->Username = "bilgisayarprogramciligi2022@outlook.com";
                $mail->Password = "Deneme.123";
                $mail->Port = 587;
                $mail->SMTPSecure = "tls";
                $mail->CharSet = "UTF-8";
                $mail->setLanguage('tr', 'PHPMailer/Language/');
                $mail->SMTPDebug = 0;
                $mail->setFrom('bilgisayarprogramciligi2022@outlook.com', "Hazar Yılmaz");
                $mail->addAddress($Amail, "Spor Salonu");
                $mail->Subject = "Şifremi Unuttum";

                $icerik = "".$Atc." Tc Kimlik numaralı Müşteri:<br> Şifrenizi değiştirmek için kodunuz: <b>".$code."</b><br> Aşağıdaki linke tıklayarak gidin:<br> <a href='http://hazaryilmaz.com/musterisifredegistir.php'>Buraya tıklayın</a>";
                $mail->msgHTML($icerik);

                if($mail->send()) {
                    echo "<script>
                    if (confirm('Mail Gönderimi Başarılı Lütfen Kontrol Sağlayın.')) {
                        window.location.href = 'musterigiris.html';
                    }
                    else
                    {
                        window.location.href = 'musterigiris.html';
                    }

                </script>";
                } else {
                    echo "<script>
                    if (confirm('Mail Gönderimi Başarısız Tamam\'a basarak tekrar giriş yapabilirsiniz.')) {
                        window.location.href = 'musterigiris.html';
                    }
                    else
                    {
                        window.location.href = 'musterigiris.html';
                    }

                </script>";
                }
            } else {
                echo "Bir hata oluştu";
            }
        }
    }
}
?>
