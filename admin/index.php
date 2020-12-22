<?php include"header.php"; ?>

<h4 class="page-title pull-left">Ana Sayfa</h4>

<?php include"uye-durum-kontrol.php"; 

//Uye verisi çekme
$uyesor2=$db->prepare("SELECT * FROM uyeler");
$uyesor2->execute();
$uyesayisi=$uyesor2->rowCount();

 //Haber VERİLERİ
$habersor2=$db->prepare("SELECT * FROM haberler order by haber_id desc limit 7");
$habersor2->execute();
$habersayisi=$habersor2->rowCount();

 //Son 7 Günlük Üye Olan Kullancı Sayısı
$sa=7; //Son kaç günlük veri
$uyesor3=$db->prepare("SELECT * FROM uyeler WHERE uye_tarih >= DATE_SUB( CURDATE() , INTERVAL '$sa' DAY )");
$uyesor3->execute();
$veri7gunkullanci=$uyesor3->rowCount();

 //Son 7 Günlük Paylaşılan Haber Sayısı
$habersor4=$db->prepare("SELECT * FROM haberler WHERE haber_tarih >= DATE_SUB( CURDATE() , INTERVAL '$sa' DAY )");
$habersor4->execute();
$veri7gunhaber=$habersor4->rowCount();

$habersor5=$db->prepare("SELECT * FROM haberler");
$habersor5->execute();
$habersayisi25=$habersor5->rowCount();
?>  



<div class="main-content-inner"> <?php include 'durumlar.php'; ?>
    <div class="row">

        <!-- seo fact area start -->
        <div class="col-lg-8">
            <div class="row">

                <div class="col-md-6 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-user"></i> Kayıtlı Kullancı</div>
                                <h2><?php echo $uyesayisi; ?></h2>
                            </div>
                            <canvas id="seolinechart1" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-pie-chart"></i> Paylaşılan Haber Sayısı</div>
                                <h2><?php echo $habersayisi25; ?></h2>
                            </div>
                            <canvas id="seolinechart2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="seo-fact sbg4">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon">Yeni Kullancılar (7 Gün)</div>
                                <canvas id="seolinechart3" height="<?php echo $veri7gunkullanci; ?>"></canvas><h2><?php echo $veri7gunkullanci; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="seo-fact sbg3">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon">   Paylaşılan Haberler (7 Gün)</div>
                                <canvas id="seolinechart4" height="<?php echo $veri7gunhaber; ?>"></canvas><h2><?php echo $veri7gunhaber; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (yetkikontrol()) { ?>
                   <div class="col-md-6 mt-3 mb-lg-0">
                    <div class="card">
                        <div class="seo-fact sbg3">
                            <a href="yeni-haber.php">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">  YENİ HABER EKLE</div>
                                    <canvas id="seolinechart4" height="1>"></canvas>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            <div class="col-md-6 mt-3 mb-lg-0">
                <div class="card">
                    <a href="yeni-kullanici.php">
                        <div class="seo-fact sbg4">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon">YENİ KULLANCI EKLE</div>
                                <canvas id="seolinechart4" height="1"></canvas>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
              <div class="col-md-6 mt-3 mb-lg-0">
                <div class="card">
                    <a href="tasarim-duzenle.php">
                        <div class="seo-fact sbg4">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon">SİTE TASARIMINI DÜZENLE</div>
                                <canvas id="seolinechart4" height="1"></canvas>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- seo fact area end -->




    <!-- timeline area start -->
    <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Son Paylaşılan Haberler</h4>
                <div class="timeline-area">

                  <?php while ($habercek55=$habersor2->fetch(PDO::FETCH_ASSOC)) { ?>



                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa ti-rocket"></i>
                        </div>
                        <div class="tm-title">
                            <h4><?php echo $habercek55["haber_ad"] ?> <br> (<?php echo $habercek55["haber_yazar"] ?>) tarafından paylaşıldı</h4>
                            <span class="time"><i class="ti-time"></i><?php echo $habercek55["haber_tarih"]; ?></span>
                        </div>
                        <p><?php echo substr($habercek55["haber_icerik"],0,60); ?>...
                        </p>
                    </div>

                <?php } ?>


            </div>
        </div>
    </div>
</div>
<!-- timeline area end -->


</div>
</div>
</div>
<!-- main content area end -->


<!-- footer area start-->
<?php include"footer.php"; ?>