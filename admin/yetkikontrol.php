<?php 


function yetkikontrol()
{

	include("netting/baglan.php");
	ob_start();
	


	$kullanicisoryetki=$db->prepare("SELECT * FROM uyeler where uye_mail=:mail");
	$kullanicisoryetki->execute(array(
		'mail' => $_SESSION['uye_mail']
	));

	$uyeyetkicek=$kullanicisoryetki->fetch(PDO::FETCH_ASSOC);
	$yet= $uyeyetkicek["uye_durum"];
	if ($yet=="2") {
		//yönetici
		return true;
	}
	else if ($yet =="1") {
		//yazar
		return false;
	}
	else {
		return false;
	}
}

//sayfalara yetkisisz girişi önleme
function sayfayetkikontrol()
{
	include("netting/baglan.php");
	ob_start();
	


	$kullanicisoryetki=$db->prepare("SELECT * FROM uyeler where uye_mail=:mail");
	$kullanicisoryetki->execute(array(
		'mail' => $_SESSION['uye_mail']
	));

	$uyeyetkicek=$kullanicisoryetki->fetch(PDO::FETCH_ASSOC);
	$yet= $uyeyetkicek["uye_durum"];
	if ($yet=="2") {
		//yönetici
		return true;
	}
	else if ($yet =="1") {
		//yazar
		return header("Location:index.php?yetkisiz=no");
		exit();
	}
	else {
		return header("Location:index.php?yetkisiz=no");
		exit();
	}
}




?>