<?php
    // Veritabanı bağlantısı
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");

    // POST verilerini al
    
    $miktar = $_POST['miktar'];
    $alis_fiyat = $_POST['alis_fiyat'];
    $satis_fiyat = $_POST['satis_fiyat'];
    $adi = $_POST['adi'];
    

 

   


    // Veritabanında ilgili kaydı güncelle
    $stmt = $db->prepare("UPDATE urun_kayit SET miktar = :miktar, alis_fiyat = :alis_fiyat, satis_fiyat = :satis_fiyat  WHERE adi = :adi");
    $stmt->bindParam(':miktar', $miktar);
    $stmt->bindParam(':alis_fiyat', $alis_fiyat);
    $stmt->bindParam(':satis_fiyat', $satis_fiyat);
    $stmt->bindParam(':adi', $adi);
    
    
    // Güncelleme işlemini gerçekleştir
    if ($stmt->execute()) {
        
        echo "<script>
                    if (confirm('Veri başarıyla güncellendi.')) {
                        window.location.href = 'urunler.php';
                    }
                    else
                    {
                        window.location.href = 'urunler.php';
                    }

                </script>";
    } else {
        echo "<script>
                    if (confirm('Veri Güncelleme Hatası Tekrar deneyin')) {
                        window.location.href = 'urunler.php';
                    }
                    else
                    {
                        window.location.href = 'urunler.php';
                    }

                </script>";
    }
?>
