<?php include"header.php"; 
sayfayetkikontrol();

?>
<h4 class="page-title pull-left">Yeni Kategori</h4>

<?php include"uye-durum-kontrol.php"; 

$kategorisor=$db->prepare("SELECT * FROM haber_kategori");
$kategorisor->execute();

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Yeni Kategori Bilgileri</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Kategori Adı*</b></label>
                    <input class="form-control" type="text" required="" name="kategori_ad" id="example-text-input">
                </div>

           
                <br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>Kategori Detay*</b></label>
                    <textarea class="form-control" required="" name="kategori_detay" id="exampleFormControlTextarea1" rows="10"></textarea>
                </div>


                <br>
            </div>
            <button type="submit" name="yenikategoriekle" class="btn btn-warning btn-lg btn-block">Yeni Haberi Kaydet</button>
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