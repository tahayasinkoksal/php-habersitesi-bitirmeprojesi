<?php

if(isset($_GET["hesaponayi"]))
{
session_start();
ob_start();
session_destroy();
header("Location:giris.php?dogrulama=ok");
ob_end_flush();
}
else{
session_start();
ob_start();
session_destroy();
header("Location:giris.php");
ob_end_flush();
}

?>