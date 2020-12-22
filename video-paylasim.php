   <div class="feature-video-posts mb-30">
    <!-- Section Title -->
    <div class="section-heading">
        <h5>ÖNE ÇIKAN VİDEOLAR</h5>
    </div>

    <div class="featured-video-posts">
        <div class="row">
            <div class="col-12 col-lg-7">
                <!-- Single Featured Post -->
                <?php 
  //BÜTÜN VERİLER
                $videosor=$db->prepare("SELECT * FROM video where video_durum = 1 ORDER BY video_id DESC limit 1");
                $videosor->execute(); ?>


                <?php while ($videocek=$videosor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="single-featured-post">
                        <!-- Thumbnail -->
                        <div class="post-thumbnail mb-50">

                            <iframe width="650" height="500" src="https://www.youtube-nocookie.com/embed/<?php echo $videocek["video_key"]; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <a href="video-detay.php?video_id=<?php echo $videocek["video_id"]; ?>" class="video-play"><i class="fa fa-play"></i></a>
                        </div>

                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#">Paylaşım Tarihi: <?php echo $videocek["video_tarih"]; ?></a>

                            </div>
                            <a href="video-detay.php?video_id=<?php echo $videocek["video_id"]; ?>" class="post-title"><?php echo $videocek["video_ad"]; ?></a>
                            
                        </div>
                        <!-- Post Share Area -->
                        <div class="post-share-area d-flex align-items-center justify-content-between">
                            <!-- Post Meta -->
                            <div class="post-meta pl-3">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                            <!-- Share Info -->
                            <div class="share-info">
                                <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                <!-- All Share Buttons -->
                                <div class="all-share-btn d-flex">
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>





            </div>

            <div class="col-12 col-lg-5">
                <!-- Featured Video Posts Slide -->
                <div class="featured-video-posts-slide owl-carousel">

                    <div class="single--slide">
                     <?php 
  //BÜTÜN VERİLER
                     $videosor2=$db->prepare("SELECT * FROM video where video_durum = 1 ORDER BY video_id DESC limit 1, 5");
                     $videosor2->execute(); ?>


                     <?php while ($videocek2=$videosor2->fetch(PDO::FETCH_ASSOC)) { ?>

                        <!-- Single Blog Post -->
                        <div class="single-blog-post d-flex style-3">
                            <div class="post-thumbnail">
                                 <iframe width="130"  src="https://www.youtube-nocookie.com/embed/<?php echo $videocek2["video_key"]; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>
                            <div class="post-content">
                                <br><a href="video-detay.php?video_id=<?php echo $videocek2["video_id"]; ?>" class="post-title"><?php echo $videocek2["video_ad"]; ?> </a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                </div>



            </div>
        </div>
    </div>
</div>
</div>