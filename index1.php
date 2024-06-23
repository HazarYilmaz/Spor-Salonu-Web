<?php
$giris_zorunlu = 1;
?>
<?php
require_once __DIR__ . '/src/autoload.php';
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIARY GYM</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './header.php'; ?>
    <div class="d-flex h-100">
        <?php include './navbar.php'; ?>
        <main class="p-5 pt-3 w-100 page-bg">
            <div class="mb-4 d-flex flex-column align-items-end days fw-bold">
                <span>Üyelik Süreniz: <span>365</span> gün</span>
                <span>Kalan Süre: <span id="timer">0</span> gün</span>
            </div>
            <div id="carouselExample" class="carousel carousel-dark slide w-100" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        // Duyuruları çekmek için bir sorgu hazırla
        $duyuru_cek = $conn->prepare("SELECT * FROM duyuru ORDER BY id ASC");
        $duyuru_cek->execute();

        // İlk duyuru için active class'ı ekle
        $active = true;

        // Duyuruları döngüye alarak carousel item'ları oluştur
        while ($duyuru = $duyuru_cek->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="carousel-item <?php echo ($active) ? 'active' : ''; ?>" data-bs-interval="20000">
                <div class="alert alert-info m-0 text-center" role="alert">
                    <?php echo $duyuru['duyuru']; ?>
                </div>
            </div>
            <?php

            // İlk carousel item'dan sonra active class'ı kaldır
            $active = false;
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
        </main>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>