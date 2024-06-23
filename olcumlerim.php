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
        <main class="m-5 w-100">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Boy</th>
                        <th scope="col">Kilo</th>
                        <th scope="col">Bel Ölçüsü</th>
                        <th scope="col">Omuz Ölçüsü</th>
                        <th scope="col">Kalça</th>
                        <th scope="col">Sağ Bacak</th>
                        <th scope="col">Sol Bacak</th>
                        <th scope="col">Sağ Kol</th>
                        <th scope="col">Sol Kol</th>
                        <th scope="col">Göğüs</th>
                        <th scope="col">Boyun</th>
                        <th scope="col">Yağ Oranı</th>
                        <th scope="col">Vücut Kitle İndeksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $olcum_cek = $conn->prepare("SELECT * FROM olcum WHERE kullanici_id = ? ORDER BY id DESC");
                    $olcum_cek->execute([$_SESSION['giris_bilgileri']['id']]);
                    while ($olcum = $olcum_cek->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <?= $olcum['boy']; ?>
                            </td>
                            <td>
                                <?= $olcum['kilo']; ?>
                            </td>
                            <td>
                                <?= $olcum['bel_olcusu']; ?>
                            </td>
                            <td>
                                <?= $olcum['omuz_olcusu']; ?>
                            </td>
                            <td>
                                <?= $olcum['kalca']; ?>
                            </td>
                            <td>
                                <?= $olcum['sag_bacak']; ?>
                            </td>
                            <td>
                                <?= $olcum['sol_bacak']; ?>
                            </td>
                            <td>
                                <?= $olcum['sag_kol']; ?>
                            </td>
                            <td>
                                <?= $olcum['sol_kol']; ?>
                            </td>
                            <td>
                                <?= $olcum['gogus']; ?>
                            </td>
                            <td>
                                <?= $olcum['boyun']; ?>
                            </td>
                            <td>
                                <?= $olcum['yag_orani']; ?>
                            </td>
                            <td>
                                <?= $olcum['vucut_kitle_indeksi']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</body>

</html>