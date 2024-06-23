<?php
    // Veritabanı bağlantısı
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");

    // POST verilerini al
    $adi = $_POST['adi'];
    

    // Veritabanında ilgili kaydı sil
    $stmt = $db->prepare("DELETE FROM duyuru WHERE adi = :adi");
     $stmt->bindParam(':adi', $adi);
     $stmt->execute();
    
    // silme işlemini gerçekleştir
    if ($stmt->execute()) {
        
        echo "<script>
                    if (confirm('Duyuru başarıyla Silindi.')) {
                        window.location.href = 'anasayfa.php';
                    }
                    else
                    {
                        window.location.href = 'anasayfa.php';
                    }

                </script>";
    } else {
        echo "<script>
                    if (confirm('Duyuru Silinemedi Tekrar deneyin')) {
                        window.location.href = 'anasayfa.php';
                    }
                    else
                    {
                        window.location.href = 'anasayfa.php';
                    }

                </script>";
    }
?>
