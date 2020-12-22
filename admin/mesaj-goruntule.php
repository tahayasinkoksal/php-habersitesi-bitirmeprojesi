<?php include"header.php"; 
sayfayetkikontrol();
?>
<h4 class="page-title pull-left">Mesajlar</h4>

<?php include"uye-durum-kontrol.php"; 




$mesaj_id = $_GET["mesaj_id"];
//Kategori Detayı Çekmek İşlemleri
$mesajsor=$db->prepare("SELECT * FROM iletisim where iletisim_id=:id");
$mesajsor->execute(array(
    'id' => $mesaj_id
));
$mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Mesaj Görüntüle</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Gönderen Adı</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $mesajcek["iletisim_ad"]; ?>" name="kategori_ad" id="example-text-input">
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Gönderen Mail</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $mesajcek["iletisim_mail"]; ?>" name="kategori_ad" id="example-text-input">
                </div>

                

                   <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Gönderme Tarihi</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $mesajcek["iletisim_tarih"]; ?>" name="kategori_ad" id="example-text-input">
                </div>




                <br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>Gönderen Mesajı</b></label>
                    <textarea class="form-control" required="" name="kategori_detay" id="exampleFormControlTextarea1" rows="15"><?php echo $mesajcek["iletisim_mesaj"]; ?></textarea>
                </div>

                

                
            </div>
          
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