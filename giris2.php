<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
} catch (PDOException $e) {
    echo $e->getMessage();
}

$hatirlaSure = 7 * 24 * 60 * 60; // Saniye cinsinden 7 gün

if (isset($_POST["gonder"])) {
    $Mgiristc = $_POST["txttc"];
    $sifre = $_POST["txtsifre"];
    $beniHatirla = isset($_POST["beniHatirla"]);

    if ($sifre != "" && $Mgiristc != "") {
        $kullanicikontrol = $db->prepare("SELECT * FROM admin_kayit WHERE tc=?");
        $kullanicikontrol->execute([$Mgiristc]);
        $kullanici = $kullanicikontrol->fetch(PDO::FETCH_ASSOC);

        if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
            if ($beniHatirla) {
                setcookie('txttc', $Mgiristc, time() + $hatirlaSure, '/');
                setcookie('txtsifre', $sifre, time() + $hatirlaSure, '/');
            } else {
                setcookie('txttc', '', time() - $hatirlaSure, '/');
                setcookie('txtsifre', '', time() - $hatirlaSure, '/');
            }

            header("refresh:1 url=anasayfa.php");
            exit();
        } else {
            echo "<script>
                    if (confirm('Kullanıcı Adı veya şifreniz yanlış. Tamam\'a basarak tekrar giriş yapabilirsiniz.')) {
                        window.location.href = 'giris.html';
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
