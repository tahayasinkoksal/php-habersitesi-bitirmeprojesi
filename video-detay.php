<?php include 'header.php'; ?>
<?php 
$videosor=$db->prepare("SELECT * FROM video where video_id=:video_id");
$videosor->execute(array(
    'video_id' => $_GET['video_id']
));
$videocek=$videosor->fetch(PDO::FETCH_ASSOC);


 ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/49.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?php echo $videocek["video_ad"]; ?></h2>
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
                            <li class="breadcrumb-item"><a href="#">Video Haber</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $videocek["video_ad"]; ?></li>
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
            <div class="row">
                <div class="col-12">
                    <div class="single-video-area bg-white mb-30 box-shadow">
                        <iframe src="https://www.youtube.com/embed/<?php echo $videocek["video_key"]; ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <!-- Video Meta Data -->
                        <div class="video-meta-data d-flex align-items-center justify-content-between">
                            <h6 class="total-views">1034 Views</h6>
                            <div class="like-dislike d-flex align-items-center">
                                <button type="button"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834 Like</button>
                                <button type="button"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 34 Dislike</button>
                                <p><i class="fa fa-comments-o" aria-hidden="true"></i> 234 Comments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

  <?php include 'footer.php'; ?>