<?php include"header.php"; ?>
<h4 class="page-title pull-left">Haber Düzenle</h4>

<?php include"uye-durum-kontrol.php"; 

$kategorisor=$db->prepare("SELECT * FROM haber_kategori");
$kategorisor->execute();


$haber_id = $_GET["haber_id"];
//Haber Detayı Çekmek İşlemleri
$habersor=$db->prepare("SELECT * FROM haberler where haber_id=:id");
$habersor->execute(array(
    'id' => $haber_id
));
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Haber Düzenle</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Haber Adı*</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $habercek["haber_ad"]; ?>" name="haber_ad" id="example-text-input">
                </div>

                <div class="form-group">
                    <input class="form-control" type="hidden" name="haber_id" value="<?php echo $habercek["haber_id"]; ?>" id="example-text-input">
                    <input class="form-control" type="hidden" name="haber_yazarid" value="<?php echo $habercek["haber_yazarid"]; ?>" id="example-text-input">
                     <input class="form-control" type="hidden" name="eskiyol" value="<?php echo $habercek["haber_gorsel"]; ?>" id="example-text-input">
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Yazar*</b></label>
                    <input class="form-control" type="text"  disabled="" value="<?php echo $habercek["haber_yazar"]; ?>" id="example-text-input" >
                    <input class="form-control" type="text" hidden="" name="haber_yazar"  value="<?php echo $habercek["haber_yazar"]; ?>" id="example-text-input">
                </div>

                <label class="col-form-label"><b>Haber Görseli*(Değiştirmek istemiyorsanız yeni bir dosya seçmeyin)</b></label><br>
                <img src="../<?php echo $habercek["haber_gorsel"]; ?>" width="300"><br><br>
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" name="haber_gorsel" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label"  for="inputGroupFile01">Dosya seçin</label>
                    </div>
                </div>

                <label class="col-form-label"><b>Kategori Seçiniz*</b></label>
                <select name="haber_kategori" class="form-control">
                    <?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $kategoricek["kategori_id"]; ?>" <?php if($habercek["haber_kategori"] == $kategoricek["kategori_id"]) { echo 'selected=""'; } ?> 

                        ><?php echo $kategoricek["kategori_ad"]; ?></option>
                        
                    <?php } ?>
                </select>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>Haber İçeriği*</b></label>
                    <textarea class="form-control" required="" name="haber_icerik" id="exampleFormControlTextarea1" rows="15"><?php echo $habercek["haber_icerik"]; ?></textarea>
                </div>

                <label class="col-form-label"><b>Haber Durum*</b></label>
                <select name="haber_durum" class="form-control">   
                    <option  value="1" <?php if($habercek["haber_durum"] == "1") { echo 'selected=""'; } ?> >AKTİF</option>
                    <option value="0" <?php if($habercek["haber_durum"] == "0") { echo 'selected=""'; } ?>>PASİF</option>
                </select>

                <br>
            </div>
            <button type="submit" name="haberduzenle" class="btn btn-warning btn-lg btn-block">Değişikliği Kaydet</button>
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