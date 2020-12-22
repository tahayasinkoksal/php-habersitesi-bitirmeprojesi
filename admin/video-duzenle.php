<?php include"header.php"; ?>
<h4 class="page-title pull-left">Video Düzenle</h4>

<?php include"uye-durum-kontrol.php"; 



$video_id = $_GET["video_id"];
//Haber Detayı Çekmek İşlemleri
$videosor=$db->prepare("SELECT * FROM video where video_id=:id");
$videosor->execute(array(
    'id' => $video_id
));
$videocek=$videosor->fetch(PDO::FETCH_ASSOC);

?>                 

<div class="main-content-inner">
    <div class="row">
      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">

              <?php include 'durumlar.php'; ?>

              <h4 class="header-title">Video Haber Düzenle</h4>

              <form enctype="multipart/form-data" method="POST" action="netting/islem.php">

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Video Ad*</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $videocek["video_ad"]; ?>" name="video_ad" id="example-text-input">
                </div>

                <div class="form-group">
                    <input class="form-control" type="hidden" name="video_id" value="<?php echo $videocek["video_id"]; ?>" id="example-text-input">
                   
                </div>

                 <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Kayıtlı Video</b></label><br>
                    <iframe width="500" height="200" src="https://www.youtube-nocookie.com/embed/<?php echo $videocek["video_key"]; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                  <div class="form-group">
                    <label for="example-text-input" class="col-form-label"><b>Video Key*</b></label>
                    <input class="form-control" type="text" required="" value="<?php echo $videocek["video_key"]; ?>" name="video_key" id="example-text-input">
                </div>

               



               

                <label class="col-form-label"><b>Video Durum*</b></label>
                <select name="video_durum" class="form-control">   
                    <option  value="1" <?php if($videocek["video_durum"] == "1") { echo 'selected=""'; } ?> >AKTİF</option>
                    <option value="0" <?php if($videocek["video_durum"] == "0") { echo 'selected=""'; } ?>>PASİF</option>
                </select>

                <br>
            </div>
            <button type="submit" name="videoduzenle" class="btn btn-warning btn-lg btn-block">Değişikliği Kaydet</button>
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