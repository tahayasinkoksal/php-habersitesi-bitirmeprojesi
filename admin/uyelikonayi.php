<?php 
include 'netting/baglan.php';

$mail= $_GET["mail"];
$kod = $_GET["dogrulamakodu"];

$ayarkaydet=$db->prepare("UPDATE uyeler SET
	uye_durum=:uye_durum
	

	 WHERE uye_mail = '$mail' and dogrulamakodu = '$kod' ");

$update=$ayarkaydet->execute(array(
	'uye_durum' => 1
	
));

if ($update) {  
	echo "<h1>Tebrikler Hesabınız Onaylandı, Artık Giriş Yapabilirsiniz...</h1>";
}  
else
{
	echo "<h1>Bir şeyler yanlış gitti!</h1>";
}




?>
