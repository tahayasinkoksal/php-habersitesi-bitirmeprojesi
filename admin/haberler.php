<?php include"header.php"; ?>

<h4 class="page-title pull-left">Haberler</h4>

<?php include"uye-durum-kontrol.php"; 

$uyeidd = $uyecek["uye_id"];
//Haber verisi çekme
if ($uyecek["uye_durum"]=="2") {
  //BÜTÜN VERİLER
    $habersor=$db->prepare("SELECT * FROM haberler ORDER BY haber_id DESC");
    $habersor->execute();

}else if($uyecek["uye_durum"]=="1")
{
    //YAZAR İSE SADECE KENDİ YAZILARI
    $habersor=$db->prepare("SELECT * FROM haberler WHERE haber_yazarid ='$uyeidd' order by haber_id desc");
    $habersor->execute();
}

?>  


<div class="main-content-inner">
    <div class="row">
     <!-- Dark table start -->
     <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <a href="yeni-haber.php"><button type="button" class="btn btn-success pull-right">YENİ EKLE</button></a><br>

                <?php include 'durumlar.php'; ?>
                
                <h4 class="header-title">Haberler</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Haber Görüntülenme</th>
                                <th>Haber Adı</th>
                                <th>Haber Görseli</th>
                                <th>Kategori</th>
                                <th>Yazar</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>


                            <tr>
                                <td><?php echo $habercek["haber_id"]; ?></td>
                                 <td ><div class="fa fa-eye"><?php echo $habercek["haber_goruntulenme"]; ?></div>&nbsp;&nbsp;
                                    <div class="fa fa-thumbs-o-up"><?php echo $habercek["haber_begenme"]; ?></div></td>
                                <td><?php echo $habercek["haber_ad"]; ?></td>
                                <td><img src="../<?php echo $habercek["haber_gorsel"]; ?>" width="150px"></td>
                                <td><?php 

                                $kategorisor=$db->prepare("SELECT * FROM haber_kategori where kategori_id=:id");
                                $kategorisor->execute(array(
                                    'id' => $habercek["haber_kategori"]
                                ));
                                $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

                                echo $kategoricek["kategori_ad"]; 


                                ?></td>
                                <td><?php echo $habercek["haber_yazar"]; ?></td> 
                                <td><?php echo $habercek["haber_tarih"]; ?></td>
                                <td><?php if($habercek["haber_durum"]=="1"){echo '<button type="button" class="btn btn-success">AKTİF</button>';}
                                else if($habercek["haber_durum"]=="0"){echo '<button type="button" class="btn btn-danger">PASİF</button>';}
                                ?></td>
                                <td><a href="haber-duzenle.php?haber_id=<?php echo $habercek["haber_id"]; ?>"><div class="ti-pencil-alt"></div></a></td>
                                <td><a href="netting/islem.php?haber_id=<?php echo $habercek["haber_id"]; ?>&habersil=ok&&eskiyol=<?php echo $habercek["haber_gorsel"]; ?>"><div class="ti-trash"></div></a></td>
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