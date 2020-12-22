<?php include 'header.php'; ?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>İletişim</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">İletişim</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                    <!-- Google Maps -->
                    <div class="map-area mb-30">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3094.1040699764303!2d34.17055651567971!3d39.149614539642094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d572bc579ca953%3A0x360c3aaf4c24a6ed!2zS2VydmFuc2FyYXksIDE5NzQuIFNrLiwgNDAyMDAgS8SxcsWfZWhpciBNZXJrZXovS8SxcsWfZWhpcg!5e0!3m2!1str!2str!4v1591012238160!5m2!1str!2str" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>İLETİŞİM BİLGİLERİ</h5>
                    </div>

                    <div class="contact-information mb-30">
                        <p>Bize ulaşmaktan çekinme, alt kısımda bulunan adreslerden bize ulaşabilirsin.</p>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p>Ofis:</p>
                                <h6><?php echo $ayarcek["ayar_ofis"]; ?></h6>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p>Email:</p>
                                <h6><?php echo $ayarcek["ayar_iletisimmail"]; ?></h6>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p>Telefon:</p>
                                <h6><?php echo $ayarcek["ayar_telefon"]; ?></h6>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_GET["durum"])) { ?>
                       <div class="alert alert-success" role="alert">
                          Mesajını aldık!
                      </div>

                  <?php } ?>

                  <!-- Section Title -->
                  <div class="section-heading">
                    <h5>Mesaj Gönder</h5>
                </div>

                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <form action="admin/netting/islem.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="iletisim_ad" id="iletisim_ad" placeholder="Adınız">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="iletisim_mail" id="iletisim_mail" placeholder="Mail adresiniz">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="iletisim_mesaj" class="form-control" id="iletisim_mesaj" cols="30" rows="10" placeholder="Mesajın"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn mag-btn mt-30" name="mesajgeldi" type="submit">Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if($gorunumcek["sag_menu"]==1)  {
             include 'sagkisim.php'; 
         } ?>
    </div>
</div>
</section>
<!-- ##### Contact Area End ##### -->

<?php include 'footer.php'; ?>