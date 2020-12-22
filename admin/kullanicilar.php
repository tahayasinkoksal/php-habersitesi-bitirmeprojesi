<?php include"header.php"; ?>
<h4 class="page-title pull-left">Kullanıcılar</h4>
<?php include"uye-durum-kontrol.php"; 

//Uye verisi çekme
$uyesor=$db->prepare("SELECT * FROM uyeler");
$uyesor->execute();
sayfayetkikontrol();

?>  



<div class="main-content-inner">
    <div class="row">


       <!-- Dark table start -->
       <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <a href="yeni-kullanici.php"><button type="button" class="btn btn-success pull-right">YENİ EKLE</button></a><br>
               <?php include 'durumlar.php'; ?>

               <h4 class="header-title">Kullanıcılar</h4>
               <div class="data-tables datatable-dark">
                <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>ID</th>
                            <th>Ad Soyad</th>
                            <th>Yazar Adı</th>
                            <th>Mail</th>
                            <th>Durum</th>
                            <th>Uyelik Tarihi</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($uyecek=$uyesor->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr>
                                <td><?php echo $uyecek["uye_id"]; ?></td>
                                <td><?php echo $uyecek["uye_adsoyad"]; ?></td>
                                <td><?php echo $uyecek["uye_yazar"]; ?></td>
                                <td><?php echo $uyecek["uye_mail"]; ?></td>
                                <td><?php if($uyecek["uye_durum"]=="2"){echo '<button type="button" class="btn btn-success">YÖNETİCİ</button>';}
                                else if($uyecek["uye_durum"]=="1"){echo '<button type="button" class="btn btn-primary">YAZAR</button>';}
                                else if($uyecek["uye_durum"]=="0"){echo '<button type="button" class="btn btn-danger">BANLANMIŞ veya Mail Onaylamamış</button>';}
                                ?></td>
                                <td><?php echo $uyecek["uye_tarih"]; ?></td>
                                <td><a href="uye-duzenle.php?uye_id=<?php echo $uyecek["uye_id"]; ?>"><div class="ti-pencil-alt"></div></a></td>
                                <td><a href="netting/islem.php?uye_id=<?php echo $uyecek["uye_id"]; ?>&uyesil=ok"><div class="ti-trash"></div></a></td>
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