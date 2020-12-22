      </div>
  </div>
  <div class="col-sm-6 clearfix">
    <div class="user-profile pull-right">
        <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $uyecek["uye_adsoyad"]; 
        if ($uyecek["uye_durum"]==2) {
            echo " - <b>(YÖNETİCİ)</b>";
        }else if ($uyecek["uye_durum"]==1) {
            echo " - <b>(Yazar)</b>";
        }else if ($uyecek["uye_durum"]==0) {
            header("Location:cikisyap.php?hesaponayi=no");
        }
        ?><i class="fa fa-angle-down"></i></h4>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="bilgilerimi-duzenle.php">Bilgilerimi Düzenle</a>
            <a class="dropdown-item" href="cikisyap.php">Çıkış Yap</a>
        </div>
    </div>
</div>
</div>
</div>
<!-- page title area end -->