<?php
// Veritabanına bağlanma
try {
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
    exit();
}

// adi al
$adi = isset($_GET['adi']) ? $_GET['adi'] : '';

// Veritabanında yönetici kaydını bul
$stmt = $db->prepare("SELECT * FROM urun_kayit WHERE adi = :adi");
$stmt->bindParam(':adi', $adi);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

// JSON formatında verileri döndür
header('Content-Type: application/json');
echo json_encode($admin);
?>
