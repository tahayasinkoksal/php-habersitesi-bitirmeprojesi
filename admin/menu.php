<div class="sidebar-menu">
	<div class="sidebar-header">
		<div class="logo">
			<a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
		</div>
	</div>
	<div class="main-menu">
		<div class="menu-inner">
			<nav>
				<ul class="metismenu" id="menu">
					<li >
						<a href="index.php" aria-expanded="true"><i class="ti-home"></i><span>Ana Sayfa</span></a>                                   
					</li>

					<li>
						<a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Haberler</span></a>
						<ul class="collapse">
							<li><a href="haberler.php">Tüm Haberler</a></li>
							<li><a href="yeni-haber.php">Yeni Haber Ekle</a></li>

							<li><a href="kategoriler.php">Kategoriler</a></li>
							<?php if (yetkikontrol()) { ?>
								<li><a href="yeni-kategori.php">Yeni Kategori</a></li>
							<?php } ?>

						</ul>
					</li>
					<li>
						<a href="javascript:void(0)" aria-expanded="true"><i class="ti-video-clapper"></i><span>Video Haber</span></a>
						<ul class="collapse">

							<li><a href="videolar.php">Tüm Video Haberler</a></li>
							<li><a href="yeni-video.php">Yeni Video Haber Ekle</a></li>

						</ul>
					</li>
					<?php if (yetkikontrol()) { ?>
						<li>
							<a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-slider"></i><span>Slider</span></a>
							<ul class="collapse">
								<li><a href="slider.php">Slider</a></li>
								<li><a href="yeni-slider.php">Yeni Slider Ekle</a></li>

							</ul>
						</li>
					<?php } ?>


					<?php if (yetkikontrol()) { ?>
						<li>
							<a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Kullanıcı</span></a>
							<ul class="collapse">
								<li><a href="kullanicilar.php">Kullanıcılar</a></li>
								<li><a href="yeni-kullanici.php">Yeni Kullanıcı Ekle</a></li>

							</ul>
						</li>
					<?php } ?>

					<?php if (yetkikontrol()) { ?>
						<li>
							<a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i><span>Gelen Mesajlar</span></a>
							<ul class="collapse">
								<li><a href="mesajlar.php">Tüm Mesalar</a></li>
								

							</ul>
						</li>
					<?php } ?>
					<?php if (yetkikontrol()) { ?>
						<li>
							<a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i><span>Ayarlar</span></a>
							<ul class="collapse">
								<li><a href="site-ayar.php">Site Genel Ayarları</a></li>
								<li><a href="tasarim-duzenle.php">Tasarımı Düzenle</a></li>
								<li><a href="reklam-ayari.php">Reklam Ayarları</a></li>
								

							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</div>
</div>