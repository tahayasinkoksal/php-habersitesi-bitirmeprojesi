<?php include"header.php"; ?>

<h4 class="page-title pull-left">Slider</h4>

<?php include"uye-durum-kontrol.php"; 



  //BÜTÜN VERİLER
    $slidersor=$db->prepare("SELECT * FROM slider ORDER BY slider_id DESC");
    $slidersor->execute();



?>  


<div class="main-content-inner">
    <div class="row">
     <!-- Dark table start -->
     <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <a href="yeni-slider.php"><button type="button" class="btn btn-success pull-right">YENİ EKLE</button></a><br>

                <?php include 'durumlar.php'; ?>
                
                <h4 class="header-title">Slider</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Metin</th>
                                <th>Url</th>
                                <th>Resim</th>
                                <th>Durum</th>
                                <th>Tarih</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>


                            <tr>
                                <td><?php echo $slidercek["slider_id"]; ?></td>
                                <td><?php echo $slidercek["slider_metin"]; ?></td>
                                <td><?php echo $slidercek["slider_link"]; ?></td>
                                <td><img src="../<?php echo $slidercek["slider_resimyol"]; ?>" width="150px"></td>

                                <td><?php if($slidercek["slider_durum"]=="1"){echo '<button type="button" class="btn btn-success">AKTİF</button>';}
                                else if($slidercek["slider_durum"]=="0"){echo '<button type="button" class="btn btn-danger">PASİF</button>';}
                                ?></td>

                                 <td><?php echo $slidercek["slider_tarih"]; ?></td>

                                <td><a href="slider-duzenle.php?slider_id=<?php echo $slidercek["slider_id"]; ?>"><div class="ti-pencil-alt"></div></a></td>
                                <td><a href="netting/islem.php?slider_id=<?php echo $slidercek["slider_id"]; ?>&slidersil=ok&&eskiyol=<?php echo $slidercek["slider_resimyol"]; ?>"><div class="ti-trash"></div></a></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Dark table end -->
</div>
</div>
</div>
<!-- main content area end -->


<!-- footer area start-->
<?php include"footer.php"; ?>