<?php include 'header.php'; ?>





<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/41.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Son Haberler</h2>
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

                        <li class="breadcrumb-item active" aria-current="page">Son Haberler</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">




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

                      if(!empty($_GET["kategori"])) { 
                        $kat = $_GET["kategori"];
                        $habersor=$db->prepare("SELECT * FROM haberler where haber_durum ='1' and haber_kategori = '$kat' order by haber_id desc limit $limit,$sayfada  ");
                    }else{
                     $habersor=$db->prepare("SELECT * FROM haberler where haber_durum ='1' order by haber_id desc limit $limit,$sayfada  ");
                 }






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
                            <?php  if(isset($_GET["kategori"])) { $kati = $_GET["kategori"];  ?>


                            <?php if (1==$sayfa) { ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="?sayfa=<?php echo $sayfa-1; ?>&kategori=<?php echo $kati ?>" tabindex="-1" aria-disabled="true">Önceki</a>
                                </li>
                            <?php  } else { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?sayfa=<?php echo $sayfa-1; ?>&kategori=<?php echo $kati ?>">Önceki</a>
                                </li>

                            <?php } ?>




                            <?php $s=0;  





                            while ($s < $toplam_sayfa) { $s++; 


                                if ($toplam_sayfa<=6) { ?>

                                    <?php if ($s==$sayfa) { ?>
                                        <li class="page-item active"><a class="page-link" href="?sayfa=<?php echo $s; ?>&kategori=<?php echo $kati ?>"><?php echo $s; ?></a></li>
                                        <?php  ?>

                                    <?php } else { ?>

                                        <li class="page-item"><a class="page-link" href="?sayfa=<?php echo $s; ?>&kategori=<?php echo $kati ?>"><?php echo $s; ?></a></li>
                                    <?php } ?>
                                <?php } ?>



                            <?php } ?>




                            <?php if ($toplam_sayfa==$sayfa) { ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="?sayfa=<?php echo $sayfa+1; ?>&kategori=<?php echo $kati ?>">Sonraki</a>
                                </li>
                            <?php  } else { ?>

                                <li class="page-item">
                                    <a class="page-link" href="?sayfa=<?php echo $sayfa+1; ?>&kategori=<?php echo $kati ?>">Sonraki</a>
                                </li>

                            <?php } ?>












                            <!--Kategori yoksa -->
                        <?php }else { ?>

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
                    <?php } ?>


                </ul>
            </nav>
        </div>

    </div>






</div>

<?php include 'sagkisim.php'; ?>
</div>
</div>
</div>
<!-- ##### Archive Post Area End ##### -->

<?php include 'footer.php'; ?>