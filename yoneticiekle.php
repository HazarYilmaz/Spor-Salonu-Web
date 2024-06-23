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

// TC kimlik doğrulama fonksiyonu
function validateTC($tc)
{
    // TC Kimlik numarasının 11 haneli olduğunu kontrol etme
    if (strlen($tc) != 11) {
        return false;
    }

    // İlk hane sıfır olamaz
    if ($tc[0] == '0') {
        return false;
    }

    // İlk 9 hane için rakam kontrolü
    for ($i = 0; $i < 9; $i++) {
        if (!is_numeric($tc[$i])) {
            return false;
        }
    }

    // Son iki hane için rakam kontrolü
    if (!is_numeric($tc[9]) || !is_numeric($tc[10])) {
        return false;
    }

    // TC Kimlik numarasının doğruluğunu kontrol etme
    $t1 = ($tc[0] + $tc[2] + $tc[4] + $tc[6] + $tc[8]) * 7;
    $t2 = ($tc[1] + $tc[3] + $tc[5] + $tc[7]);
    $t = $t1 - $t2;
    $t3 = $t % 10;
    if ($t3 != $tc[9]) {
        return false;
    }

    $t4 = 0;
    for ($i = 0; $i < 10; $i++) {
        $t4 += $tc[$i];
    }
    $t5 = $t4 % 10;
    if ($t5 != $tc[10]) {
        return false;
    }

    // TC Kimlik numarası geçerli
    return true;
}

// Kullanıcı girişlerini temizle
$adi = cleanInput($_POST["adi"]);
$soyadi = cleanInput($_POST["soyadi"]);
$tel = cleanInput($_POST["telefon"]); // "telefon" yerine "tel" olarak değiştirildi
$pozisyon = cleanInput($_POST["pozisyon"]);
$email = cleanInput($_POST["email"]);
$tc = cleanInput($_POST["tc"]);
$sifre = cleanInput($_POST["sifre"]);
$Tsifre = cleanInput($_POST["Tsifre"]);

$errors = array(); // Uyarıları saklamak için bir dizi oluştur

// E-posta doğrulaması
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
    $mesaj = "Hata: Geçerli bir e-posta adresi giriniz!";
    echo "<script>alert('$mesaj');</script>";
    echo "<script>window.location.href = 'yoneticiekle.html';</script>";
    exit;


    
}

// Şifrelerin eşleştiğini kontrol et
if ($sifre !== $Tsifre) {
    
    $mesaj1 = "Hata: Şifreler eşleşmiyor!";
    echo "<script>alert('$mesaj1');</script>";
    echo "<script>window.location.href = 'yoneticiekle.html';</script>";
    exit;
}

// TC kimlik numarasının doğruluğunu kontrol et
if (!validateTC($tc)) {
    
    $mesaj2 = "Hata: Geçersiz TC kimlik numarası!";
    echo "<script>alert('$mesaj2');</script>";
    echo "<script>window.location.href = 'yoneticiekle.html';</script>";
    exit;
    
}

// TC kimlik numarasının veritabanında mevcut olup olmadığını kontrol et
$stmt = $db->prepare("SELECT * FROM admin_kayit WHERE tc = :tc");
$stmt->bindParam(':tc', $tc);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    
    $mesaj3 = "Hata: Bu TC kimlik numarası zaten kayıtlı!";
    echo "<script>alert('$mesaj3');</script>";
    echo "<script>window.location.href = 'yoneticiekle.html';</script>";
    exit;
}

$stmt = $db->prepare("SELECT * FROM admin_kayit WHERE tel = :tel"); // Sorgu "telefon" yerine "tel" olarak değiştirildi
$stmt->bindParam(':tel', $tel);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    
    $mesaj4 = "Hata: Bu telefon numarası zaten kayıtlı!";
    echo "<script>alert('$mesaj4');</script>";
    echo "<script>window.location.href = 'yoneticiekle.html';</script>";
    exit;
}

// E-postanın veritabanında mevcut olup olmadığını kontrol et
$stmt = $db->prepare("SELECT * FROM admin_kayit WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    
    $mesaj5 = "Hata: Bu e-posta adresi zaten kayıtlı!";
    echo "<script>alert('$mesaj5');</script>";
    echo "<script>window.location.href = 'yoneticiekle.html';</script>";
    exit;
}

if (count($errors) === 0) {
    // Parolayı hash'le
    $hashedPassword = password_hash($sifre, PASSWORD_DEFAULT);

    // Veritabanına kayıt ekleme sorgusu
    $stmt = $db->prepare("INSERT INTO admin_kayit (adi, soyadi, tel, pozisyon, email, tc, sifre) VALUES (:adi, :soyadi, :tel, :pozisyon, :email, :tc, :sifre)"); // Sütun ismi "telefon" yerine "tel" olarak değiştirildi
    $stmt->bindParam(':adi', $adi);
    $stmt->bindParam(':soyadi', $soyadi);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':pozisyon', $pozisyon);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tc', $tc);
    $stmt->bindParam(':sifre', $hashedPassword);

    // Sorguyu çalıştır
    if ($stmt->execute()) {
        $mesaj6 = "Kayıt Başarıyla Eklendi";
        echo "<script>alert('$mesaj6');</script>";
        echo "<script>window.location.href = 'yoneticiler.php';</script>";
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
