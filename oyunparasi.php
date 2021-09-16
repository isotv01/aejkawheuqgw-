<?php include 'head.php'; ?>
<body>
	
	<!-- HEADER-ON -->
	<?php include( "./include/header.php");?>
	<?php include( "./include/giris-yap-popup.php");?>
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v2">
		<div class="section-headline">
			<h2>Tüm Oyun Paraları</h2>
			<p>Anasayfa<span class="separator">/</span><span class="current-section">Oyunlar</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->
	
	
	<!-- /SIDEBAR NAV -->
	
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section" style="padding:30px 0 30px">
				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column4-wrap">
						
						<!-- PRODUCT ITEM -->

						<?php 
						$sql="SELECT * FROM `altkategori` WHERE tip='gb'";
						$sql2=$db->query($sql);
						while($oyun=$sql2->fetch(PDO::FETCH_ASSOC)) { ?>
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="<?=$oyun['resim'] ?>" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->
								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<?php
									$ustId=$oyun['ustId']; 
									$sqlust="SELECT * FROM `kategori` WHERE kategori_id='$ustId'";
						$sql2ust=$db->query($sqlust); 
						$ustCek=$sql2ust->fetch(PDO::FETCH_ASSOC);
						?>

									<div class="preview-action" style="left:35px; margin-left: 25%">
										<a href="urun-<?=seo($oyun['ad'].'-'.$oyun['id']); ?>">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="urun-<?=seo($oyun['ad'].'-'.$oyun['id']); ?>">
											<p>Oyuna Git</p>
										</a>
									</div>
									<!-- /PREVIEW ACTION -->
									<!-- PREVIEW ACTION -->

									<!-- /PREVIEW ACTION -->
								</div>
								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PRODUCT PREVIEW ACTIONS -->

							<!-- PRODUCT INFO -->
							<div class="product-info">
								<a href="urun-<?=seo($oyun['ad'].'-'.$oyun['id']); ?>">
									<p class="text-header"><?=$ustCek['kategori_ad'].' '.$oyun['ad'] ?></p>
								</a>
							</div>
							<!-- /PRODUCT INFO -->
						</div>

					<?php } ?>
						<!-- /PRODUCT ITEM -->
						
						
					
					</div>
					<!-- /PRODUCT LIST -->
				</div>
				<!-- /PRODUCT SHOWCASE -->
				<div class="clearfix"></div>
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
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<script src="js/oyunlar-alert-data.js"></script>

<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<!-- Canlı Destek -->
<?php include( "online-destek.php" );?>
</body>
</html>