<?php 
include 'head.php';

$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
$bankasor->execute();

$current='hesapno';
?>



<body>
	<!-- MODAL -->
	<!-- MODAL / END -->
	
	<!-- HEADER -->
		<?php include "include/header.php"; ?>
		<?php include( "./include/giris-yap-popup.php");?>
		<!-- MOBIL-MENU -->
    <?php include "include/mobilmenu.php"; ?>
		<!-- MENU -->
		<?php include( "./include/menu.php");?>
	<!-- HEADER / END -->
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v3">
		<div class="section-headline">
			<h2>BANKA HESAP NUMARALARI</h2>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->
	
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section full">
			<!-- SIDEBAR -->
			<div class="sidebar">
			<!-- DROPDOWN -->
				<ul class="dropdown hover-effect">
					<li class="dropdown-item active">
						<a href="#">HESAP NUMARALARI</a>
					</li>
					<li class="dropdown-item">
						<a href="atm-havale-eft">ATM - HAVALE - EFT</a>
					</li>
					<li class="dropdown-item">
						<a href="banka-kredi-karti">BANKA-KREDİ KARTI</a>
					</li>
					<li class="dropdown-item">
						<a href="oyunparasi">GOLD BAR SAT</a>
					</li>
				</ul>
			</div>
			<!-- /SIDEBAR -->	
			
			<div class="content">
				<!-- BADGE BOXES -->
				<div class="badge-boxes column3-4-wrap">
					<!-- AKBANK ITEM -->

                    <?php
                    while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
					<div class="sidebar-item author-bio short author-badges-v1 column">
						<h4 style="text-align:center"><?php echo $bankacek['banka_masraf']; ?></h4>
						<hr class="line-separator-0">
						<figure class="">
							<img src="<?php echo $bankacek['banka_resmi']; ?>" alt="">
						</figure>
						<hr class="line-separator-10">
						<p class="text-header">HESAP SAHİBİ</p>
						<p class="text-oneline1"><?php echo $bankacek['banka_sahibi']; ?></p>
						<div style="float:left; width:50%">
						<p class="text-header">ŞUBE NO</p>
						<p class="text-oneline1"><?php echo $bankacek['banka_sube'] ?></p>
						</div>
						<div style="float:left; width:50%">
						<p class="text-header">HESAP NO</p>
						<p class="text-oneline1"><?php echo $bankacek['banka_hesap'] ?></p>
						</div>
						<p class="text-header">IBAN</p>
						<p class="text-oneline1"><?php echo $bankacek['banka_iban'] ?></p>
						<div class="clearfix"></div>
						<a href="atm-havale-eft.php?banka=<?php echo $bankacek['divid'] ?>" class="button primary">ÖDEME BİLDİRİMİ YAP</a>
					</div>
                    <?php } ?>


					<!-- /AKBANK ITEM -->


				</div>
				<!-- /BADGE BOXES -->
			</div>
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

<!-- SVG CHECK -->
<svg style="display: none;">
	<symbol id="svg-check" viewBox="0 0 15 12" preserveAspectRatio="xMinYMin meet">
		<polygon points="12.45,0.344 5.39,7.404 2.562,4.575 0.429,6.708 3.257,9.536 3.257,9.536 
			5.379,11.657 14.571,2.465 "/>
	</symbol>
</svg>
<!-- /SVG CHECK -->

<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>
<!-- Owl Carousel -->
<script src="js/vendor/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<!-- Post Tab -->
<script src="js/side-menu.js"></script>
<script src="js/home.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/user-board.js"></script>
<script src="js/popup-data.js"></script>
<script src="js/alerts.js"></script>
</body>
</html>