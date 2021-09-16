<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="css/vendor/tooltipster.css">
	<link rel="stylesheet" href="css/vendor/owl.carousel.css">
	<link rel="stylesheet" href="css/vendor/magnific-popup.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>Knight Online PVP Server Market | Gold Bar | İtem | Karakter</title>
</head>
<body>
	
	<!-- FORM POPUP -->
	<?php include( "pop_up_1.php" );?>
	<?php include( "pop_up_2.php" );?>
	<!-- /FORM POPUP -->
	
	<!-- HEADER -->
	<div class="header-wrap">
		<header>
			<!-- LOGO-PC -->
			<a href="index.php">
				<figure class="logo">
					<img src="images/logo.png" alt="logo">
				</figure>
			</a>
			<!-- /LOGO-PC -->

			<!-- MOBILE MENU HANDLER -->
			<div class="mobile-menu-handler left primary">
				<img src="images/pull-icon.png" alt="pull-icon">
			</div>
			<!-- /MOBILE MENU HANDLER -->

			<!-- LOGO MOBILE -->
			<a href="index.php">
				<figure class="logo-mobile">
					<img src="images/logo_mobile.png" alt="logo-mobile">
				</figure>
			</a>
			<!-- /LOGO MOBILE -->

			<!-- MOBILE ACCOUNT OPTIONS HANDLER -->
			<div class="mobile-account-options-handler right secondary">
				<span class="icon-user"></span>
			</div>
			<!-- /MOBILE ACCOUNT OPTIONS HANDLER -->

			<!-- USER BOARD -->
			<div class="user-board">
				<!-- ACCOUNT ACTIONS -->
				<div class="account-actions no-space">
					<a href="" class="interesting-link ">Hakkımızda</a>
					<a href="#" class="interesting-link">Sıkça Sorulan Sorular</a>
					<a href="kayit_ol.php" class="button primary">KAYIT OL</a>
					<a href="#promo-popup-2" class="button secondary promo-popup">GİRİŞ YAP</a>
				</div>
				<!-- /ACCOUNT ACTIONS -->
			</div>
			<!-- /USER BOARD -->
		</header>
	</div>
	<!-- /HEADER -->

	<!-- SIDE MENU-MOBIL -->
	<div id="mobile-menu" class="side-menu left closed">
		<!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->

		<!-- SIDE MENU HEADER-MOBIL -->
		<div class="side-menu-header">
			<figure class="logo small">
				<img src="images/logo.png" alt="logo">
			</figure>
		</div>
		<!-- /SIDE MENU HEADER-MOBIL -->
		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect interactive">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item active">
				<a href="index.php"><span class="sl-icon icon-home"></span>&nbsp;&nbsp;ANASAYFA</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="oyunlar.php"><span class="sl-icon icon-game-controller"></span>&nbsp;&nbsp;OYUNLAR</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="oyuncu_pazari.php"><span class="sl-icon icon-user"></span>&nbsp;&nbsp;OYUNCU PAZARI</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="gold_bar.php"><span class="sl-icon icon-diamond"></span>&nbsp;&nbsp;GOLD BAR</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="ilan_ver.php"><span class="sl-icon icon-tag"></span>&nbsp;&nbsp;İLAN VER</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="bakiye_yukle.php"><span class="sl-icon icon-wallet"></span>&nbsp;&nbsp;BAKİYE YÜKLE</a>
			</li>
			<!-- /DROPDOWN ITEM -->
			
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="bakiye_yukle.php"><span class="sl-icon icon-briefcase"></span>&nbsp;&nbsp;BANKA HESAPLARI</a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->
	</div>
	<!-- /SIDE MENU-MOBIL -->

	<!-- SIDE MENU-MOBIL -->
	<div id="account-options-menu" class="side-menu right closed">
		<!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->
		

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title"></BR></p>
		<!-- /SIDE MENU TITLE -->
		<a href="#promo-popup-2" class="button medium secondary promo-popup">GİRİŞ YAP</a>
		<a href="#" class="button medium primary">KAYIT OL</a>
		
	</div>
	<!-- /SIDE MENU-MOBIL -->

	<!-- MENU-ON -->
		<?php
			include( "menu.php" );
		?>
	<!-- /MENU-OFF -->
	
	<!-- BANNER -->
	<div class="banner-wrap">
		<section class="banner">
			<h1>KNIGHT ONLINE <span>PVP</span> MARKET</h1>
			<p>SATIN ALMAK İSTEDİĞİNİZ VE SATMAK İSTEDİĞİNİZ GOLD BAR, İTEM ÇEŞİTLERİ VE KARAKTER GİBİ BİR ÇOK HİZMETİ BULABİLECEĞİNİZ YENİ ADRESİNİZ.</p>
			<img src="images/top_items.png" alt="banner-img">
			<!-- SEARCH WIDGET -->
			<div class="search-widget">
				<form class="search-widget-form">
					<input type="text" name="category_name" placeholder="Aramak istediğiniz kelimeyi yazın...">
					<label for="categories" class="select-block">
						<select name="categories" id="categories">
							<option value="0">Tüm Kategoriler</option>
							<option value="1">Gold Bar</option>
							<option value="2">İtem</option>
							<option value="3">Karakter</option>
							<option value="4">CPoint</option>
							<option value="6">Knight Bot</option>
							<option value="7">KO Pedal</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
					<button class="button medium dark">ARAMAYI BAŞLAT</button>
				</form>
			</div>
			<!-- /SEARCH WIDGET -->
		</section>
	</div>
	<!-- /BANNER -->

	<div class="clearfix"></div>
	<p style="height:100px;"></p>
	
	<!-- PRODUCT SIDESHOW -->
	<div id="product-sideshow-wrap">
		<div id="product-sideshow">
		
			<!-- PRODUCT SHOWCASE GOLDBAR -->
			<div class="product-showcase">
				<!-- HEADLINE -->
				<div class="headline primary">
					<h4>Knight Online Market Vitrin</h4>
					<!-- SLIDE CONTROLS -->
					<div class="slide-control-wrap">
						<div class="slide-control left">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>

						<div class="slide-control right">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>
					</div>
					<!-- /SLIDE CONTROLS -->
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT LIST -->
				<div id="pl-1" class="product-list grid column4-wrap owl-carousel">
						<?php include( "goldbar_items.php" );?>
						<?php include( "goldbar_items.php" );?>
						<?php include( "goldbar_items.php" );?>
				</div>
				<!-- /PRODUCT LIST -->
			</div>
			<!-- /PRODUCT SHOWCASE GOLDBAR -->
		
			<!-- PRODUCT SHOWCASE KARAKTER-->
			<div class="product-showcase">
				<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>Oyuncu Pazarı / Karakterler</h4>
					<!-- SLIDE CONTROLS -->
					<div class="slide-control-wrap">
						<div class="slide-control left">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>

						<div class="slide-control right">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>
					</div>
					<!-- /SLIDE CONTROLS -->
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT LIST -->
				<div id="pl-2" class="product-list grid column4-wrap owl-carousel">
						<?php include( "karakter_items.php" );?>
						<?php include( "karakter_items.php" );?>
						<?php include( "karakter_items.php" );?>
				</div>
				<!-- /PRODUCT LIST -->
			</div>
			<!-- /PRODUCT SHOWCASE KARAKTER -->

			<!-- PRODUCT ITEMLER -->
			<div class="product-showcase">
				<!-- HEADLINE -->
				<div class="headline secondary">
					<h4>Oyuncu Pazarı / İtemler</h4>
					<!-- SLIDE CONTROLS -->
					<div class="slide-control-wrap">
						<div class="slide-control left">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>

						<div class="slide-control right">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>
					</div>
					<!-- /SLIDE CONTROLS -->
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT LIST -->
				<div id="pl-3" class="product-list grid column4-wrap owl-carousel">
					<?php include( "item_items.php" );?>
					<?php include( "item_items.php" );?>
					<?php include( "item_items.php" );?>
				</div>
				<!-- /PRODUCT LIST -->
			</div>
			<!-- /PRODUCT ITEMLER -->

			<!-- PRODUCT GOLD BARLAR -->
			<div class="product-showcase">
				<!-- HEADLINE -->
				<div class="headline primary">
					<h4>Oyuncu Pazarı / Gold Barlar</h4>
					<!-- SLIDE CONTROLS -->
					<div class="slide-control-wrap">
						<div class="slide-control left">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>

						<div class="slide-control right">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</div>
					</div>
					<!-- /SLIDE CONTROLS -->
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT LIST -->
				<div id="pl-4" class="product-list grid column4-wrap owl-carousel">
				<?php include( "item_gb.php" );?>	
				<?php include( "item_gb.php" );?>	
				<?php include( "item_gb.php" );?>	
				</div>
				<!-- PRODUCT LIST -->
			</div>
			<!-- PRODUCT GOLD BARLAR -->
			
		</div>
	</div>
	<!-- /PRODUCTS SIDESHOW -->
	
	<!-- HIZMETLER -->
		<?php include( "hizmetler.php" );?>
	<!-- /HIZMETLER -->
	
	<!-- BULTEN -->
		<?php include( "bulten.php" );?>
	<!-- /BULTEN -->

	<!-- FOOTER -->
		<?php include( "footer.php" );?>
	<!-- /FOOTER -->

	<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">	
	<symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
		<path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
	</symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
	<symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">	
		<polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751 
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
	</symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
	<symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
		<rect x="5" width="3" height="13"/>
		<rect y="5" width="13" height="3"/>
	</symbol>
</svg>
<!-- /SVG PLUS -->

<!-- jQuery -->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- Owl Carousel -->
<script src="js/vendor/owl.carousel.min.js"></script>
<!-- Tweet -->
<script src="js/vendor/twitter/jquery.tweet.min.js"></script>
<!-- xmAlerts -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Home -->
<script src="js/home.js"></script>
<!-- Alerts Demo -->
<script src="js/alerts-demo.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
<!-- Footer -->
<script src="js/footer.js"></script>
<!-- Canlı Destek -->
	<?php include( "online-destek.php" );?>
</body>
</html>