<?php
// Veritabanına bağlanma
try {
    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
    exit();
}

// TC Kimlik Numarasını al
$tc = isset($_GET['tc']) ? $_GET['tc'] : '';

// Veritabanında yönetici kaydını bul
$stmt = $db->prepare("SELECT * FROM admin_kayit WHERE tc = :tc");
$stmt->bindParam(':tc', $tc);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

// JSON formatında verileri döndür
header('Content-Type: application/json');
echo json_encode($admin);
?>
