<?php include"header.php"; 
sayfayetkikontrol();
?>
<h4 class="page-title pull-left">Yeni Kullanıcı</h4>

<?php include"uye-durum-kontrol.php"; ?>                 

<div class="main-content-inner">
    <div class="row">

      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Yeni Kullanıcı Bilgileri</h4>

             <?php include 'durumlar.php'; ?>

         <form method="POST" action="netting/islem.php">

            <div class="form-group">
                <label for="example-text-input" class="col-form-label"><b>Ad Soyad*</b></label>
                <input class="form-control" required="" name="uye_adsoyad" type="text" id="example-text-input">
            </div>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label"><b>Yazar Adı*</b></label>
                <input class="form-control" required="" name="uye_yazar" type="text" value="" id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label"><b>Mail*</b></label>
                <input class="form-control" required="" name="uye_mail" type="mail" value="" id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label"><b>Parola*</b></label>
                <input class="form-control" required="" name="uye_parola" type="password" value="" id="example-text-input">
            </div>

            <label class="col-form-label"><b>Rol/Durum*</b></label>
            <select name="uye_durum" required="" class="form-control">
                <option value="0">Banlı</option>
                <option value="1">Yazar</option>
                <option value="2" >Yönetici</option>
            </select>
            <br>
            <button type="submit" name="uyeekle" class="btn btn-warning btn-lg btn-block">Yeni Kullancı Ekle</button>
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