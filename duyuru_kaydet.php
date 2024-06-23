<?php
// Veritabanı bağlantısı
$servername = "localhost";
    $username = "hazaryilmaz_hazar";
    $password = "H.y32566941152";
    $dbname = "hazaryilmaz_sporsalonu";

    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Bağlantı başarılı.<br>";
    } catch (PDOException $e) {
        die("Bağlantı hatası: " . $e->getMessage());
    }

// Formdan gelen verileri al
$title = $_POST['title'];
$content = $_POST['content'];

// Duyuru tablosuna ekleme yap
$query = $db->prepare("INSERT INTO duyuru (adi, duyuru) VALUES (?, ?)");
$query->execute([$title, $content]);

// Başarılı bir şekilde eklendiğinde kullanıcıyı ana sayfaya yönlendir
echo "<script>
if (confirm('Duyuru Başarıyla Eklendi !')) {
    window.location.href = 'anasayfa.php';
}
else
{
    window.location.href = 'anasayfa.php';
}

</script>";
exit;
?>
