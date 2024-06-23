<?php
    // Veritabanı bağlantısı
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");

    // POST verilerini al
    $tc = $_POST['tc'];
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $tel = $_POST['tel'];
    $pozisyon = $_POST['pozisyon'];
    $email = $_POST['email'];

    // Veritabanında ilgili kaydı güncelle
    $stmt = $db->prepare("UPDATE admin_kayit SET adi = :adi, soyadi = :soyadi, tel = :tel, pozisyon = :pozisyon, email = :email WHERE tc = :tc");
    $stmt->bindParam(':adi', $adi);
    $stmt->bindParam(':soyadi', $soyadi);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':pozisyon', $pozisyon);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tc', $tc);
    
    // Güncelleme işlemini gerçekleştir
    if ($stmt->execute()) {
        
        echo "<script>
                    if (confirm('Veri başarıyla güncellendi.')) {
                        window.location.href = 'yoneticiler.php';
                    }
                    else
                    {
                        window.location.href = 'yoneticiler.php';
                    }

                </script>";
    } else {
        echo "<script>
                    if (confirm('Veri Güncelleme Hatası Tekrar deneyin')) {
                        window.location.href = 'yoneticiler.php';
                    }
                    else
                    {
                        window.location.href = 'yoneticiler.php';
                    }

                </script>";
    }
?>
