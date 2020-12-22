 <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>EN ÇOK BEĞENİLENLER</h5>
                </div>

                 <?php  $habersor=$db->prepare("SELECT * FROM haberler where haber_durum ='1' and haber_begenme > 0 order by haber_begenme desc limit 6");
                    $habersor->execute();



                    while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>

                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="<?php echo $habercek["haber_gorsel"]; ?>" alt="">
                    </div>
                    <div class="post-content">
                        <a href="detay.php?haber_id=<?php echo $habercek["haber_id"]; ?>" class="post-title"><?php echo $habercek["haber_ad"]; ?></a>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $habercek["haber_goruntulenme"]; ?></a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $habercek["haber_begenme"]; ?></a>
                           
                        </div>
                    </div>
                </div>

              <?php } ?>


              

              
            </div>


<?php if($gorunumcek["sol_reklam"]==1)  { ?>
            <!-- Sidebar Widget -->
             <p><b><center>Buraya reklam vermek için <a href="iletisim.php">iletişim</a> kısmından bize ulaş</center></b></p>
            <div class="single-sidebar-widget">

              <a href="#" class="add-img"><img src="<?php echo $reklamcek["reklam_resim"]; ?>" alt=""></a>
            </div>

<?php } ?>


            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
               

            </div>