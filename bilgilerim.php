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
                        <th scope="col">TC No.</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Telefon No.</th>
                        <th scope="col">Email</th>
                        <!--<th scope="col">Kan Grubu</th>
                        <th scope="col">Hastalık</th>
                        <th scope="col">Üyelik Süresi</th>
                        <th scope="col">Kalan Üyelik Süresi</th>-->
                        <th scope="col">Atanan Antrenör</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?= $_SESSION['giris_bilgileri']['tc']; ?>
                        </td>
                        <td>
                            <?= $_SESSION['giris_bilgileri']['adi']; ?>
                        </td>
                        <td>
                            <?= $_SESSION['giris_bilgileri']['tel']; ?>
                        </td>
                        <td>
                            <?= $_SESSION['giris_bilgileri']['email']; ?>
                        </td>
                        <!--<td>0 Rh+</td>
                        <td>N/A</td>
                        <td>365 gün</td>
                        <td><span id="timer">0</span> gün</td>-->
                        <?php
                        $antrenor_cek = $conn->prepare("SELECT * FROM admin_kayit WHERE id=?");
                        $antrenor_cek->execute([$_SESSION['giris_bilgileri']['antrenor_id']]);
                        $antrenor = $antrenor_cek->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <td>
                            Eren Kılınç
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>