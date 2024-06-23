<?php


try {
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
    exit();
}
// Satış miktarını al ve sayısal değere dönüştür
$satisMiktar = isset($_POST['satıs_miktar']);


// Seçili ürün adını al
$adi = isset($_POST['adi']) ? $_POST['adi'] : '';
$satisMiktar = isset($_POST['satıs_miktar']) ? intval($_POST['satıs_miktar']) : 0;


// Veritabanında ilgili ürünü bul
$stmt = $db->prepare("SELECT * FROM urun_kayit WHERE adi = :adi");
$stmt->bindParam(':adi', $adi);
$stmt->execute();
$urun = $stmt->fetch(PDO::FETCH_ASSOC);

if ($urun) {

    // Güncel miktarı hesapla
    $guncelMiktar = $urun['miktar'] - $satisMiktar;

    // Miktarı güncelle
    $stmt = $db->prepare("UPDATE urun_kayit SET miktar = :miktar WHERE adi = :adi");
    $stmt->bindParam(':miktar', $guncelMiktar);
    $stmt->bindParam(':adi', $adi);
    $stmt->execute();

    echo "<script>
        if (confirm('Satış İşlemi Başarılı.')) {
            window.location.href = \"urunler.php\";
        }
        else {
            window.location.href = \"urunsat.php\";
        }
    </script>";
} else {
    echo "<script>
    if (confirm('Satış İşlemi Başarısız Tekrar Deneyin.')) {
        window.location.href = \"urunsat.php\";
    }
    else {
        window.location.href = \"urunler.php\";
    }
</script>";
}
?>

