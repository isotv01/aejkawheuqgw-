<?php include 'head.php'; ?>
<body>
	
	<!-- HEADER-ON -->
	<?php include( "./include/header.php");?>
	
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>
<?php include( "./include/giris-yap-popup.php");?>
	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v2">
		<div class="section-headline">
			<h2>A'dan Z'ye Tüm Oyunlar ve Digital Kodlar</h2>
			<p>Anasayfa<span class="separator">/</span><span class="current-section">Oyunlar</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->
	
	<!-- SIDEBAR NAV -->
	<div class="sidebar-nav-wrap">
		<div class="sidebar-nav" style="padding-top:15px">
			<div style="width:970px; margin:0 auto;">
			<!-- PAGER -->
			
			<div class="pager primary">
				<div class="pager-item <?php if (!isset($_POST['alphabet'])) { echo 'active' ;} ?>"><a  href="oyunlar.php"><p title="TÜMÜ">#</p></a></div>
				<form action="" method="POST">
				<div class="pager-item <?php if ($_POST['alphabet']=='A') { echo 'active' ;} ?>"><center><button name="alphabet" value="A" style="background-color: transparent; width: 30px; height: 30px;" >A</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='B') { echo 'active' ;} ?>"><center><button name="alphabet" value="B" style="background-color: transparent; width: 30px; height: 30px;" >B</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='C') { echo 'active' ;} ?>"><center><button name="alphabet" value="C" style="background-color: transparent; width: 30px; height: 30px;" >C</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='D') { echo 'active' ;} ?>"><center><button name="alphabet" value="D" style="background-color: transparent; width: 30px; height: 30px;" >D</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='E') { echo 'active' ;} ?>"><center><button name="alphabet" value="E" style="background-color: transparent; width: 30px; height: 30px;" >E</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='F') { echo 'active' ;} ?>"><center><button name="alphabet" value="F" style="background-color: transparent; width: 30px; height: 30px;" >F</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='G') { echo 'active' ;} ?>"><center><button name="alphabet" value="G" style="background-color: transparent; width: 30px; height: 30px;" >G</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='H') { echo 'active' ;} ?>"><center><button name="alphabet" value="H" style="background-color: transparent; width: 30px; height: 30px;" >H</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='I') { echo 'active' ;} ?>"><center><button name="alphabet" value="I" style="background-color: transparent; width: 30px; height: 30px;" >I</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='J') { echo 'active' ;} ?>"><center><button name="alphabet" value="J" style="background-color: transparent; width: 30px; height: 30px;" >J</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='K') { echo 'active' ;} ?>"><center><button name="alphabet" value="K" style="background-color: transparent; width: 30px; height: 30px;" >K</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='L') { echo 'active' ;} ?>"><center><button name="alphabet" value="L" style="background-color: transparent; width: 30px; height: 30px;" >L</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='M') { echo 'active' ;} ?>"><center><button name="alphabet" value="M" style="background-color: transparent; width: 30px; height: 30px;" >M</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='N') { echo 'active' ;} ?>"><center><button name="alphabet" value="N" style="background-color: transparent; width: 30px; height: 30px;" >N</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='O') { echo 'active' ;} ?>"><center><button name="alphabet" value="O" style="background-color: transparent; width: 30px; height: 30px;" >O</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='P') { echo 'active' ;} ?>"><center><button name="alphabet" value="P" style="background-color: transparent; width: 30px; height: 30px;" >P</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='R') { echo 'active' ;} ?>"><center><button name="alphabet" value="R" style="background-color: transparent; width: 30px; height: 30px;" >R</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='S') { echo 'active' ;} ?>"><center><button name="alphabet" value="S" style="background-color: transparent; width: 30px; height: 30px;" >S</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='T') { echo 'active' ;} ?>"><center><button name="alphabet" value="T" style="background-color: transparent; width: 30px; height: 30px;" >T</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='U') { echo 'active' ;} ?>"><center><button name="alphabet" value="U" style="background-color: transparent; width: 30px; height: 30px;" >U</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='V') { echo 'active' ;} ?>"><center><button name="alphabet" value="V" style="background-color: transparent; width: 30px; height: 30px;" >V</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='Y') { echo 'active' ;} ?>"><center><button name="alphabet" value="Y" style="background-color: transparent; width: 30px; height: 30px;" >Y</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='X') { echo 'active' ;} ?>"><center><button name="alphabet" value="X" style="background-color: transparent; width: 30px; height: 30px;" >X</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='Q') { echo 'active' ;} ?>"><center><button name="alphabet" value="Q" style="background-color: transparent; width: 30px; height: 30px;" >Q</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='W') { echo 'active' ;} ?>"><center><button name="alphabet" value="W" style="background-color: transparent; width: 30px; height: 30px;" >W</button></center></div>
				<div class="pager-item <?php if ($_POST['alphabet']=='Z') { echo 'active' ;} ?>"><center><button name="alphabet" value="Z" style="background-color: transparent; width: 30px; height: 30px;" >Z</button></center></div>
			</form>
			</div>
			<!-- /PAGER -->
			</div>
		</div>
	</div>
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


			if (isset($_POST['alphabet'])) {
				$basharf = $_POST['alphabet'];
				$sql = "SELECT * FROM `kategori` WHERE kategori_durum='1' and kategori_ad LIKE '".$basharf."%'";
				$sql2=$db->query($sql);
			} else {
				$sql="SELECT * FROM `kategori` WHERE kategori_durum='1'";
						$sql2=$db->query($sql);
			}


		
						


						while($oyun=$sql2->fetch(PDO::FETCH_ASSOC)) { ?>
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="<?=$oyun['kategori_resmi2'] ?>" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->
								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->

									<div class="preview-action" style="left:35px; margin-left: 25%">
										<a href="oyun-<?=seo($oyun['kategori_ad']); ?>">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="oyun-<?=seo($oyun['kategori_ad']); ?>">
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
								<a href="oyun-<?=seo($oyun['kategori_ad']); ?>">
									<p class="text-header"><?=$oyun['kategori_ad'] ?></p>
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
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<script src="js/oyunlar-alert-data.js"></script>
<!-- Social -->

<!-- Canlı Destek -->
<?php include( "online-destek.php" );?>
</body>
</html>