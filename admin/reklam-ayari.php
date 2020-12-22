<?php include"header.php"; ?>
<h4 class="page-title pull-left">Reklam Ayarı</h4>

<?php include"uye-durum-kontrol.php"; 

$reklamsor=$db->prepare("SELECT * FROM reklam where reklam_id=:reklam_id");
$reklamsor->execute(array(
    'reklam_id' => 1
));
$reklamcek=$reklamsor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Reklam Ayarları</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                  <input class="form-control" type="hidden" name="eskiyol" value="<?php echo $reklamcek["reklam_resim"]; ?>" id="example-text-input">


                  <label class="col-form-label"><b>Şu Anki Reklam*(Değiştirmek istemiyorsanız yeni bir dosya seçmeyin)</b></label><br>
                  <img src="../<?php echo $reklamcek["reklam_resim"]; ?>" width="300"><br><br>

                  <label class="col-form-label"><b>Reklam Resim*</b></label>
                  <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" name="reklam_resim" required="" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label"  for="inputGroupFile01">Dosya seçin</label>
                    </div>
                </div>



                <h6>Reklam Göstermek İstemiyorsanız Ayarlar altından tasarım düzenle menüsünü kullanabilirsiniz. <a href="tasarim-duzenle.php">Direkt Ulaşmak İçin Tıkla</a></h6>

            </div>
            <button type="submit" name="reklamkaydet" class="btn btn-warning btn-lg btn-block">Reklamı Kaydet</button>
        </form>



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