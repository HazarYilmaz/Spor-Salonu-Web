-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Şub 2024, 22:14:36
-- Sunucu sürümü: 10.6.16-MariaDB
-- PHP Sürümü: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hazaryilmaz_sporsalonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_kayit`
--

CREATE TABLE `admin_kayit` (
  `id` int(11) NOT NULL,
  `adi` text NOT NULL,
  `soyadi` varchar(255) NOT NULL,
  `tel` bigint(11) NOT NULL,
  `pozisyon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tc` bigint(11) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admin_kayit`
--

INSERT INTO `admin_kayit` (`id`, `adi`, `soyadi`, `tel`, `pozisyon`, `email`, `tc`, `sifre`, `code`) VALUES
(19, 'adem arda', 'akkaya', 5354761855, 'Temizlikçi', 'ardaakkaya77@gmail.com', 42082458744, '$2y$10$NRUrk3PooGbxqncOq6Rqtu1gOJYRnRZAHudg/goJSIrC3zoK5kZXm', ''),
(22, 'Hazar', 'Yılmaz', 5456180176, 'Müdür', 'iletisim.hazaryilmaz@gmail.com', 32566941152, '$2y$10$t7z/Xmpq0CUAK8F9NzFXA.5V.3J0gmU72MIRjvDX8i78FRG4ebOtW', ''),
(23, 'ahmet', 'orhan', 5427473585, 'kantinci', 'ahmet.orhan@ogr.gelisim.edu.tr', 11568109876, '$2y$10$aARLdgyceZkTwDWlBi1/FeCqEjWrpaC9FEK71VwpoKI4h2VFK9lPa', NULL),
(24, 'Çisem', 'Yaşar', 5346801412, 'başkan', 'cyasar@gelisim.edu.tr', 33100447192, '$2y$10$S7EGGUeffCwwLxWmDzXaceolvkFQADo/ZMmk5id4ickDJdXj9ID/6', ''),
(25, 'fgdg', 'jyt', 54654564655, 'hgfg', 'muhammedorhan.3472@gmail.com', 11165710710, '$2y$10$Vyx66yeiAriUexJDKiszV.IrgkXS/hKlRPbxtVLHZsUQDocdBwOyS', NULL),
(26, 'ali', 'aslan', 12312341242, 'personel', 'hazarylmazfabiane@hotmail.com', 11111111110, '$2y$10$qsFMlsBjyI7fbtb.ciGqJ.wZ4WZKi8tcQklGrluQPeQ.TulJFAnzG', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `beslenme_programlari`
--

CREATE TABLE `beslenme_programlari` (
  `id` int(11) NOT NULL,
  `beslenme_adi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `beslenme_programlari`
--

INSERT INTO `beslenme_programlari` (`id`, `beslenme_adi`) VALUES
(11, 'çorba'),
(10, 'bulk'),
(9, 'diyet'),
(12, 'sergi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `beslenme_programlari_besinler`
--

CREATE TABLE `beslenme_programlari_besinler` (
  `id` int(11) NOT NULL,
  `beslenme_id` text NOT NULL,
  `ogun_adi` text NOT NULL,
  `pazartesi` text NOT NULL,
  `sali` text NOT NULL,
  `carsamba` text NOT NULL,
  `persembe` text NOT NULL,
  `cuma` text NOT NULL,
  `cumartesi` text NOT NULL,
  `pazar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `beslenme_programlari_besinler`
--

INSERT INTO `beslenme_programlari_besinler` (`id`, `beslenme_id`, `ogun_adi`, `pazartesi`, `sali`, `carsamba`, `persembe`, `cuma`, `cumartesi`, `pazar`) VALUES
(25, '12', 'akşam', 'et', 'tavuk', '', '', '', '', ''),
(24, '12', 'öğle', 'pilav', 'patates', '', '', '', '', ''),
(23, '12', 'kahvaltı', 'yulaf', 'yumurtia', '', '', '', '', ''),
(22, '11', '', '', '', 'gujh', '', '', '', ''),
(21, '11', 'yyhygy', '', '', '', '', '', '', ''),
(19, '9', 'kahvaltı', 'su', 'süt', 'çay', '', '', '', ''),
(17, '9', 'akşam', '2 fındık', 'badem', 'yumurta', '', '', '', ''),
(18, '9', 'öğle', 'süt', 'su', 'ceviz', '', '', '', ''),
(20, '10', 'cok yemek', 'az yemek', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(11) NOT NULL,
  `adi` text NOT NULL,
  `duyuru` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `adi`, `duyuru`) VALUES
(3, 'Yıl Başı', 'Yıl Başında Açığız'),
(7, 'spor', 'pazartesi kapalıyız..');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri_kayit`
--

CREATE TABLE `musteri_kayit` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `soyadi` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `tc` bigint(11) NOT NULL,
  `email` text NOT NULL,
  `tel` bigint(11) NOT NULL,
  `tarih` date NOT NULL,
  `sure` varchar(100) NOT NULL,
  `uyelik_turu` varchar(255) NOT NULL,
  `durum` varchar(20) NOT NULL,
  `ucret` bigint(20) NOT NULL,
  `beslenme` int(11) DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `antrenor_id` int(11) DEFAULT NULL,
  `code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `musteri_kayit`
--

INSERT INTO `musteri_kayit` (`id`, `adi`, `soyadi`, `sifre`, `tc`, `email`, `tel`, `tarih`, `sure`, `uyelik_turu`, `durum`, `ucret`, `beslenme`, `program`, `antrenor_id`, `code`) VALUES
(2, 'Hazar', 'Yilmaz', '$2y$10$91NExfXQUpr1yct/w8Oh.Oo.fph.uYBXZT6BC71AhV5CQ3gQB1Xgi', 32566941153, 'hazarylmazfabiane@hotmail.com', 5456180176, '2023-05-01', '6 Ay', 'Standart', 'Pasif', 12000, NULL, NULL, NULL, ''),
(10, 'Eren', 'Kılınç', '$2y$10$NbWFYWAxJ6FFt28aI8JAn.TSTw7dml2GABsl9BP.cjUhR1lcd2Om2', 33151500402, 'klnceren89@gmail.com', 5079039853, '2003-11-16', '800 Ay', 'Premium', 'Aktif', 2500, NULL, NULL, NULL, ''),
(11, 'Emir ', 'Dünmez', '$2y$10$6JK1Xo/eZwwsZfWMdwUhH.fHb6nHYyGqi6VoVOd2WIuCtwKybF4IS', 12181273982, 'emirdunmez13@gmail.com', 5422380325, '2023-05-31', '12 ay', 'Premium', 'Aktif', 13000, NULL, NULL, NULL, NULL),
(16, 'Tolga', 'Karlı', '$2y$10$wubF0jKu66Pr1fezRb2E6.4t22gCcjENZfHbD2wXWW/fK.GyzDypy', 44392401670, 'tolgakarli00@gmail.com', 5355749945, '2023-06-02', '6 ay', 'Premium', 'Aktif', 30000, NULL, NULL, NULL, NULL),
(17, 'adem arda', 'akkaya', '$2y$10$72783m/qtvHzWTzFtfspbePXrVGuhNMCkJZUiMdDCXw/fDejTK1Qi', 42082458744, 'aarda287@gmail.com', 5354761855, '2023-06-03', '895', 'Premium', 'Aktif', 1700, NULL, NULL, NULL, NULL),
(19, 'Cisem', 'Yaşar', '$2y$10$yw6Qkrq.fh.XcmzKBu3yceZ/Y9M6dYbGW0Rwwk3xT80St0THBQHcC', 33100447192, 'cyasar@gelisim.edu.tr', 12345678910, '2023-06-21', '9ay', 'Premium', 'Aktif', 2500, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `olcum`
--

CREATE TABLE `olcum` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `boy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kilo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `bel_olcusu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `omuz_olcusu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kalca` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sag_bacak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sol_bacak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sag_kol` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sol_kol` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `gogus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `boyun` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `yag_orani` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `vucut_kitle_indeksi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `olcum`
--

INSERT INTO `olcum` (`id`, `kullanici_id`, `boy`, `kilo`, `bel_olcusu`, `omuz_olcusu`, `kalca`, `sag_bacak`, `sol_bacak`, `sag_kol`, `sol_kol`, `gogus`, `boyun`, `yag_orani`, `vucut_kitle_indeksi`) VALUES
(1, 2, '180', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11'),
(3, 10, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
(10, 16, '178', '84', '50', '70', '50', '60', '60', '40', '40', '100', '25', '20', '31'),
(8, 12, '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8'),
(9, 11, '178', '72', '70', '40', '70', '40', '40', '35', '35', '60', '15', '%20', '22.72'),
(11, 19, '200', '40', '65', '26', '625', '55', '41', '20', '10', '89', '465', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel_kayit`
--

CREATE TABLE `personel_kayit` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyadi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `pozisyon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `maas` bigint(20) NOT NULL,
  `tarih` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `personel_kayit`
--

INSERT INTO `personel_kayit` (`id`, `adi`, `soyadi`, `tel`, `pozisyon`, `email`, `tc`, `maas`, `tarih`, `sifre`, `code`) VALUES
(3, 'ahmet', 'Yılmaz', '05456180176', 'Hoca', 'iletisim.hazaryilmaz@gmail.com', '32566941152', 5000, '2002-08-01', '$2y$10$xM660TB4sc8DpdFwkv/j0efXrWzC.x9gJ8vERD8rQWAP4hIDKLtJ.', NULL),
(4, 'Emir ', 'Dünmez', '5422380325', 'Stajer ', 'emirdunmez@gmail.com', '12181273982', 8500, '2007-03-26', '$2y$10$tmY/t79JVJ9OiGjPBlWZc.yB87.S4ZBZN19yI2sKCnX96lUsMKeS.', NULL),
(6, 'Cagla', 'Kilic', '05333218486', 'blender', 'kiliccaglaa18@gmail.com', '37102286650', 5500, '2023-11-08', '$2y$10$1i2F8rTS4ZDVC24JruCuoOe3eYhnyExg5SLssssHdGOT5DkOfN3Hq', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `spor_programlari`
--

CREATE TABLE `spor_programlari` (
  `id` int(11) NOT NULL,
  `program_adi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `spor_programlari`
--

INSERT INTO `spor_programlari` (`id`, `program_adi`) VALUES
(14, 'sergi'),
(9, 'Full Body '),
(13, 'spilt'),
(12, 'Kol');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `spor_programlari_hareketler`
--

CREATE TABLE `spor_programlari_hareketler` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `pazartesi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sali` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `carsamba` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `persembe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `cuma` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `cumartesi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `pazar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `spor_programlari_hareketler`
--

INSERT INTO `spor_programlari_hareketler` (`id`, `program_id`, `pazartesi`, `sali`, `carsamba`, `persembe`, `cuma`, `cumartesi`, `pazar`) VALUES
(36, 14, 'kol', 'bacak', '', '', '', '', ''),
(34, 13, '6545', '', '', '', '', '', ''),
(35, 13, '', '645', '', '', '', '', ''),
(28, 12, 'Cable Biceps Curl', 'Biceps Curl Machine', 'Biceps Curl Machine', '', '', '', ''),
(39, 14, 'göğüs', 'sırt', '', '', '', '', ''),
(40, 14, 'sırt', '', '', '', '', '', ''),
(26, 12, 'Preacher Curl', 'Biceps Curl Machine', 'Biceps Curl Machine', '', '', '', ''),
(38, 14, 'alt bacak', 'göğüs', '', '', '', '', ''),
(37, 14, 'bacak', 'kol', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_kayit`
--

CREATE TABLE `urun_kayit` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `miktar` int(20) NOT NULL,
  `alis_fiyat` bigint(20) NOT NULL,
  `satis_fiyat` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urun_kayit`
--

INSERT INTO `urun_kayit` (`id`, `adi`, `miktar`, `alis_fiyat`, `satis_fiyat`) VALUES
(1, 'Su', 29, 2, 5),
(2, 'Soda', 50, 2, 5),
(3, 'Dimbal', 60, 150, 400),
(4, 'Koşu bandı', 10, 8000, 12000),
(5, 'Cola', 115, 10, 15),
(6, 'Enerji icecegi', 60, 15, 25),
(7, 'Ter bandı', 100, 10, 20),
(8, 'Fanta', 20, 8, 13);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_kayit`
--
ALTER TABLE `admin_kayit`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `beslenme_programlari`
--
ALTER TABLE `beslenme_programlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `beslenme_programlari_besinler`
--
ALTER TABLE `beslenme_programlari_besinler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteri_kayit`
--
ALTER TABLE `musteri_kayit`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `olcum`
--
ALTER TABLE `olcum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personel_kayit`
--
ALTER TABLE `personel_kayit`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `spor_programlari`
--
ALTER TABLE `spor_programlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `spor_programlari_hareketler`
--
ALTER TABLE `spor_programlari_hareketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_kayit`
--
ALTER TABLE `urun_kayit`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_kayit`
--
ALTER TABLE `admin_kayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `beslenme_programlari`
--
ALTER TABLE `beslenme_programlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `beslenme_programlari_besinler`
--
ALTER TABLE `beslenme_programlari_besinler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `musteri_kayit`
--
ALTER TABLE `musteri_kayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `olcum`
--
ALTER TABLE `olcum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `personel_kayit`
--
ALTER TABLE `personel_kayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `spor_programlari`
--
ALTER TABLE `spor_programlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `spor_programlari_hareketler`
--
ALTER TABLE `spor_programlari_hareketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `urun_kayit`
--
ALTER TABLE `urun_kayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
