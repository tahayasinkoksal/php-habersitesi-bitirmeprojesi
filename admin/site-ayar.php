<?php include"header.php"; 
sayfayetkikontrol();

?>
<h4 class="page-title pull-left">Site Ayarları</h4>

<?php include"uye-durum-kontrol.php"; 

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:ayar_id");
$ayarsor->execute(array(
    'ayar_id' => 1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
  <div class="row">
    <!-- Textual inputs start -->
    <div class="col-12 mt-5">
      <div class="card">
        <div class="card-body">

          <?php include 'durumlar.php'; ?>

          <h4 class="header-title">Site Ayarları</h4>

          <form  method="POST" action="netting/islem.php">

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Site Adı (Sayfa Başlığında Gösterilir)*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_siteadi"]; ?>" name="ayar_siteadi" id="example-text-input">
            </div>


            <br>
            <div class="form-group">
              <label for="exampleFormControlTextarea1"><b>Hakkımızda Metni*</b></label>
              <textarea class="form-control" required=""  name="ayar_hakkimizda" id="exampleFormControlTextarea1" rows="10"><?php echo $ayarcek["ayar_hakkimizda"]; ?></textarea>
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Ofis Adresi*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_ofis"]; ?>" name="ayar_ofis" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>İletisim Mail*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_iletisimmail"]; ?>" name="ayar_iletisimmail" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>İletism Telefon*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_telefon"]; ?>" name="ayar_telefon" id="example-text-input">
            </div>
            <hr><h6>Sosyal medya ayarları</h6><br>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Facebook*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_facebook"]; ?>" name="ayar_facebook" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Twitter*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_twitter"]; ?>" name="ayar_twitter" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Youtube*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_youtube"]; ?>" name="ayar_youtube" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Bilgilendirme Metni*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_bilgilendirme"]; ?>" name="ayar_bilgilendirme" id="example-text-input">
            </div>
            <hr><h6>Mail Ayarları</h6><br>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Mail Host*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_stmthost"]; ?>" name="ayar_stmthost" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Mail Username*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_stmtusername"]; ?>" name="ayar_stmtusername" id="example-text-input">
            </div>

            <div class="form-group">
              <label for="example-text-input" class="col-form-label"><b>Mail Parola*</b></label>
              <input class="form-control" type="text" required="" value="<?php echo $ayarcek["ayar_stmtparola"]; ?>" name="ayar_stmtparola" id="example-text-input">
            </div>


            <br>
          </div>
          <button type="submit" name="ayarkaydet" class="btn btn-warning btn-lg btn-block">Ayarları Kaydet</button>
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