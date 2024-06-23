<?php
    // Veritabanı bağlantısı
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");

    // POST verilerini al
    $tc = $_POST['tc'];
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $tel = $_POST['tel'];
    $tarih = $_POST['tarih'];
    $email = $_POST['email'];
    $uyelik_turu= $_POST['uyelik_turu'];
    $durum= $_POST['durum'];
    $sure= $_POST['sure'];
    $ucret= $_POST['ucret'];


    // Veritabanında ilgili kaydı güncelle
    $stmt = $db->prepare("UPDATE musteri_kayit SET adi = :adi, soyadi = :soyadi, tel = :tel, tarih = :tarih, email = :email, uyelik_turu = :uyelik_turu, durum = :durum, sure = :sure, ucret = :ucret WHERE tc = :tc");
    $stmt->bindParam(':adi', $adi);
    $stmt->bindParam(':soyadi', $soyadi);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':tarih', $tarih);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':uyelik_turu', $uyelik_turu);
    $stmt->bindParam(':durum', $durum);
    $stmt->bindParam(':sure', $sure);
    $stmt->bindParam(':ucret', $ucret);
    $stmt->bindParam(':tc', $tc);
    
    
    // Güncelleme işlemini gerçekleştir
    if ($stmt->execute()) {
        
        echo "<script>
                    if (confirm('Veri başarıyla güncellendi.')) {
                        window.location.href = 'musteriler.php';
                    }
                    else
                    {
                        window.location.href = 'musteriler.php';
                    }

                </script>";
    } else {
        echo "<script>
                    if (confirm('Veri Güncelleme Hatası Tekrar deneyin')) {
                        window.location.href = 'musteriler.php';
                    }
                    else
                    {
                        window.location.href = 'musteriler.php';
                    }

                </script>";
    }
?>
