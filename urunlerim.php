<?php include 'head.php' ?>
<body>
	
	<!-- POP-UP-ON -->
		<?php include( "./include/siparis-detay-popup.php");?>
	
	<!-- HEADER-ON -->
		<?php include( "./include/header.php");?>
	
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v3">
		<div class="section-headline">
			<h2>Aldığım Ürünler</h2>
			<p>Anasayfa<span class="separator">/</span>Kullanıcı Paneli<span class="separator">/</span><span class="current-section">Aldığım Ürünler</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->
	
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio">
					<!-- USER AVATAR -->
					<a href="user-profile.php" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="images/upload/avatars/avatar.png" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header">IAloneK1ng</p>
					<hr class="line-separator2">				
					<p class="price large">1.745.00 <span>₺</span></p>
					<a href="bakiye-yukle.php" class="button primary"><span class="fa fa-credit-card edit3"></span>BAKİYE YÜKLE</a>
					<div class="clearfix"></div>
					<hr class="line-separator">			
					
					<!-- DROPDOWN -->
					<?php include( "./include/left-menu-panel.php" );?>	
					<!-- /DROPDOWN -->		
					
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->
			
			<!-- CONTENT -->
			<div class="content">
			<!-- HEADLINE -->
				<div class="headline primary">
					<h4>Ürün Geçmişi</h4>
					<button form="statement_filter_form" class="button dark-light media"><span class="fa fa-filter edit3"></span>Filtrele</button>
					<form id="shop_filter_form" name="shop_filter_form">
						<label for="itemspp_filter" class="select-block">
							<select name="itemspp_filter" id="itemspp_filter">
								<option value="0">Tamamını Göster</option>
								<option value="1">Sipariş Tamamlandı</option>
								<option value="1">Onay Bekliyor</option>
								<option value="1">Satış Onayı Bekliyor</option>
								<option value="1">Temin Ediliyor</option>
								<option value="1">İptal Edildi</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</form>
					<div class="clearfix"></div>
				</div>
				<!-- /HEADLINE -->

				

				<!-- TRANSACTION LIST -->
				<div class="transaction-list">
					<!-- TRANSACTION LIST HEADER -->
									
					<div class="transaction-list-header">
						<div class="transaction-list-header-sn">
							<p class="text-header small">ID</p>
						</div>
						<div class="transaction-list-header-tarih">
							<p class="text-header small">Tarih</p>
						</div>
						<div class="transaction-list-header-utipi2">
							<p class="text-header small">Ürün Cinsi</p>
						</div>
						<div class="transaction-list-header-fiyat2">
							<p class="text-header small">Tutar</p>
						</div>
						<div class="transaction-list-header-sob">
							<p class="text-header small">Durum</p>
						</div>
						<div class="transaction-list-header-audetay">
							<p class="text-header small">İşlem</p>
						</div>
					</div>
					<!-- /TRANSACTION LIST HEADER -->

					<!-- TRANSACTION LIST ITEM -->
					<div class="transaction-list-item">
						<div class="transaction-list-item-sn">
							<p class="category featured">14522</p>
						</div>
						<div class="transaction-list-item-tarih">
							<p class="category featured">24.12.2017 - 23:52</p>
						</div>
						<div class="transaction-list-item-utipi2">
							<p class="category featured">Knight Kingdom 33400 CPoint + 9000 CPoint Bonus</p>
						</div>
						<div class="transaction-list-item-fiyat2">
							<p class="category featured">500.00 ₺</p>
						</div>
						<div class="transaction-list-item-sob">
							<a class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span>Onay Bekliyor</a>
						</div>
						<div class="transaction-list-item-audetay">
							<a href="#siparis-detay-popup" class="button dark promo-popup" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
						</div>
					</div>
					<!-- /TRANSACTION LIST ITEM -->
					
					<!-- TRANSACTION LIST ITEM -->
					<div class="transaction-list-item">
						<div class="transaction-list-item-sn">
							<p class="category primary">14522</p>
						</div>
						<div class="transaction-list-item-tarih">
							<p class="category primary">24.12.2017 - 23:52</p>
						</div>
						<div class="transaction-list-item-utipi2">
							<p class="category primary">Knight Kingdom 33400 CPoint + 9000 CPoint Bonus</p>
						</div>
						<div class="transaction-list-item-fiyat2">
							<p class="category primary">500.00 ₺</p>
						</div>
						<div class="transaction-list-item-sob">
							<a class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span>Tamamlandı</a>
						</div>
						<div class="transaction-list-item-audetay">
							<a href="#siparis-detay-popup" class="button dark promo-popup" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
						</div>
					</div>
					<!-- /TRANSACTION LIST ITEM -->
					
					<!-- TRANSACTION LIST ITEM -->
					<div class="transaction-list-item">
						<div class="transaction-list-item-sn">
							<p class="category secondary">14522</p>
						</div>
						<div class="transaction-list-item-tarih">
							<p class="category secondary">24.12.2017 - 23:52</p>
						</div>
						<div class="transaction-list-item-utipi2">
							<p class="category secondary">Knight Kingdom 33400 CPoint + 9000 CPoint Bonus</p>
						</div>
						<div class="transaction-list-item-fiyat2">
							<p class="category secondary">500.00 ₺</p>
						</div>
						<div class="transaction-list-item-sob">
							<a class="button secondary" style="margin-top:9px; width:100%;"><span class="fa fa-search edit3"></span>Temin Ediliyor</a>
						</div>
						<div class="transaction-list-item-audetay">
							<a href="#siparis-detay-popup" class="button dark promo-popup" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
						</div>
					</div>
					<!-- /TRANSACTION LIST ITEM -->
					
					<!-- TRANSACTION LIST ITEM -->
					<div class="transaction-list-item">
						<div class="transaction-list-item-sn">
							<p class="category tertiary">14522</p>
						</div>
						<div class="transaction-list-item-tarih">
							<p class="category tertiary">24.12.2017 - 23:52</p>
						</div>
						<div class="transaction-list-item-utipi2">
							<p class="category tertiary">Knight Kingdom 33400 CPoint + 9000 CPoint Bonus</p>
						</div>
						<div class="transaction-list-item-fiyat2">
							<p class="category tertiary">500.00 ₺</p>
						</div>
						<div class="transaction-list-item-sob">
							<a class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span>İptal Edildi</a>
						</div>
						<div class="transaction-list-item-audetay">
							<a href="#siparis-detay-popup" class="button dark promo-popup" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
						</div>
					</div>
					<!-- /TRANSACTION LIST ITEM -->

					
		
		
				</div>
				<!-- DASHBOARD CONTENT -->
		
			</div>
			<!-- CONTENT VITRIN -->
			
		<!-- /SECTION -->	
		</div>
	</div>
	<!-- /SECTION -->
	
	<!-- HIZMETLER -->
		<?php include( "./include/hizmetler.php" );?>
	<!-- /HIZMETLER -->
	
	<!-- FOOTER -->
		<?php include( "./include/footer.php" );?>
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
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<script src="js/oyunlar-alert-data.js"></script>
<!-- Social -->
<script src="js/sosyal-api.js"></script>
<script src="js/sosyal-data.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
<!-- Canlı Destek -->
	<?php include( "online-destek.php" );?>
</body>
</html>