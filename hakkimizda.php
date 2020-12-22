<?php include 'header.php'; ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>HAKKIMIZDA</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Hakkımızda</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <!-- About Us Content -->
                    <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Hakkımızda</h5>
                        </div>
                      <p><?php echo $ayarcek["ayar_hakkimizda"]; ?></p>
                        <img class="mt-15" src="img/bg-img/35.jpg" alt="">

                        
                        
                
                       
                        
                      
                        
                 
                       
                    </div>
                </div>
<?php include 'sagkisim.php'; ?>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

  <?php include 'footer.php'; ?>