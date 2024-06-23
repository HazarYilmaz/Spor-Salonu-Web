<?php
// Veritabanı bağlantısı için PDO kullanımı
$servername = "localhost";
$username = "hazaryilmaz_hazar";
$password = "H.y32566941152";
$dbname = "hazaryilmaz_sporsalonu";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

// Kullanıcı girişlerini temizleme işlevi
function cleanInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}



// Kullanıcı girişlerini temizle
$adi = cleanInput($_POST["adi"]);
$miktar = cleanInput($_POST["miktar"]);
$alis = cleanInput($_POST["alis_fiyat"]); 
$satis = cleanInput($_POST["satis_fiyat"]);


$errors = array(); // Uyarıları saklamak için bir dizi oluştur






// Ürün adını numarasının veritabanında mevcut olup olmadığını kontrol et
$stmt = $db->prepare("SELECT * FROM urun_kayit WHERE adi = :adi");
$stmt->bindParam(':adi', $adi);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    
    $mesaj3 = "Hata: Bu Ürün zaten kayıtlı!";
    echo "<script>alert('$mesaj3');</script>";
    echo "<script>window.location.href = 'urunekle.html';</script>";
    exit;
}
if (count($errors) === 0) {
    

    // Veritabanına kayıt ekleme sorgusu
    $stmt = $db->prepare("INSERT INTO urun_kayit (adi, miktar, alis_fiyat, satis_fiyat) VALUES (:adi, :miktar, :alis_fiyat, :satis_fiyat)"); 
    $stmt->bindParam(':adi', $adi);
    $stmt->bindParam(':miktar', $miktar);
    $stmt->bindParam(':alis_fiyat', $alis);
    $stmt->bindParam(':satis_fiyat', $satis);
   

    // Sorguyu çalıştır
    if ($stmt->execute()) {
        $mesaj6 = "Kayıt Başarıyla Eklendi";
        echo "<script>alert('$mesaj6');</script>";
        echo "<script>window.location.href = 'urunler.php';</script>";
        exit;
    } else {
        $errors[] = "Hata: " . $stmt->errorInfo()[2];
    }
}




// Hataları ekrana bas
if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}

// Veritabanı bağlantısını kapat
$db = null;
