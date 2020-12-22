<?php include"header.php"; ?>
<h4 class="page-title pull-left">Kullanıcı Düzenle</h4>

<?php include"uye-durum-kontrol.php"; 
$uye_id = $uyecek["uye_id"];

//Uye Detayı Çekmek İşlemleri
$kullanicisor=$db->prepare("SELECT * FROM uyeler where uye_id=:id");
$kullanicisor->execute(array(
    'id' => $uye_id
));
$say=$kullanicisor->rowCount();
$uyecek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
               <?php include 'durumlar.php'; ?>
               <h4 class="header-title">Kullanıcı Düzenleme</h4>

               <form method="POST" action="netting/islem.php">

                <div class="form-group">

                    <input class="form-control" name="uye_id" value="<?php echo $uyecek["uye_id"]; ?>" type="hidden" id="example-text-input">
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Ad Soyad*</b></label>
                    <input class="form-control" name="uye_adsoyad" value="<?php echo $uyecek["uye_adsoyad"]; ?>" type="text" id="example-text-input">
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Yazar Adı*</b></label>
                    <input class="form-control" name="uye_yazar" value="<?php echo $uyecek["uye_yazar"]; ?>" type="text" value="" id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Mail*</b></label>
                    <input class="form-control" name="uye_mail" value="<?php echo $uyecek["uye_mail"]; ?>" type="mail" value="" id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Parola (Değiştirmek istemiyorsanız boş bırakın)</b></label>
                    <input class="form-control" name="uye_parola" type="password"  id="example-text-input">
                </div>

                <button type="submit" name="uyeduzenle2" class="btn btn-warning btn-lg btn-block">Kaydet</button>
            </form>
        </div>




    </div>
</div>
</div>
<!-- Textual inputs end -->
</div>
</div>
</div>
<!-- main content area end -->


<!-- footer area start-->
<?php include"footer.php"; ?>