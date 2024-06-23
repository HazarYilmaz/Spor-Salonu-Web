<?php
if (isset($_POST['redirectBtn'])) {
  // Butona tıklanınca buraya gelir ve yönlendirme yapılır
  header("Location: anasayfa.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buton Yönlendirme</title>
</head>
<body>
  <!-- Butonu tıkladığında aynı sayfadaki PHP koduna yönlendirir -->
  <form method="post" action="">
    <button type="submit" name="redirectBtn">Butona Tıkla</button>
  </form>
</body>
</html>