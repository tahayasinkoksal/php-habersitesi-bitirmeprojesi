 <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
    <!-- Sidebar Widget -->

    <?php if($gorunumcek["sag_sosyalmedya"]==1)  { ?>
        <div class="single-sidebar-widget p-30">
            <!-- Social Followers Info -->
            <div class="social-followers-info">
                <!-- Facebook -->
                <a href="<?php echo $ayarcek["ayar_facebook"]; ?>" class="facebook-fans"><i class="fa fa-facebook"></i> 4,360 <span>Fans</span></a>
                <!-- Twitter -->
                <a href="<?php echo $ayarcek["ayar_twitter"]; ?>" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
                <!-- YouTube -->
                <a href="<?php echo $ayarcek["ayar_youtube"]; ?>" class="youtube-subscribers"><i class="fa fa-youtube"></i> 1250 <span>Subscribers</span></a>
                <!-- Google -->
                <a href="#" class="google-followers"><i class="fa fa-google-plus"></i> 4,230 <span>Followers</span></a>
            </div>
        </div>
    <?php } ?>
    <!-- Sidebar Widget -->

    <?php if($gorunumcek["sag_kategori"]==1)  { ?>
        <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Kategoriler</h5>
            </div>

            <!-- Catagory Widget -->
            <ul class="catagory-widgets">
                <?php 
  //Kategori VERİLER
                $habersor=$db->prepare("SELECT * FROM haber_kategori");
                $habersor->execute();
                ?>

                <?php while ($kategoricek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>

                    <li><a href="sonhaberler.php?kategori=<?php echo $kategoricek["kategori_id"] ?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $kategoricek["kategori_ad"]; ?></span> <span></span></a></li>
                <?php } ?>
            </ul>
        </div>

    <?php } ?>




    <?php if($gorunumcek["sag_reklam"]==1)  { ?>
        <!-- Sidebar Widget -->
        <p><b><center>Buraya reklam vermek için <a href="iletisim.php">iletişim</a> kısmından bize ulaş</center></b></p>
        <div class="single-sidebar-widget">
            <a href="#" class="add-img"><img src="<?php echo $reklamcek["reklam_resim"]; ?>" alt=""></a>
        </div>
    <?php } ?>






    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Bilgilendirme</h5>
        </div>

        <div class="newsletter-form">
            <p><?php echo $ayarcek["ayar_bilgilendirme"]; ?></p>
            
        </div>

    </div>
</div>