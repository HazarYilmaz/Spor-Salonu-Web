<?php
    // Veritabanı bağlantısı için PDO kullanımı
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

    function validateTC($tc) {
        // TC Kimlik numarasının 11 haneli olduğunu kontrol etme
        if (strlen($tc) != 11) {
            return false;
        }

        // İlk hane sıfır olamaz
        if ($tc[0] == '0') {
            return false;
        }

        // İlk 9 hane için rakam kontrolü
        for ($i = 0; $i < 9; $i++) {
            if (!is_numeric($tc[$i])) {
                return false;
            }
        }

        // Son iki hane için rakam kontrolü
        if (!is_numeric($tc[9]) || !is_numeric($tc[10])) {
            return false;
        }

        // TC Kimlik numarasının doğruluğunu kontrol etme
        $t1 = ($tc[0] + $tc[2] + $tc[4] + $tc[6] + $tc[8]) * 7;
        $t2 = ($tc[1] + $tc[3] + $tc[5] + $tc[7]);
        $t = $t1 - $t2;
        $t3 = $t % 10;
        if ($t3 != $tc[9]) {
            return false;
        }

        $t4 = 0;
        for ($i = 0; $i < 10; $i++) {
            $t4 += $tc[$i];
        }
        $t5 = $t4 % 10;
        if ($t5 != $tc[10]) {
            return false;
        }

        // TC Kimlik numarası geçerli
        return true;
    }

    if (isset($_POST["kaydet"])) {
        // Formdan gelen verileri alma
        $adi = $_POST['adi'];
        $soyadi = $_POST['soyadi'];
        $raw_sifre = $_POST['sifre'];
        $tc = $_POST['tc'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $tarih = $_POST['tarih'];
        $sure = $_POST['sure'];
        $uyelik_turu = $_POST['uyelik_turu'];
        $durum = $_POST['durum'];
        $ucret = $_POST['ucret'];

        // Şifreyi hashleme
        $sifre = password_hash($raw_sifre, PASSWORD_DEFAULT);

        // Kullanıcıdan gelen TC Kimlik numarasını alın
        $tc = $_POST['tc'];

        // TC Kimlik numarasını doğrulama işlemini gerçekleştir
        if (validateTC($tc)) {
            // Geçerli TC Kimlik numarası
            // İşlemlere devam edebilirsiniz

            // Veritabanında TC, e-posta veya telefon numarasıyla kayıtlı veri olup olmadığını kontrol etme
            $stmt = $db->prepare("SELECT * FROM musteri_kayit WHERE tc = :tc OR email = :email OR tel = :tel");
            $stmt->bindParam(':tc', $tc);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $tel);
            $stmt->execute();
            $existingData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($existingData) > 0) {
                // TC, e-posta veya telefon numarası veritabanında zaten kayıtlı
                $errorMessages = array();
                foreach ($existingData as $data) {
                    if ($data['tc'] == $tc) {
                        echo "<script>
                        if (confirm('Bu Tc Zaten Kayıtlı !')) {
                            window.location.href = 'musteriekle.html';
                        }
                        else
                        {
                            window.location.href = 'musteriekle.html';
                        }
    
                    </script>";
                    }
                    if ($data['email'] == $email) {
                         echo "<script>
                    if (confirm('Bu E posta adresi zaten kayıtlı !')) {
                        window.location.href = 'musteriekle.html';
                    }
                    else
                    {
                        window.location.href = 'musteriekle.html';
                    }

                </script>";
                    }
                    if ($data['tel'] == $tel) {
                        echo "<script>
                        if (confirm('Bu Telefon Numarası Zaten Kayıtlı !')) {
                            window.location.href = 'musteriekle.html';
                        }
                        else
                        {
                            window.location.href = 'musteriekle.html';
                        }
    
                    </script>";
                        
                    }
                }

                echo implode("<br>", $errorMessages);
            } else {
                // Veritabanına yeni kaydı ekleme
                try {
                    $stmt = $db->prepare("INSERT INTO musteri_kayit (adi, soyadi, sifre, tc, email, tel, tarih, sure, uyelik_turu, durum, ucret)
                                          VALUES (:adi, :soyadi, :sifre, :tc, :email, :tel, :tarih, :sure, :uyelik_turu, :durum, :ucret)");
                    $stmt->bindParam(':adi', $adi);
                    $stmt->bindParam(':soyadi', $soyadi);
                    $stmt->bindParam(':sifre', $sifre);
                    $stmt->bindParam(':tc', $tc);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':tel', $tel);
                    $stmt->bindParam(':tarih', $tarih);
                    $stmt->bindParam(':sure', $sure);
                    $stmt->bindParam(':uyelik_turu', $uyelik_turu);
                    $stmt->bindParam(':durum', $durum);
                    $stmt->bindParam(':ucret', $ucret);

                    $stmt->execute();
                    echo "<script>
                    if (confirm('Kayıt Başarılı')) {
                        window.location.href = 'anasayfa.php';
                    }
                    else
                    {
                        window.location.href = 'anasayfa.php';
                    }

                </script>";
                } catch (PDOException $e) {
                    echo "Hata: " . $e->getMessage();
                }
            }
        } else {
            // Geçersiz TC Kimlik numarası
            echo "<script>
                    if (confirm('Lütfen geçerli bir tc giriniz')) {
                        window.location.href = 'musteriekle.html';
                    }
                    else
                    {
                        window.location.href = 'musteriekle.html';
                    }

                </script>";
        }
    }

    // Veritabanı bağlantısını kapatma
    $db = null;
?>