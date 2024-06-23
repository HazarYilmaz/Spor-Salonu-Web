<?php
    // Veritabanı bağlantısı
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");

    // POST verilerini al
    $tc = $_POST['tc'];
    

    // Veritabanında ilgili kaydı sil
    $stmt = $db->prepare("DELETE FROM personel_kayit WHERE tc = :tc");
     $stmt->bindParam(':tc', $tc);
     $stmt->execute();
    
    // silme işlemini gerçekleştir
    if ($stmt->execute()) {
        
        echo "<script>
                    if (confirm('Yönetici başarıyla Silindi.')) {
                        window.location.href = 'personel.php';
                    }
                    else
                    {
                        window.location.href = 'personel.php';
                    }

                </script>";
    } else {
        echo "<script>
                    if (confirm('Yönetici Silinemedi Tekrar deneyin')) {
                        window.location.href = 'personel.php';
                    }
                    else
                    {
                        window.location.href = 'personel.php';
                    }

                </script>";
    }
?>
