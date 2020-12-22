<?php 
ob_start();
session_start();
include 'baglan.php';


//Admin Giriş Kısmı
if (isset($_POST['admingiris'])) {

	$uye_mail=$_POST['uye_mail'];
	$uye_parola=md5($_POST['uye_parola']);

	$kullanicisor=$db->prepare("SELECT * FROM uyeler where uye_mail=:mail and uye_parola=:password");
	$kullanicisor->execute(array(
		'mail' => $uye_mail,
		'password' => $uye_parola
	));

	$say=$kullanicisor->rowCount();
	

	if ($say==1) {
		
		$_SESSION['uye_mail']=$uye_mail;
		header("Location:../index.php");
		exit;


	}else{ 
		header("Location:../giris.php?durum=no");
		exit;
	}


}

//Yeni Üye Ekle
if (isset($_POST['uyeekle'])) {

	$a=$_POST['uye_mail'];

	$kullanicisor=$db->prepare("SELECT * FROM uyeler where uye_mail=:uye_mail");
	$kullanicisor->execute(array(
		'uye_mail' => $a
	));

	$say=$kullanicisor->rowCount();
	

	if ($say==0) {
 //Yanı mail adresine sahip başka kullanıcı varmı kontrolu
		$kayit=$db->prepare("INSERT INTO uyeler SET
			uye_adsoyad=:uye_adsoyad,
			uye_yazar=:uye_yazar,
			uye_mail=:uye_mail,
			uye_parola=:uye_parola,
			uye_durum=:uye_durum


			");
		$insert=$kayit->execute(array(
			'uye_adsoyad' => $_POST['uye_adsoyad'],
			'uye_yazar' => $_POST['uye_yazar'],
			'uye_mail' => $_POST['uye_mail'],
			'uye_parola' => md5($_POST['uye_parola']),
			'uye_durum' => $_POST['uye_durum']


		));

		if ($insert) {

			Header("Location:../kullanicilar.php?durum=ok");

		} else {

			Header("Location:../yeni-kullanici.php?durum=no");
		}
	}
	else 
	{
		Header("Location:../yeni-kullanici.php?kayitli=no");
	}
	



}





//Üye silme
if (isset($_GET['uyesil'])) {

	
	$sil=$db->prepare("DELETE from uyeler where uye_id=:uye_id");
	$kontrol=$sil->execute(array(
		'uye_id' => $_GET['uye_id']
	));

	if ($kontrol) {

		Header("Location:../kullanicilar.php?durum=ok");

	} else {

		Header("Location:../kullanicilar.php?durum=no");
	}

}


//Uye Düzenle
if (isset($_POST['uyeduzenle'])) {

	$id=$_POST["uye_id"];

	if (!empty($_POST['uye_parola'])) {

		$ayarkaydet=$db->prepare("UPDATE uyeler SET
			uye_adsoyad=:uye_adsoyad,
			uye_yazar=:uye_yazar,
			uye_mail=:uye_mail,
			uye_parola=:uye_parola,
			uye_durum=:uye_durum

			WHERE uye_id=$id");

		$update=$ayarkaydet->execute(array(
			'uye_adsoyad' => $_POST['uye_adsoyad'],
			'uye_yazar' => $_POST['uye_yazar'],
			'uye_mail' => $_POST['uye_mail'],
			'uye_parola' => md5($_POST['uye_parola']),
			'uye_durum' => $_POST['uye_durum']
		));

	}else{

		$ayarkaydet=$db->prepare("UPDATE uyeler SET
			uye_adsoyad=:uye_adsoyad,
			uye_yazar=:uye_yazar,
			uye_mail=:uye_mail,
			uye_durum=:uye_durum

			WHERE uye_id=$id");

		$update=$ayarkaydet->execute(array(
			'uye_adsoyad' => $_POST['uye_adsoyad'],
			'uye_yazar' => $_POST['uye_yazar'],
			'uye_mail' => $_POST['uye_mail'],
			'uye_durum' => $_POST['uye_durum']
		));

	}
	
	

	if ($update) {header("Location:../uye-duzenle.php?durum=ok&uye_id=$id");} 
	else {header("Location:../uye-duzenle.php?durum=no");}

}

//Uye kendi Bilgileri Düzenle
if (isset($_POST['uyeduzenle2'])) {

	$id=$_POST["uye_id"];

	if (!empty($_POST['uye_parola'])) {

		$ayarkaydet=$db->prepare("UPDATE uyeler SET
			uye_adsoyad=:uye_adsoyad,
			uye_yazar=:uye_yazar,
			uye_mail=:uye_mail,
			uye_parola=:uye_parola
			

			WHERE uye_id=$id");

		$update=$ayarkaydet->execute(array(
			'uye_adsoyad' => $_POST['uye_adsoyad'],
			'uye_yazar' => $_POST['uye_yazar'],
			'uye_mail' => $_POST['uye_mail'],
			'uye_parola' => md5($_POST['uye_parola'])
			
		));

	}else{

		$ayarkaydet=$db->prepare("UPDATE uyeler SET
			uye_adsoyad=:uye_adsoyad,
			uye_yazar=:uye_yazar,
			uye_mail=:uye_mail
			

			WHERE uye_id=$id");

		$update=$ayarkaydet->execute(array(
			'uye_adsoyad' => $_POST['uye_adsoyad'],
			'uye_yazar' => $_POST['uye_yazar'],
			'uye_mail' => $_POST['uye_mail']
			
		));

	}
	
	

	if ($update) {header("Location:../bilgilerimi-duzenle.php?durum=ok&uye_id=$id");} 
	else {header("Location:../bilgilerimi-duzenle.php?durum=no");}

}




//Haber silme
if (isset($_GET['habersil'])) {

	
	$sil=$db->prepare("DELETE from haberler where haber_id=:haber_id");
	$kontrol=$sil->execute(array(
		'haber_id' => $_GET['haber_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_GET['eskiyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../haberler.php?durum=ok");

	} else {

		Header("Location:../haberler.php?durum=no");
	}

}


//yeni haber ekleme
if (isset($_POST['yenihaberekle'])) {


	$uploads_dir = '../../img/haberresim';
	@$tmp_name = $_FILES['haber_gorsel']["tmp_name"];
	@$name = $_FILES['haber_gorsel']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	



	$kaydet=$db->prepare("INSERT INTO haberler SET
		haber_yazar=:haber_yazar,
		haber_yazarid=:haber_yazarid,
		haber_kategori=:haber_kategori,
		haber_gorsel=:haber_gorsel,
		haber_ad=:haber_ad,
		haber_icerik=:haber_icerik,
		haber_durum=:haber_durum
		");
	$insert123=$kaydet->execute(array(
		'haber_yazar' => $_POST['haber_yazar'],
		'haber_yazarid' => $_POST['haber_yazarid'],
		'haber_kategori' => $_POST['haber_kategori'],
		'haber_gorsel' => $refimgyol,
		'haber_ad' => $_POST['haber_ad'],
		'haber_icerik' => $_POST['haber_icerik'],
		'haber_durum' => $_POST['haber_durum']
	));

	
	
	if ($insert123) {

		Header("Location:../haberler.php?durum=ok");

	} else {

		Header("Location:../yeni-haber.php?durum=no");
	}




}

//Haber Düzenle
if (isset($_POST['haberduzenle'])) {

	$id=$_POST["haber_id"];
	echo"içerde";


	

	if ($_FILES['haber_gorsel']["size"] > 0) {

		//echo "GÖRSEL VAR"; exit;

		$uploads_dir = '../../img/haberresim';
		@$tmp_name = $_FILES['haber_gorsel']["tmp_name"];
		@$name = $_FILES['haber_gorsel']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$ayarkaydet=$db->prepare("UPDATE haberler SET
			haber_yazar=:haber_yazar,
			haber_yazarid=:haber_yazarid,
			haber_kategori=:haber_kategori,
			haber_gorsel=:haber_gorsel,
			haber_ad=:haber_ad,
			haber_icerik=:haber_icerik,
			haber_durum=:haber_durum
			WHERE haber_id=$id");

		$update=$ayarkaydet->execute(array(
			'haber_yazar' => $_POST['haber_yazar'],
			'haber_yazarid' => $_POST['haber_yazarid'],
			'haber_kategori' => $_POST['haber_kategori'],
			'haber_gorsel' => $refimgyol,
			'haber_ad' => $_POST['haber_ad'],
			'haber_icerik' => $_POST['haber_icerik'],
			'haber_durum' => $_POST['haber_durum']
		));

		$resimsilunlink=$_POST['eskiyol'];
		unlink("../../$resimsilunlink"); 

	}else{
		//echo "GÖRSEL YOK"; exit;
		$ayarkaydet=$db->prepare("UPDATE haberler SET
			haber_yazar=:haber_yazar,
			haber_yazarid=:haber_yazarid,
			haber_kategori=:haber_kategori,
			haber_ad=:haber_ad,
			haber_icerik=:haber_icerik,
			haber_durum=:haber_durum
			WHERE haber_id=$id");

		$update=$ayarkaydet->execute(array(
			'haber_yazar' => $_POST['haber_yazar'],
			'haber_yazarid' => $_POST['haber_yazarid'],
			'haber_kategori' => $_POST['haber_kategori'],
			'haber_ad' => $_POST['haber_ad'],
			'haber_icerik' => $_POST['haber_icerik'],
			'haber_durum' => $_POST['haber_durum']
		));

	}
	
	

	if ($update) {header("Location:../haber-duzenle.php?durum=ok&haber_id=$id");} 
	else {header("Location:../haber-duzenle.php?durum=no");}

}


//Kategori Düzenle
if (isset($_POST['kategoriduzenle'])) {

	$id=$_POST["kategori_id"];


	$ayarkaydet=$db->prepare("UPDATE haber_kategori SET
		kategori_ad=:kategori_ad,
		kategori_detay=:kategori_detay
		WHERE kategori_id=$id");

	$update=$ayarkaydet->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_detay' => $_POST['kategori_detay']		
	));

	
	
	

	if ($update) {header("Location:../kategori-duzenle.php?durum=ok&kategori_id=$id");} 
	else {header("Location:../kategori-duzenle.php?durum=no");}

}


//Kategori silme
if (isset($_GET['kategorisil'])) {

	
	$sil=$db->prepare("DELETE from haber_kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
	));

	if ($kontrol) {

		Header("Location:../kategoriler.php?durum=ok");

	} else {

		Header("Location:../kategoriler.php?durum=no");
	}

}


//yeni kategori ekleme
if (isset($_POST['yenikategoriekle'])) {



	$kaydet=$db->prepare("INSERT INTO haber_kategori SET
		kategori_ad=:kategori_ad,
		kategori_detay=:kategori_detay
		
		");
	$insert123=$kaydet->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_detay' => $_POST['kategori_detay']
		
	));

	
	
	if ($insert123) {

		Header("Location:../kategoriler.php?durum=ok");

	} else {

		Header("Location:../yeni-kategori.php?durum=no");
	}




}

//Begeni
if (isset($_GET['begeniid'])) {

	$id=$_GET["begeniid"];
	

	$habersor=$db->prepare("SELECT * FROM haberler where haber_id=:haber_id");
	$habersor->execute(array(
		'haber_id' => $id
	));
	$habercek=$habersor->fetch(PDO::FETCH_ASSOC);

	$beg = $habercek["haber_begenme"] + 1;
	

	$ayarkaydet=$db->prepare("UPDATE haberler SET
		haber_begenme=:haber_begenme
		

		WHERE haber_id=$id");

	$update=$ayarkaydet->execute(array(
		'haber_begenme' => $beg

	));

	
	

	if ($update) {header("Location:../../detay.php?haber_id=".$id);} 
	else {header("Location:../../detay.php?haber_id=".$id);}

}



//Tasarim Duzenle
if (isset($_POST['tasarimduzenle'])) {

	$id=1;

	

	$ayarkaydet=$db->prepare("UPDATE gorunum SET
		sag_menu=:sag_menu,
		sag_reklam=:sag_reklam,
		sag_sosyalmedya=:sag_sosyalmedya,
		sag_kategori=:sag_kategori,
		sol_menu=:sol_menu,
		sol_reklam=:sol_reklam,
		slider=:slider

		WHERE gorunum_id=$id");

	$update=$ayarkaydet->execute(array(
		'sag_menu' => $_POST['sag_menu'],
		'sag_reklam' => $_POST['sag_reklam'],
		'sag_sosyalmedya' => $_POST['sag_sosyalmedya'],
		'sag_kategori' => $_POST['sag_kategori'],
		'sol_menu' => $_POST['sol_menu'],
		'sol_reklam' => $_POST['sol_reklam'],
		'slider' => $_POST['slider']
	));

	
	
	

	if ($update) {header("Location:../tasarim-duzenle.php?durum=ok");} 
	else {header("Location:../tasarim-duzenle.php?durum=no");}

}


//mesaj kaydet
if (isset($_POST['mesajgeldi'])) {



	$kaydet=$db->prepare("INSERT INTO iletisim SET
		iletisim_ad=:iletisim_ad,
		iletisim_mail=:iletisim_mail,
		iletisim_mesaj=:iletisim_mesaj
		
		");
	$insert123=$kaydet->execute(array(
		'iletisim_ad' => $_POST['iletisim_ad'],
		'iletisim_mail' => $_POST['iletisim_mail'],
		'iletisim_mesaj' => $_POST['iletisim_mesaj']
		
	));

	
	
	if ($insert123) {

		Header("Location:../../iletisim.php?durum=ok");

	} else {

		Header("Location:../../iletisim.php");
	}




}




//ayar kaydet
if (isset($_POST['ayarkaydet'])) {

	$id=1;


	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_siteadi=:ayar_siteadi,
		ayar_hakkimizda=:ayar_hakkimizda,
		ayar_ofis=:ayar_ofis,
		ayar_iletisimmail=:ayar_iletisimmail,
		ayar_telefon=:ayar_telefon,
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_youtube=:ayar_youtube,
		ayar_bilgilendirme=:ayar_bilgilendirme,
		ayar_stmthost=:ayar_stmthost,
		ayar_stmtusername=:ayar_stmtusername,
		ayar_stmtparola=:ayar_stmtparola
		WHERE ayar_id=$id");

	$update=$ayarkaydet->execute(array(
		'ayar_siteadi' => $_POST['ayar_siteadi'],
		'ayar_hakkimizda' => $_POST['ayar_hakkimizda'],
		'ayar_ofis' => $_POST['ayar_ofis'],
		'ayar_iletisimmail' => $_POST['ayar_iletisimmail'],
		'ayar_telefon' => $_POST['ayar_telefon'],
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_bilgilendirme' => $_POST['ayar_bilgilendirme'],
		'ayar_stmthost' => $_POST['ayar_stmthost'],
		'ayar_stmtusername' => $_POST['ayar_stmtusername'],
		'ayar_stmtparola' => $_POST['ayar_stmtparola']		
	));

	
	
	

	if ($update) {header("Location:../site-ayar.php?durum=ok");} 
	else {header("Location:../site-ayar.php?durum=no");}

}



//reklam kaydet
if (isset($_POST['reklamkaydet'])) {

	$id=1;
	

	if ($_FILES['reklam_resim']["size"] > 0) {

		//echo "GÖRSEL VAR"; exit;

		$uploads_dir = '../../img/reklam';
		@$tmp_name = $_FILES['reklam_resim']["tmp_name"];
		@$name = $_FILES['reklam_resim']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$ayarkaydet=$db->prepare("UPDATE reklam SET
			reklam_resim=:reklam_resim

			WHERE reklam_id=$id");

		$update=$ayarkaydet->execute(array(
			
			'reklam_resim' => $refimgyol

		));

		$resimsilunlink=$_POST['eskiyol'];
		unlink("../../$resimsilunlink"); 

	}
	
	

	if ($update) {header("Location:../reklam-ayari.php?durum=ok");} 
	else {header("Location:../reklam-ayari.php?durum=no");}

}

//slider ekleme
if (isset($_POST['yenisliderekle'])) {


	$uploads_dir = '../../img/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_metin=:slider_metin,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol,
		slider_durum=:slider_durum
		
		");
	$insert=$kaydet->execute(array(
		'slider_metin' => $_POST['slider_metin'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol,
		'slider_durum' => $_POST['slider_durum']
	));

	if ($insert) {

		Header("Location:../slider.php?durum=ok");

	} else {

		Header("Location:../slider.php?durum=no");
	}




}


// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../img/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_metin=:slider_metin,
			slider_link=:slider_link,
			slider_resimyol=:slider_resimyol,
			slider_durum=:slider_durum

			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'slider_metin' => $_POST['slider_metin'],
			'slider_link' => $_POST['slider_link'],
			'slider_resimyol' => $refimgyol,
			'slider_durum' => $_POST['slider_durum']
		));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['eskiyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../slider-duzenle.php?slider_id=$slider_id&durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_metin=:slider_metin,
			slider_link=:slider_link,
			slider_durum=:slider_durum

			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'slider_metin' => $_POST['slider_metin'],
			'slider_link' => $_POST['slider_link'],
			'slider_durum' => $_POST['slider_durum']
		));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../slider-duzenle.php?slider_id=$slider_id&durum=no");
		}
	}

}

//Slider Silme
if (isset($_GET['slidersil'])) {

	
	$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_GET['eskiyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../slider.php?durum=ok");

	} else {

		Header("Location:../slider.php?durum=no");
	}

}


//yeni video ekleme
if (isset($_POST['yenivideo'])) {



	$kaydet=$db->prepare("INSERT INTO video SET
		video_ad=:video_ad,
		video_key=:video_key,
		video_durum=:video_durum
		
		");
	$insert123=$kaydet->execute(array(
		'video_ad' => $_POST['video_ad'],
		'video_key' => $_POST['video_key'],
		'video_durum' => $_POST['video_durum']
		
	));

	
	
	if ($insert123) {

		Header("Location:../videolar.php?durum=ok");

	} else {

		Header("Location:../videolar.php?durum=no");
	}




}

//video duzenle
if (isset($_POST['videoduzenle'])) {

	
	
	$duzenle=$db->prepare("UPDATE video SET
		video_ad=:video_ad,
		video_key=:video_key,
		video_durum=:video_durum

		WHERE video_id={$_POST['video_id']}");
	$update=$duzenle->execute(array(
		'video_ad' => $_POST['video_ad'],
		'video_key' => $_POST['video_key'],
		'video_durum' => $_POST['video_durum']
	));


	$video_id=$_POST['video_id'];

	if ($update) {


		Header("Location:../video-duzenle.php?video_id=$video_id&durum=ok");

	} else {

		Header("Location:../video-duzenle.php?video_id=$video_id&durum=no");
	}


}


//Video Silme
if (isset($_GET['videosil'])) {

	
	$sil=$db->prepare("DELETE from video where video_id=:video_id");
	$kontrol=$sil->execute(array(
		'video_id' => $_GET['video_id']
	));

	if ($kontrol) {


		Header("Location:../videolar.php?durum=ok");

	} else {

		Header("Location:../videolar.php?durum=no");
	}

}


//Üye Ol Kısmı
if (isset($_POST['yeniuyekaydi'])) {

	$b=$_POST['uye_parola'];
	$c=$_POST['uye_parola2'];


	$a=$_POST['uye_mail'];
	$dogrulamaKodu8 = rand(0,10000).rand(0,10000);
	$ad=$_POST['uye_adsoyad'];


	$kullanicisor3=$db->prepare("SELECT * FROM uyeler where uye_mail=:uye_mail");
	$kullanicisor3->execute(array(
		'uye_mail' => $a
	));

	$say=$kullanicisor3->rowCount();
	
	if($b==$c){
		if ($say==0) {
 //Yanı mail adresine sahip başka kullanıcı varmı kontrolu
			$kayit=$db->prepare("INSERT INTO uyeler SET
				uye_adsoyad=:uye_adsoyad,
				uye_yazar=:uye_yazar,
				uye_mail=:uye_mail,
				uye_parola=:uye_parola,
				uye_durum=:uye_durum,
				dogrulamakodu=:dogrulamakodu


				");
			$insert=$kayit->execute(array(
				'uye_adsoyad' => $_POST['uye_adsoyad'],
				'uye_yazar' => $_POST['uye_yazar'],
				'uye_mail' => $_POST['uye_mail'],
				'uye_parola' => md5($_POST['uye_parola']),
				'uye_durum' => 0,
				'dogrulamakodu' => $dogrulamaKodu8


			));

			if ($insert) {

				/*Doğrulama maili baş*/
				//Mail gönderiyoruz
				include ('class.phpmailer.php');
				include ('class.smtp.php');

				$onayLink ="https://www.tahayasinkoksal.com.tr/php/uyelikonayi.php?mail=".$a."&dogrulamakodu=".$dogrulamaKodu8."";
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPDebug = 0;
				$mail->Host = 'server4.poyrazhosting.com';
				$mail->SMTPSecure = 'TLS'; //yada SSL
				$mail->Port = 587;  //SSL kullanacaksanız portu 465 olarak değiştiriniz
				$mail->Username = 'tyk@tahayasinkoksal.com.tr';
				$mail->Password = 'TAHAyasin995511';
				$mail->SetFrom($mail->Username, 'Üyelik Onayı');
				$mail->AddAddress($a, 'Alıcının Adı');
				$mail->CharSet = 'UTF-8';
				$mail->Subject = 'Üyeliğinizi Onaylayın';
				$mail->MsgHTML('Merhaba <b>'.$ad.'</b>, <br><br> Üyeliğinizi aktif etmek için onayınız gerekmetedir ==> <a href='.$onayLink.'>ONAYLA</a> <br><br><i>Bu isteği siz yapmadıysanız bu maili yok sayabilirsiniz.</i>');
				$mail->Send();
				/*Doğrulama maili son*/

				Header("Location:../kayit-ol.php?dogrulama=ok");

			} else {

				Header("Location:../kayit-ol.php?durum=no");
			}
		}
		else 
		{
			Header("Location:../kayit-ol.php?kayitli=no");
		}

	}else{
		Header("Location:../kayit-ol.php?parola=no");
	}


}



?>