<?php include"header.php"; ?>
<h4 class="page-title pull-left">Tasarım Düzenle</h4>

<?php include"uye-durum-kontrol.php"; 


//Tasarım Detayı Çekmek İşlemleri
$tasarimsor=$db->prepare("SELECT * FROM gorunum where gorunum_id=:id");
$tasarimsor->execute(array(
    'id' => 1
));
$say=$tasarimsor->rowCount();
$tasarimcek=$tasarimsor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
             <?php include 'durumlar.php'; ?>
             <h4 class="header-title">Tasarım Düzenleme</h4>

             <form method="POST" action="netting/islem.php"><hr>
<br>
                <h6>Sağ Menü Ayarları</h6><br><br>

                <label class="col-form-label"><b>Sağ Menü Durumu*</b></label>
                <select name="sag_menu" class="form-control">
                    <option value="0" <?php if($tasarimcek["sag_menu"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["sag_menu"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>

                <label class="col-form-label"><b>Sağ Menü Reklam*</b></label>
                <select name="sag_reklam" class="form-control">
                    <option value="0" <?php if($tasarimcek["sag_reklam"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["sag_reklam"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>

                <label class="col-form-label"><b>Sağ Menü Sosyal Medya*</b></label>
                <select name="sag_sosyalmedya" class="form-control">
                    <option value="0" <?php if($tasarimcek["sag_sosyalmedya"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["sag_sosyalmedya"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>

                <label class="col-form-label"><b>Sağ Menü Kategori*</b></label>
                <select name="sag_kategori" class="form-control">
                    <option value="0" <?php if($tasarimcek["sag_kategori"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["sag_kategori"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>
                <hr>    <h6>Sol Menü Ayarları</h6><br><br>


                <label class="col-form-label"><b>Sol Menü Durumu*</b></label>
                <select name="sol_menu" class="form-control">
                    <option value="0" <?php if($tasarimcek["sol_menu"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["sol_menu"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>

                <label class="col-form-label"><b>Sol Menü Reklam*</b></label>
                <select name="sol_reklam" class="form-control">
                    <option value="0" <?php if($tasarimcek["sol_reklam"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["sol_reklam"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>

                <hr>    <h6>Slider Aktiflik Ayarları</h6><br><br>
                <label class="col-form-label"><b>Slider Durum*</b></label>
                <select name="slider" class="form-control">
                    <option value="0" <?php if($tasarimcek["slider"]=="0"){echo 'selected=""';} ?> >Pasif</option>
                    <option value="1" <?php if($tasarimcek["slider"]=="1"){echo 'selected=""';} ?> >Aktif</option>

                </select>
                <br>



                <button type="submit" name="tasarimduzenle" class="btn btn-warning btn-lg btn-block">Kaydet</button>
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