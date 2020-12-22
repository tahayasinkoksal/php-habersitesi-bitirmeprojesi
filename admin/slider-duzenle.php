<?php include"header.php"; ?>
<h4 class="page-title pull-left">Slider Düzenle</h4>

<?php include"uye-durum-kontrol.php"; 



$slider_id = $_GET["slider_id"];
//Haber Detayı Çekmek İşlemleri
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array(
    'id' => $slider_id
));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Slider Düzenle</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Slider Metin*</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $slidercek["slider_metin"]; ?>" name="slider_metin" id="example-text-input">
                </div>

                <div class="form-group">
                    <input class="form-control" type="hidden" name="slider_id" value="<?php echo $slidercek["slider_id"]; ?>" id="example-text-input">
                   
                     <input class="form-control" type="hidden" name="eskiyol" value="<?php echo $slidercek["slider_resimyol"]; ?>" id="example-text-input">
                </div>

               

                <label class="col-form-label"><b>Slider Resim*(Değiştirmek istemiyorsanız yeni bir dosya seçmeyin)</b></label><br>
                <img src="../<?php echo $slidercek["slider_resimyol"]; ?>" width="300"><br><br>
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" name="slider_resimyol" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label"  for="inputGroupFile01">Dosya seçin</label>
                    </div>
                </div>


               

                <label class="col-form-label"><b>Slider Durum*</b></label>
                <select name="slider_durum" class="form-control">   
                    <option  value="1" <?php if($slidercek["slider_durum"] == "1") { echo 'selected=""'; } ?> >AKTİF</option>
                    <option value="0" <?php if($slidercek["slider_durum"] == "0") { echo 'selected=""'; } ?>>PASİF</option>
                </select>

                <br>
            </div>
            <button type="submit" name="sliderduzenle" class="btn btn-warning btn-lg btn-block">Değişikliği Kaydet</button>
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