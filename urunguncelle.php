<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ürün Bilgilerini Güncelle</title>
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
<form method="POST" action="update_urun_info.php">
        <label class="label2">Ürün Bilgilerini Güncelle:</label>
        <label class="label">Ürün Adını Seçiniz:</label>
        <select id="adiSelect" name="adi" required onchange="fillForm()">
            <option value="">-- Seçiniz --</option>
            <?php
                // Veritabanından Adi çekme ve seçenekleri oluşturma
                try {
                    $db = new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8", "hazaryilmaz_hazar", "H.y32566941152");
                    $stmt = $db->query("SELECT adi FROM urun_kayit");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['adi'] . "'>" . $row['adi'] . "</option>";
                    }
                } catch (PDOException $e) {
                    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
                }
            ?>
        </select>

        <label for="Miktar">Miktar:</label>
        <input type="text" name="miktar" required inputmode="numeric" pattern="[0-9]+" title="Sadece sayısal değerler giriniz">
        
        <label for="alis_fiyat">Alış Fiyatı:</label>
        <input type="text" name="alis_fiyat" required inputmode="numeric" pattern="[0-9]+" title="Sadece sayısal değerler giriniz">

        <label for="satis_fiyat">Satış Fiyatı:</label>
        <input type="text" name="satis_fiyat" required inputmode="numeric" pattern="[0-9]+" title="Sadece sayısal değerler giriniz">

    
        

        <br>
        <input type="submit" value="Güncelle">
    </form>
    
    <script>
        // get_uye_info.php sayfasından gelen verileri doldurmak için
        function fillForm() {
            var adiSelect = document.getElementById('adiSelect');
            var selectedadi = adiSelect.options[adiSelect.selectedIndex].value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    document.getElementsByName('miktar')[0].value = data.miktar;
                    document.getElementsByName('alis_fiyat')[0].value = data.alis_fiyat;
                    document.getElementsByName('satis_fiyat')[0].value = data.satis_fiyat;
                    
                   
                   

                    
                }
            };
            xmlhttp.open("GET", "get_urun_info.php?adi=" + selectedadi, true);
            xmlhttp.send();
        }

        // Sayfa yüklendiğinde formu doldurmak için fillForm fonksiyonunu çağır
        window.onload = fillForm;
    </script>
</body>
</html>
