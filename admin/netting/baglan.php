<?php 

try {
	$db = new PDO("mysql:host=localhost;dbname=phpders;charset=utf8",'root','12345678');
	
} catch (PDOExpception $e) {
	echo $e->getMessage();
}

 ?>