<?php
$db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");

if (isset($_GET['tc'])) {
    $selectedTc = $_GET['tc'];
    $stmt = $db->prepare("SELECT * FROM musteri_kayit WHERE tc = ?");
    $stmt->execute([$selectedTc]);
    $uye = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($uye);
}
?>
