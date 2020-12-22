<?php include"header.php"; 

?>

<h4 class="page-title pull-left">Kategoriler</h4>

<?php include"uye-durum-kontrol.php"; 


  //Kategori VERİLER
    $habersor=$db->prepare("SELECT * FROM haber_kategori");
    $habersor->execute();



?>  


<div class="main-content-inner">
    <div class="row">
       <!-- Dark table start -->
       <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <a href="yeni-kategori.php"><button type="button" class="btn btn-success pull-right">YENİ EKLE</button></a><br>

                <?php include 'durumlar.php'; ?>
                
                <h4 class="header-title">Haberler</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Kateori Adı</th>
                                <th>Kategori Detay</th>
                              <?php if (yetkikontrol()) { ?>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                           <?php while ($kategoricek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>


                            <tr>
                                <td><?php echo $kategoricek["kategori_id"]; ?></td>
                                <td><?php echo $kategoricek["kategori_ad"]; ?></td>  
                                <td><?php echo $kategoricek["kategori_detay"]; ?></td>
                                <?php if (yetkikontrol()) { ?>
                                <td><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek["kategori_id"]; ?>"><div class="ti-pencil-alt"></div></a></td>
                                <td><a href="netting/islem.php?kategori_id=<?php echo $kategoricek["kategori_id"]; ?>&kategorisil=ok"><div class="ti-trash"></div></a></td>
                                <?php } ?>
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