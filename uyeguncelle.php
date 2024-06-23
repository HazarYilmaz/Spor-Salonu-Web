<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Üye Bilgilerini Güncelle</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
           font-family: Arial, sans-serif;
        background-image: url(images/musteriarkaplan.jpg);
        background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    
        }

        form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
            margin-top: 20px;

            
      max-width: 400px;
      margin: 0 auto;
      
      background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="submit"] {
            margin-top: 20px;
        }

        label.label2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
    </style>
   
</head>
<body>
    <form method="POST" action="update_uye_info.php">
        <label class="label2">Üye Bilgilerini Güncelle:</label>
        <label class="label">TC Kimlik Numarası:</label>
        <select id="tcSelect" name="tc" required onchange="fillForm()">
            <option value="">-- Seçiniz --</option>
            <?php
                // Veritabanından TC kimlik numaralarını çekme ve seçenekleri oluşturma
                try {
                    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
                    $stmt = $db->query("SELECT tc FROM musteri_kayit");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['tc'] . "'>" . $row['tc'] . "</option>";
                    }
                } catch (PDOException $e) {
                    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
                }
            ?>
        </select>
        <label for="adi">Ad:</label>
        <input type="text" name="adi" required>

        <label for="soyadi">Soyad:</label>
        <input type="text" name="soyadi" required>
        
        <label for="tel">Telefon:</label>
        <input type="text" name="tel" required pattern="[0-9]*" maxlength="10">

        <label for="tarih">Tarih:</label>
        <input type="date" name="tarih" required>

        <label for="uyelik_turu">Üyelik Türü:</label>
        <select name="uyelik_turu" required>
        <option value="">Seçiniz</option>
        <option value="Standart">Standart</option>
          <option value="Premium">Premium</option>
        </select>

        <label for="durum">Durum:</label>
        <select name="durum" required>
          <option value="">Seçiniz</option>
          <option value="Aktif">Aktif</option>
          <option value="Pasif">Pasif</option>
        </select>

        <label for="sure">Süre:</label>
        <input type="text" name="sure" required>

        <label for="ucret">Ücret:</label>
        <input type="text" name="ucret" required pattern="[0-9]*">

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <br>
        <input type="submit" value="Güncelle">
    </form>
    
    <script>
        // get_uye_info.php sayfasından gelen verileri doldurmak için
        function fillForm() {
            var tcSelect = document.getElementById('tcSelect');
            var selectedTC = tcSelect.options[tcSelect.selectedIndex].value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    document.getElementsByName('adi')[0].value = data.adi;
                    document.getElementsByName('soyadi')[0].value = data.soyadi;
                    document.getElementsByName('tel')[0].value = data.tel;
                    document.getElementsByName('tarih')[0].value = data.tarih;
                    document.getElementsByName('uyelik_turu')[0].value = data.uyelik_turu;
                    document.getElementsByName('durum')[0].value = data.durum;
                    document.getElementsByName('sure')[0].value = data.sure;
                    document.getElementsByName('ucret')[0].value = data.ucret;
                    document.getElementsByName('email')[0].value = data.email;

                    
                }
            };
            xmlhttp.open("GET", "get_uye_info.php?tc=" + selectedTC, true);
            xmlhttp.send();
        }

        // Sayfa yüklendiğinde formu doldurmak için fillForm fonksiyonunu çağır
        window.onload = fillForm;
    </script>
</body>
</html>
