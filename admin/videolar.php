<?php include"header.php"; ?>

<h4 class="page-title pull-left">Video Haberler</h4>

<?php include"uye-durum-kontrol.php"; 




  //BÜTÜN VERİLER
    $videosor=$db->prepare("SELECT * FROM video ORDER BY video_id DESC");
    $videosor->execute();




?>  


<div class="main-content-inner">
    <div class="row">
     <!-- Dark table start -->
     <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <a href="yeni-video.php"><button type="button" class="btn btn-success pull-right">YENİ EKLE</button></a><br>

                <?php include 'durumlar.php'; ?>
                
                <h4 class="header-title">Video Haberler</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Ad</th>
                                <th>Tarih</th>
                                <th>Video</th>
                                <th>Durum</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php while ($videocek=$videosor->fetch(PDO::FETCH_ASSOC)) { ?>


                            <tr>
                                <td><?php echo $videocek["video_id"]; ?></td>
                                
                                <td><?php echo $videocek["video_ad"]; ?></td>
                                 <td><?php echo $videocek["video_tarih"]; ?></td>

                                <td><iframe width="150" src="https://www.youtube-nocookie.com/embed/<?php echo $videocek["video_key"]; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                             
                             
                               
                                <td><?php if($videocek["video_durum"]=="1"){echo '<button type="button" class="btn btn-success">AKTİF</button>';}
                                else if($videocek["video_durum"]=="0"){echo '<button type="button" class="btn btn-danger">PASİF</button>';}
                                ?></td>

                                <td><a href="video-duzenle.php?video_id=<?php echo $videocek["video_id"]; ?>"><div class="ti-pencil-alt"></div></a></td>
                                <td><a href="netting/islem.php?video_id=<?php echo $videocek["video_id"]; ?>&videosil=ok"><div class="ti-trash"></div></a></td>
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