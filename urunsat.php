<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ürün Satışı </title>
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
    <form method="POST" action="sat_urun_info.php">
        <label class="label2">Ürün Satışını Gerçekleştir:</label>
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
        <label for="satıs_miktar">Satılacak Miktar:</label>
        <input type="text" name="satıs_miktar" required inputmode="numeric" pattern="[0-9]+" title="Sadece sayısal değerler giriniz">
        
        
        <br>
        <input type="submit" value="Sat">
        
    </form>
   
        </body>
</html>