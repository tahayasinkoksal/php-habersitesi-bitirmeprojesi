   <?php if(!empty($_GET["kayitli"])) { ?>
    <div class="alert alert-dark" role="alert">
        Girdiğiniz mail adresiyle kayıtlı kullanıcı bulunmakta!
    </div>
<?php } else if(!empty($_GET["durum"]) && $_GET["durum"]=="no") { ?>
    <div class="alert alert-danger" role="alert">
       İşlem Başarısız!
   </div>
<?php } else if(!empty($_GET["durum"]) && $_GET["durum"]=="ok") { ?>
    <div class="alert alert-success" role="alert">
       İşlem Başarılı!
   </div>
<?php } else if(!empty($_GET["yetkisiz"]) && $_GET["yetkisiz"]=="no") { ?>
    <br><div class="alert alert-secondary" role="alert">
       Yetkisiz Erişim, Tekrarında Hesabınız <b>Banlanacaktır!</b> -- Detaylı Bilgi İçin Site Yönetimiyle Görüşünüz.
   </div>



<?php } else if(!empty($_GET["kayitli"]) && $_GET["kayitli"]=="no") { ?>
    <br><div class="alert alert-secondary" role="alert">
        Bu mail adresiyle daha önce kayıt olunmuş!
    </div>

<?php } else if(!empty($_GET["parola"]) && $_GET["parola"]=="no") { ?>
    <br><div class="alert alert-secondary" role="alert">
        Girdiğiniz parolalar eşleşmiyor.
    </div>
   
    <?php } else if(!empty($_GET["dogrulama"]) && $_GET["dogrulama"]=="ok") { ?>
    <br><div class="alert alert-secondary" role="alert">
        Üyeliğinizi aktif etmek için mail adresinize gönderdiğimiz mailden üyeliğinizi aktif edin.
    </div>
    <?php } ?>