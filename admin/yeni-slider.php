<?php include"header.php"; ?>
<h4 class="page-title pull-left">Yeni Slider</h4>

<?php include"uye-durum-kontrol.php"; 



?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Yeni Slider Bilgileri</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Slider Metin*</b></label>
                    <input class="form-control" type="text" required="" name="slider_metin" id="example-text-input">
                </div>

             <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Slider Url*</b></label>
                    <input class="form-control" type="text" required="" name="slider_link" id="example-text-input">
                </div>

               

                <label class="col-form-label"><b>Slider Resim*</b></label>
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" name="slider_resimyol" required="" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label"  for="inputGroupFile01">Dosya seçin</label>
                    </div>
                </div>

             
                

                <label class="col-form-label"><b>Slider Durum*</b></label>
                <select name="slider_durum" class="form-control">   
                    <option selected="" value="1">AKTİF</option>
                    <option value="0">PASİF</option>
                </select>

                <br>
            </div>
            <button type="submit" name="yenisliderekle" class="btn btn-warning btn-lg btn-block">Yeni Slider Ekle</button>
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