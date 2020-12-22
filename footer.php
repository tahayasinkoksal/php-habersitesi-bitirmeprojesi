<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="footer-widget">
                    <!-- Logo -->
                    <a href="index.html" class="foo-logo"><img src="img/core-img/koklogobeyaz.png" alt=""></a>
                    <p>Haberin güvenilir adresi KÖK HABER AJANSI</p>
                    <div class="footer-social-info">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="footer-widget">
                    <h6 class="widget-title">Kategoriler</h6>
                    <nav class="footer-widget-nav">
                        <ul>
                           <?php 
  //Kategori VERİLER
                           $habersor=$db->prepare("SELECT * FROM haber_kategori");
                           $habersor->execute();
                           ?>

                           <?php while ($kategoricek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li><a href="sonhaberler.php?kategori=<?php echo $kategoricek["kategori_id"] ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $kategoricek["kategori_ad"]; ?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>


        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <!-- Copywrite Text -->
                <div class="col-12">
                    <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> KÖKSAL HABER AJANSI | Taha Yasin KÖKSAL <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://tahayasinkoksal.com.tr" target="_blank">KÖKSAL</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>