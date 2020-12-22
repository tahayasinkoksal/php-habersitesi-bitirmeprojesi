<?php include"header.php"; ?>

<?php if($gorunumcek["slider"]==1)  { ?>
    <?php include"slider.php"; ?>
<?php } ?>
<!-- ##### Mag Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
         <<<<<<<<<<<<<<<<<<<<< -->
         <?php if($gorunumcek["sol_menu"]==1)  
         { ?>
          <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">

           <?php include 'solkisim.php'; ?>
       </div>
       <?php }else { ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php } ?>




       <!-- Ana Paylaşımlar Başlangıç -->

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
             <<<<<<<<<<<<<<<<<<<<< -->
             <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">

                 <div class="">
                    <div class="section-heading">
                        <h5>SON HABERLER</h5>
                    </div>





                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                      <?php 

//sayfalama
                      $sayfada = 5; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                      $sorgu=$db->prepare("select * from haberler");
                      $sorgu->execute();
                      $toplam_icerik=$sorgu->rowCount();
                      $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                    // eğer sayfa girilmemişse 1 varsayalım.
                      $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                      if($sayfa < 1) $sayfa = 1; 
                        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                      if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                      $limit = ($sayfa - 1) * $sayfada;

                      $habersor=$db->prepare("SELECT * FROM haberler where haber_durum ='1' order by haber_id desc limit $limit,$sayfada  ");
                      $habersor->execute();



                      ?>
                      <?php while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!-- Single Catagory Post -->
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url(<?php echo $habercek["haber_gorsel"]; ?>);">
                                <a href="detay.php?haber_id=<?php echo $habercek["haber_id"]; ?>" class=""><i class=""></i></a>
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <a href="detay.php?haber_id=<?php echo $habercek["haber_id"]; ?>" class="post-title"><?php echo $habercek["haber_ad"]; ?></a>
                                <div class="post-meta">
                                    Paylaşım Tarihi:<a href=""><?php echo $habercek["haber_tarih"]; ?></a>
                                    
                                </div>
                                
                                <!-- Post Meta -->
                                <div class="post-meta-2">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $habercek["haber_goruntulenme"]; ?></a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $habercek["haber_begenme"]; ?></a>
                                    <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a> -->
                                </div>
                                <p><?php echo substr($habercek["haber_icerik"],0,60); ?>...</p>
                            </div>
                        </div>

                    <?php } ?>


                    <!-- Pagination -->
                    <div class="col-12 col-xl-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">

                                <?php if (1==$sayfa) { ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="?sayfa=<?php echo $sayfa-1; ?>" tabindex="-1" aria-disabled="true">Önceki</a>
                                    </li>
                                <?php  } else { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?sayfa=<?php echo $sayfa-1; ?>">Önceki</a>
                                    </li>

                                <?php } ?>




                                <?php $s=0;


                                while ($s < $toplam_sayfa) { $s++; 


                                    if ($toplam_sayfa<=6) { ?>

                                        <?php if ($s==$sayfa) { ?>
                                            <li class="page-item active"><a class="page-link" href="?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>
                                            <?php  ?>

                                        <?php } else { ?>

                                            <li class="page-item"><a class="page-link" href="?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>
                                        <?php } ?>
                                    <?php } ?>



                                <?php } ?>




                                <?php if ($toplam_sayfa==$sayfa) { ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="?sayfa=<?php echo $sayfa+1; ?>">Sonraki</a>
                                    </li>
                                <?php  } else { ?>

                                    <li class="page-item">
                                        <a class="page-link" href="?sayfa=<?php echo $sayfa+1; ?>">Sonraki</a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </nav>
                    </div>

                </div>







            </div>


            <!-- Trending Now Posts Area -->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>BU ARALAR EN ÇOK GÖRÜNTÜLENENLER</h5>
                </div>

                <div class="trending-post-slides owl-carousel">
                    <!-- Single Trending Post -->
                    <?php  $habersor=$db->prepare("SELECT * FROM haberler where haber_durum ='1' order by haber_goruntulenme desc limit 6");
                    $habersor->execute();



                    while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>



                        <div class="single-trending-post">
                            
                            <img src="<?php echo $habercek["haber_gorsel"]; ?>" width="50" height="6" alt="" >
                            <div class="post-content">
                                <a href="detay.php?haber_id=<?php echo $habercek["haber_id"]; ?>" class="post-cata">Yazılı Haber</a>
                                <a href="detay.php?haber_id=<?php echo $habercek["haber_id"]; ?>" class="post-title"><?php echo $habercek["haber_ad"]; ?></a>
                            </div>
                        </div>


                    <?php } ?>


                </div>
            </div>

            <!-- Feature Video Posts Area -->
            <?php include 'video-paylasim.php'; ?>




        </div>


        <!-- Ana Paylaşımlar son -->






        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
         <<<<<<<<<<<<<<<<<<<<< -->
         <?php if($gorunumcek["sag_menu"]==1)  {
             include 'sagkisim.php'; 
         } ?>
     </section>
     <!-- ##### Mag Posts Area End ##### -->

     <?php include 'footer.php'; ?>