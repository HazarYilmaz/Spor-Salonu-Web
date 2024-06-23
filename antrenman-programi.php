<?php
$giris_zorunlu = 1;
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
        <main class="m-5 w-100">
        <table class="table table-striped table-bordered">
    <thead>
        <tr class="table-dark">
            <th scope="col">Pazartesi</th>
            <th scope="col">Salı</th>
            <th scope="col">Çarşamba</th>
            <th scope="col">Perşembe</th>
            <th scope="col">Cuma</th>
            <th scope="col">Cumartesi</th>
            <th scope="col">Pazar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $hareket_cek = $conn->prepare("SELECT * FROM spor_programlari_hareketler ORDER BY program_id DESC LIMIT 1");
        $hareket_cek->execute();
        $hareket = $hareket_cek->fetch(PDO::FETCH_ASSOC);

        if ($hareket) {
            ?>
            <tr>
                <td><?= $hareket['pazartesi']; ?></td>
                <td><?= $hareket['sali']; ?></td>
                <td><?= $hareket['carsamba']; ?></td>
                <td><?= $hareket['persembe']; ?></td>
                <td><?= $hareket['cuma']; ?></td>
                <td><?= $hareket['cumartesi']; ?></td>
                <td><?= $hareket['pazar']; ?></td>
            </tr>
            <?php
        } else {
            // Kayıt bulunamadı, hata mesajı gösterilebilir
            ?>
            <tr>
                <td colspan="7">Kayıt bulunamadı.</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
        </main>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</body>

</html>