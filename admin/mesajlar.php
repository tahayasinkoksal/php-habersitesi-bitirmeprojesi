<?php include"header.php"; 

?>

<h4 class="page-title pull-left">Mesajlar</h4>

<?php include"uye-durum-kontrol.php"; 


  //Mesaj verileri
    $mesajsor=$db->prepare("SELECT * FROM iletisim");
    $mesajsor->execute();



?>  


<div class="main-content-inner">
    <div class="row">
       <!-- Dark table start -->
       <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
               

                <?php include 'durumlar.php'; ?>
                
                <h4 class="header-title">Mesajlar</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Gönderen Ad</th>
                                <th>Gönderen Mail</th>
                                <th>Gönderme Tarihi</th>
                                <th>Görüntüle</th>
                               
                               
                            </tr>
                        </thead>
                        <tbody>
                           <?php while ($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) { ?>


                            <tr>
                                <td><?php echo $mesajcek["iletisim_id"]; ?></td>
                                <td><?php echo $mesajcek["iletisim_ad"]; ?></td>  
                                <td><?php echo $mesajcek["iletisim_mail"]; ?></td>
                                 <td><?php echo $mesajcek["iletisim_tarih"]; ?></td>
                                <td><a href="mesaj-goruntule.php?mesaj_id=<?php echo $mesajcek["iletisim_id"]; ?>"><div class="ti-eye"></div></a></td>
                                
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