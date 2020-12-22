<?php include"header.php"; ?>
<h4 class="page-title pull-left">Yeni Video</h4>

<?php include"uye-durum-kontrol.php"; 



?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Yeni Video Haber Bilgileri</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Video Ad*</b></label>
                    <input class="form-control" type="text" required="" name="video_ad" id="example-text-input">
                </div>

             <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Youtube Video Key*</b></label>
                   <p>Video Key Nasıl Alınır?<br>
                    1)Youtube de eklenecek video açılır. <br>
                    2)Videonun url adresindeki "=" den sonraki kısım kopyalanır. <br>
                    3)Kopyalanan yer videonun keyi dir. <br><br>
                    ÖRN: https://www.youtube.com/watch?v=<b>KEY</b><br>
                   </p>

                    <input class="form-control" type="text" required="" name="video_key" id="example-text-input">
                </div>

   
                

                <label class="col-form-label"><b>Video Durum*</b></label>
                <select name="video_durum" class="form-control">   
                    <option selected="" value="1">AKTİF</option>
                    <option value="0">PASİF</option>
                </select>

                <br>
            </div>
            <button type="submit" name="yenivideo" class="btn btn-warning btn-lg btn-block">Yeni Video Haber Ekle</button>
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