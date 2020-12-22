<?php include 'header.php'; 

$habersor=$db->prepare("SELECT * FROM haberler where haber_id=:haber_id");
$habersor->execute(array(
    'haber_id' => $_GET['haber_id']
));
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);

$gor = $habercek["haber_goruntulenme"] + 1;


$habersr=$db->prepare("UPDATE haberler set haber_goruntulenme ='$gor' where haber_id=:haber_id");
$habersr->execute(array(
    'haber_id' => $_GET['haber_id']
));

?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/49.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?php echo $habercek["haber_ad"]; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="sonhaberler.php">Haberler</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $habercek["haber_ad"]; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Post Details Area Start ##### -->
<section class="post-details-area">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-xl-8">
                <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                    <div class="blog-thumb mb-30">
                        <img src="<?php echo $habercek["haber_gorsel"]; ?>" alt="">
                    </div>
                    <div class="blog-content">
                        <div class="post-meta">
                            <a href="#"><?php echo $habercek["haber_tarih"]; ?></a>
                            <a href="archive.html">

                                <?php $kategorisorhaber=$db->prepare("SELECT * FROM haber_kategori where kategori_id=:kategori_id");
                                $kategorisorhaber->execute(array(
                                    'kategori_id' => $habercek["haber_kategori"]
                                ));
                                $kategoricek=$kategorisorhaber->fetch(PDO::FETCH_ASSOC); ?>

                                <?php echo $kategoricek["kategori_ad"]; ?>



                            </a>
                        </div>
                        <h4 class="post-title"><?php echo $habercek["haber_ad"]; ?></h4>
                        <!-- Post Meta -->
                        <div class="post-meta-2">
                         <b> Görüntülenme sayısı</b>  
                         <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $habercek["haber_goruntulenme"]; ?></a>
                           <b>Begeni Sayısı</b> 
                           <a href="admin/netting/islem.php?begeniid=<?php echo $habercek["haber_id"]; ?>"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $habercek["haber_begenme"]; ?> (BEGENMEK İÇİN TIKLA)</a> 
                           <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a> -->
                        </div>

                        <p><?php echo $habercek["haber_icerik"]; ?></p>

                        <!-- Like Dislike Share -->
                        <div class="like-dislike-share my-5">
                            <h4 class="share">240<span>Share</span></h4>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a>
                        </div>

                        <!-- Post Author -->
                        <div class="post-author d-flex align-items-center">
                            <div class="post-author-thumb">
                                <img src="img/bg-img/52.jpg" alt="">
                            </div>
                            <div class="post-author-desc pl-4">
                                <a href="#" class="author-name"><?php echo $habercek["haber_yazar"]; ?></a>
                                <p>Usta editör.</p>
                            </div>
                        </div>
                    </div>
                </div>

               <?php 
/*
 <!-- Related Post Area -->
                <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>Related Post</h5>
                    </div>

                    <div class="row">
                        <!-- Single Blog Post -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post style-4 mb-30">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/29.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">Dentists Are Smiling Over Painless Veneer</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Blog Post -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post style-4 mb-30">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/30.jpg" alt="">
                                    <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                                    <span class="video-duration">09:27</span>
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">Will The Democrats Be Able To Reverse</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Blog Post -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post style-4 mb-30">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/28.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">A Guide To Rocky Mountain Vacations</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

<!-- Comment Area Start -->
                <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>COMMENTS</h5>
                    </div>

                    <ol>
                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                                <!-- Comment Author -->
                                <div class="comment-author">
                                    <img src="img/bg-img/53.jpg" alt="author">
                                </div>
                                <!-- Comment Meta -->
                                <div class="comment-meta">
                                    <a href="#" class="comment-date">27 Aug 2019</a>
                                    <h6>Tomas Mandy</h6>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="like">like</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <ol class="children">
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="img/bg-img/54.jpg" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="comment-date">27 Aug 2019</a>
                                            <h6>Britney Millner</h6>
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="like">like</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>

                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                                <!-- Comment Author -->
                                <div class="comment-author">
                                    <img src="img/bg-img/55.jpg" alt="author">
                                </div>
                                <!-- Comment Meta -->
                                <div class="comment-meta">
                                    <a href="#" class="comment-date">27 Aug 2019</a>
                                    <h6>Simon Downey</h6>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="like">like</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>


                 <!-- Post A Comment Area -->
                <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>LEAVE A REPLY</h5>
                    </div>

                    <!-- Reply Form -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name*" required>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email*" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message*" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn mag-btn mt-30" type="submit">Submit Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
*/




                ?>

                

               
            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
              <?php include 'sagkisim.php'; ?>
          </div>
      </div>
  </div>
</section>
<!-- ##### Post Details Area End ##### -->

<?php include 'footer.php'; ?>