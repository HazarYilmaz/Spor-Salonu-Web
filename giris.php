<?php
$admin_giris_zorunlu = 0;
?>
<?php
require_once __DIR__ . '/src/autoload.php';
?>


<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width-device-width, initial-scale-1.0" />
  <title>Giris</title>
  <link rel="stylesheet" href="../giris.css" />
</head>

<body>



  <div class="main">
    <div class="form-box">
      <div class="yazi">Üye Giriş</div>

      <div class="button-box">
        <div id="btn"></div>
        <button type="button" onclick="login()" class="toggle-btn"> Giriş Yap</button>
        <button type="button" onclick="lost()" class="toggle-btn"> Şifremi Unuttum</button>
      </div>



      <form id="Login" class="input-group" method="post" action="index1.php">

        <input type="text" class="input-field" name="txttc" placeholder="TC Kimliginizi Giriniz" required>

        <input type="password" class="input-field" name="txtsifre" placeholder="Şifrenizi Giriniz" required>

        <button type="submit" id="dalga" name="gonder" class="submit-btn">Giriş Yap</button>
        </a>

      </form>


      <form name="form" id="Lost" class="input-group" action="girisunuttum1.php" method="post">

        <input type="text" class="input-field" name="kayittc" placeholder="Tc Kimlik" required>

        <input type="email" class="input-field" name="kayitmail" placeholder="Email" required>

        <button type="submit" name="unuttum" class="submit-btn">Şifremi Unuttum</button>

      </form>

    </div>
  </div>
  <div class="solanime">
    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_qmrxbp0w.json" background="transparent" speed="1"
      loop autoplay></lottie-player>
  </div>
  --------------------
  <script>
    var x = document.getElementById("Login");
    var z = document.getElementById("Lost");
    var y = document.getElementById("btn");
    var reng = document.getElementById("dalga")

    function lost() {
      x.style.left = "500px";
      z.style.left = "0px";
      y.style.left = "200px";
      reng.style.color("white");
    }

    function login() {
      z.style.left = "600px";
      x.style.left = "0px";
      y.style.left = "0px";
    }
  </script>




  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>







</body>

</html>