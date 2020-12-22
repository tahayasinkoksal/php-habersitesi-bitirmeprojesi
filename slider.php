   <!-- ##### Hero Area Start ##### -->
   <div class="hero-area owl-carousel">

    <?php $slidersor=$db->prepare("SELECT * FROM slider where slider_durum ='1'");
    $slidersor->execute();



    while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>

        <!-- Single Blog Post -->
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(<?php echo $slidercek["slider_resimyol"]; ?>);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="<?php echo $slidercek["slider_link"]; ?>"><?php echo $slidercek["slider_tarih"]; ?></a>
                                
                            </div>
                            <a href="<?php echo $slidercek["slider_link"]; ?>" class="post-title" data-animation="fadeInUp" data-delay="300ms"><?php echo $slidercek["slider_metin"]; ?></a>
                            <a href="<?php echo $slidercek["slider_link"]; ?>" class="video-play" data-animation="bounceIn" data-delay="500ms"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    
</div>
    <!-- ##### Hero Area End ##### -->