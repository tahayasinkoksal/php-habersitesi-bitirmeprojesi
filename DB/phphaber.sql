-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Haz 2020, 07:49:00
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phpders`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_siteadi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_hakkimizda` text COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ofis` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_iletisimmail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_telefon` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bilgilendirme` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_stmthost` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_stmtusername` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_stmtparola` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_siteadi`, `ayar_hakkimizda`, `ayar_ofis`, `ayar_iletisimmail`, `ayar_telefon`, `ayar_facebook`, `ayar_twitter`, `ayar_youtube`, `ayar_bilgilendirme`, `ayar_stmthost`, `ayar_stmtusername`, `ayar_stmtparola`) VALUES
(1, 'En İyi Haber Sitesi - Taha Yasin KÖKSAL', 'Global ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\nGlobal ve yerel haber yapan, güvenli bilgi almanın adresi. <b>KÖK HABER AJANSI</b><br>\r\n', 'Kervansaray Mahallesi 1974. sokak Köksal Apt', 'info@tahayasinkoksal.com.tr', '(+90)542 480 42 4*', 'https://tr-tr.facebook.com/', 'https://twitter.com/login?lang=tr', 'http://youtube.com/', 'Bu haber sitesi <b>Taha Yasin KÖKSAL</b> tarafından yapılmıştır.', 'server4.poyrazhosting.com', 'tyk@tahayasinkoksal.com.tr', 'TAHAyasin995511');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorunum`
--

CREATE TABLE `gorunum` (
  `gorunum_id` int(11) NOT NULL,
  `sag_menu` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `sag_reklam` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `sag_sosyalmedya` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `sag_kategori` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `sol_menu` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `sol_reklam` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `slider` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gorunum`
--

INSERT INTO `gorunum` (`gorunum_id`, `sag_menu`, `sag_reklam`, `sag_sosyalmedya`, `sag_kategori`, `sol_menu`, `sol_reklam`, `slider`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `haber_id` int(11) NOT NULL,
  `haber_yazar` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `haber_yazarid` int(11) NOT NULL,
  `haber_gorsel` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `haber_kategori` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `haber_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `haber_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `haber_durum` enum('1','0') COLLATE utf8_turkish_ci NOT NULL,
  `haber_goruntulenme` int(11) NOT NULL,
  `haber_begenme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`haber_id`, `haber_yazar`, `haber_yazarid`, `haber_gorsel`, `haber_kategori`, `haber_ad`, `haber_icerik`, `haber_tarih`, `haber_durum`, `haber_goruntulenme`, `haber_begenme`) VALUES
