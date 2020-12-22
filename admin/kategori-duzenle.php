<?php include"header.php"; 
sayfayetkikontrol();
?>
<h4 class="page-title pull-left">Kategori Düzenle</h4>

<?php include"uye-durum-kontrol.php"; 




$kategori_id = $_GET["kategori_id"];
//Kategori Detayı Çekmek İşlemleri
$kategorisor=$db->prepare("SELECT * FROM haber_kategori where kategori_id=:id");
$kategorisor->execute(array(
    'id' => $kategori_id
));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Kategori Düzenle</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Kategori Adı*</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $kategoricek["kategori_ad"]; ?>" name="kategori_ad" id="example-text-input">
                </div>

                <div class="form-group">
                    <input class="form-control" type="hidden" name="kategori_id" value="<?php echo $kategoricek["kategori_id"]; ?>" id="example-text-input">
                   
                </div>

             
                <br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>Kategori Detay*</b></label>
                    <textarea class="form-control" required="" name="kategori_detay" id="exampleFormControlTextarea1" rows="15"><?php echo $kategoricek["kategori_detay"]; ?></textarea>
                </div>

                

                
            </div>
            <button type="submit" name="kategoriduzenle" class="btn btn-warning btn-lg btn-block">Değişikliği Kaydet</button>
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