(10, 'Taha Bey', 1, 'img/haberresim/29165232122146130776ballon.jpg', '1', '123aa', 'asdasd', '2020-05-05 14:00:09', '1', 0, 0),
(14, 'Taha Bey', 1, 'img/haberresim/27206224912048626781digiqole-news-website-template.jpg', '1', 'Osman asdasd', 'asdasdasdaaaasd', '2020-05-05 14:19:58', '1', 0, 0),
(15, 'Taha Bey', 1, 'img/haberresim/2599624662266992524527265ben.png', '2', '123a', 'asdasdasdaaa', '2020-05-05 14:20:16', '0', 0, 0),
(21, 'Taha Bey', 1, 'img/haberresim/21936305272583922503kapak.png', '2', 'Son Haberim', 'Merhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın. Merhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.', '2020-05-06 11:01:05', '1', 2, 1),
(23, 'Taha Bey', 1, 'img/haberresim/212362010823434269432.PNG', '1', 'Osman asdasd', 'asdasdasdaaaasd', '2020-04-06 14:19:58', '1', 2, 0),
(24, 'Taha Bey', 1, 'img/haberresim/2599624662266992524527265ben.png', '2', '123a', 'asdasdasdaaa', '2020-04-13 14:20:16', '0', 0, 0),
(25, 'Taha Bey', 1, 'img/haberresim/2436027267244902690327265ben.png', '2', 'asdasasd', 'asdasdasdaaa', '2020-05-09 14:35:57', '0', 0, 0),
(27, 'Taha Bey', 1, 'img/haberresim/21936305272583922503kapak.png', '2', 'Son Haberim', 'Merhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın. Merhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.\r\nMerhaba bu haber çok iyi bir haberdir, bayılırım ben bu habere sizde bakın.', '2020-05-06 11:01:05', '1', 2, 0),
(28, 'Osman', 4, 'img/haberresim/29436316482199625004instagram.jpeg', '1', 'Instagram’ın Yeni Güncellemesi', 'Instagram, kullanıcılarının rahatlığını sağlamak ve uygulama içerisindeki erişimini arttırmak için yeni bir güncelleme çıkarmıştır. Instagram uygulaması içerisinde özel mesajlar kısmına girdiğinizde takip ettiğiniz kullanıcılardan hangilerinin anlık olarak aktif, hangilerinin pasif olduğunu görebilmenizi sağlayacak bir güncellemedir.\r\n\r\nKısa süre önce Instagram’a gelen güncelleme, Facebook Messenger’a benzerlik göstermektedir. Facebook Messenger’da olduğu gibi arkadaşlarınızın anlık olarak çevrimiçi ya da çevrimdışı olduklarını görebilirsiniz. Instagram’da anlık çevrimiçi olan kişilerin yanında yeşil bir nokta yer almaktadır. Instagram’ın son güncellemesiyle birlikte çevrimiçi olduğunuzu gösteren yeşil noktayı istediğiniz durumda kaldırabilirsiniz.', '2020-05-11 20:21:39', '1', 11, 4),
(29, 'Osman', 4, 'img/haberresim/30891265472386124903endusturi-690x405.jpg', '1', 'Yeni Dünya Düzeni – Endüstri 4.0', 'Endüstri 4.0 bu okunuşu şık söz sizlere, bizlere bir şeyler satmak için yaratılmış yeni bir akım değil.\r\n\r\nPeki, Endüstri 4.0 Nedir?\r\nÜretim ve tüketimin geleceğini şekillendirecek, ülkeler arasında zenginlik akışını farklılaştıracak önemli bir olgudur. Bir grup teknolojik gelişmenin üretimde stratejik kullanımıdır.\r\n\r\nYıllar sonra, şu an içinde yaşadığımız teknoloji dönemini ifade etmek için kullanılacak bir karakteristik olacak. Bu yönüyle sanayi devrimlerine benzetebilirsiniz.\r\n\r\nEndüstri 4.0’ın ortaya çıkmasının en büyük sebeplerinden biri, son yıllarda uzak doğu üretiminin “batı” üretimini geçmiş olmasıdır. Bu durumun oluşturduğu tehdittir.\r\n\r\nZaten “Endüstri 4.0” terimi de 2011-2012 yıllarında Almanya’nın bu tehditte karşı önümüzdeki 10-20 yılda üretimini nasıl şekillendireceğini anlatan bir yol haritası hazırlaması ile kullanılmaya başlamıştır.\r\n\r\nEndüstri 4.0 toplamda 3 iyileştirme alanına odaklanır:\r\n\r\nHız: Pazara Giriş Süresi’nin kısaltılması\r\nEsneklik: Aynı üretim hatlarının daha esnek/farklı/kişiselleştirilmiş ürünlerin üretimi için kullanılması\r\nVerimlilik: Daha az kas gücüne dayanarak, birim iş sonuçlarının arttırılması\r\nHangi teknolojilerden faydalanıyor:\r\n\r\nSiber Fiziksel Sistemler (Cyber Physical Systems). Süreçlerin gerçekleşmeden simule edilmesi ve sorunların çözülmesine kadar uzanan yöntemler.\r\nYatay ve Dikey Entegrasyon (Vertical & Horizontal Integration). Amaçsız ve tekrarlı insan gücünün kullanımını, hem beyaz yakalı hem de mavi yakalı için ortadan kaldıracak sistemler. Kullanılan donanım ve yazılımların gerçek zamanlı konuşması, alarm vermesi ve raporlaması. Ve hatta gereksiz ise bilgiyi insana ulaştırmadan sadece saklaması.\r\nAkıllı Robotlar (autonomous robots – co-robots, collaborative robots)\r\nNesnelerin İnterneti (IoT, Internet of Things) Biz de internete bağlı nesneler geliştiren ve üreten bir şirket olarak, bu konuda çok yazdık çizdik.\r\nBüyük Veri ve Analitik (Big Data & Analytics)\r\nBulut Bilişim (Cloud Computing)\r\nArttırılmış Gerçeklik ve Sanal Gerçeklik (Augmented Reality & Virtual Reality)\r\nEklemeli Üretim(Additive Manufacturing): Üretimde 3 boyutlu yazıcıların kullanılması\r\nSiber Güvenlik (Cyber Security): Her şey bu denli bağlı olunca siber güvenlik eskisinden çok daha önemli bir boyut kazanıyor.', '2020-05-11 20:31:28', '1', 18, 0),
(30, 'Yazar Mehmet Bey', 16, 'img/haberresim/287362872129089253117D239085-A9C9-4099-9B32-52C0FC1B5E80.jpeg', '1', 'Sunucu Dersini Yapıyorum', 'asdasd', '2020-05-13 10:58:15', '1', 40, 9),
(31, 'Faruk', 17, 'img/haberresim/25969315032130525519Android-BTK.png', '2', 'Kırşehir\'in millet vekili sayısı arttı !', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.\r\n\r\nNeden Kullanırız?\r\nYinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir.\r\n\r\n', '2020-06-04 14:19:10', '1', 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber_kategori`
--

CREATE TABLE `haber_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_detay` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haber_kategori`
--

INSERT INTO `haber_kategori` (`kategori_id`, `kategori_ad`, `kategori_detay`) VALUES
(1, 'Teknoloji', 'Teknoloji haberi kategorisi'),
(2, 'Yerel', 'Yerel haberi kategorisi'),
(5, 'Global', 'En öneli global haberler bu kategoride listelenir ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `iletisim_id` int(11) NOT NULL,
  `iletisim_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_mail` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`iletisim_id`, `iletisim_ad`, `iletisim_mail`, `iletisim_mesaj`, `iletisim_tarih`) VALUES
(1, 'Taha Köksal', 'deneme@mail.com', 'Merhaba ben taha yım', '2020-06-01 12:11:39'),
(2, 'Osman Eroğlu', 'dssdf@dfg.com', 'Reklam vermek istiyorum', '2020-06-04 14:14:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reklam`
--

CREATE TABLE `reklam` (
  `reklam_id` int(11) NOT NULL,
  `reklam_resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `reklam`
--

INSERT INTO `reklam` (`reklam_id`, `reklam_resim`) VALUES
(1, 'img/reklam/30304238572789729179reklam.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_metin` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_durum` enum('1','0') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `slider_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_metin`, `slider_link`, `slider_resimyol`, `slider_durum`, `slider_tarih`) VALUES
(2, 'Deneme Metin123', '', 'img/slider/297403042025136300726.png', '1', '2020-06-04 15:17:36'),
(4, 'TUĞÇE KANDEMIR-KURBAN OLDUĞUM (VİDEO HABER)', 'video-detay.php?video_id=1', 'img/slider/23647292422491221521Android-BTK.png', '1', '2020-06-04 16:55:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_kullaniciadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_parola` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `uye_yazar` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `uye_mail` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `uye_durum` enum('2','1','0') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dogrulamakodu` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adsoyad`, `uye_kullaniciadi`, `uye_parola`, `uye_yazar`, `uye_mail`, `uye_durum`, `uye_tarih`, `dogrulamakodu`) VALUES
(1, 'Taha Yasin Köksal', 'taha', '827ccb0eea8a706c4c34a16891f84e7b', 'Taha Bey', 'a@a.com', '2', '2020-05-12 23:10:12', ''),
(4, 'Osman Bey', 'osman123', '6f2268bd1d3d3ebaabb04d6b5d099425', 'Osman', 'osman@mail.com', '1', '2020-04-01 20:16:05', ''),
(5, 'Ali', 'ali', '123456', 'ali', 'ali@mail.com', '0', '2020-05-04 20:16:05', ''),
(9, 'Yusuf Alev', '', 'e10adc3949ba59abbe56e057f20f883e', 'Yusuf', 'yusuf@yusuf.com', '1', '2020-05-04 18:37:18', ''),
(11, 'Beyza Köksal', '', '202cb962ac59075b964b07152d234b70', 'Beyza Hanım', 'beyza@beyza.com', '1', '2020-05-05 11:33:13', ''),
(15, 'Ahmet', '', '827ccb0eea8a706c4c34a16891f84e7b', 'ahmett', 'asdas@.com', '1', '2020-04-03 14:39:52', ''),
(16, 'Mehmet', '', '202cb962ac59075b964b07152d234b70', 'Yazar Mehmet Bey', 'yazar@yazar.com', '1', '2020-04-02 16:25:21', ''),
(17, 'Faruk Köksal', '', '536a76f94cf7535158f66cfbd4b113b6', 'Faruk', 'faruk@mail.com', '1', '2020-06-04 14:16:02', ''),
(20, 'Yardim', '', '202cb962ac59075b964b07152d234b70', 'yardim', 'yardim.koksalyazilim@gmail.com', '1', '2020-06-06 07:20:16', '56572811');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `video_key` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `video_durum` enum('1','0') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `video_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`video_id`, `video_ad`, `video_key`, `video_durum`, `video_tarih`) VALUES
(1, 'Tuğçe Kandemir-Kurban Olduğum', 'QW9nTO47ncU', '1', '2020-06-04 15:42:58'),
(7, 'Bahadır Sağlam - Kır Papatyası', 'isC24rUtO5U', '1', '2020-06-04 16:04:30'),
(8, 'Ufuk Beydemir - Ay Tenli Kadın', 'HirFutbbIWg', '1', '2020-06-04 16:47:58'),
(9, 'Gripin - Durma Yağmur Durma (Official Video)', 'DRFpbOhfBr4', '1', '2020-06-04 16:48:26'),
(10, 'Neşet Ertaş-Cahildim Dünyanın Rengine Kandım', 'J5eLFREBpIA', '1', '2020-06-04 16:50:01'),
(11, 'Müslüm Gürses - Sigara', 'TXtgqM73nYA', '0', '2020-06-04 16:55:59');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `gorunum`
--
ALTER TABLE `gorunum`
  ADD PRIMARY KEY (`gorunum_id`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`haber_id`);

--
-- Tablo için indeksler `haber_kategori`
--
ALTER TABLE `haber_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`iletisim_id`);

--
-- Tablo için indeksler `reklam`
--
ALTER TABLE `reklam`
  ADD PRIMARY KEY (`reklam_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gorunum`
--
ALTER TABLE `gorunum`
  MODIFY `gorunum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `haber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `haber_kategori`
--
ALTER TABLE `haber_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `iletisim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `reklam`
--
ALTER TABLE `reklam`
  MODIFY `reklam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
