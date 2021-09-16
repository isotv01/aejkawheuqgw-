<?php
ob_start();
session_start();

include "admins/netting/baglan.php" ;
include "admins/fonksiyon.php";

include "netting/ayar.php";

$ustSef=$_GET['sef'];

$sql="SELECT * FROM `kategori` WHERE kategori_seourl='$ustSef'";
$res=$db->query($sql);
$cCek=$res->fetch(PDO::FETCH_ASSOC);
$id=$cCek['kategori_id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="title" content="Epinci.Net | Türkiye'nin En Büyük Oyun Alışveriş Sitesi">
    <meta name="description" content="<?=strip_tags($cCek['aciklama']) ?>">
    <meta name="keywords" content="<?=$cCek['keywords'] ?>">
    <meta name="robots" content="index, follow">
    <base href="https://www.epinci.net/" />
    <link rel="stylesheet" href="css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="css/vendor/tooltipster.css">
    <link rel="stylesheet" href="css/vendor/owl.carousel.css">
    <link rel="stylesheet" href="css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="css/skdslider.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/social-1.css">
    <link rel="stylesheet" href="css/font-fa/css/font-awesome.css">
    <link rel="stylesheet" href="css/borsa.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- favicon -->
    <link rel="icon" href="favicon.ico">
    <title>Epinci.Net | Türkiye'nin En Büyük Oyun Alışveriş Sitesi</title>
</head>
<body>


<!-- POP-UP-ON -->
<?php include( "./include/gb-bize-sat-all-popup.php");?>
<?php include( "./include/giris-yap-popup.php");?>
	
	<!-- HEADER-ON -->
		<?php include( "./include/header.php");?>
	
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v4">
		<div class="section-headline">
			<h2><?=$cCek['kategori_ad'] ?></h2>
			<p>Anasayfa<span class="separator">/</span><span class="current-section">Oyunlar</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<div class="section-wrap">
		<div class="section" style="padding:30px 0 30px">
			<!-- FORM BOX ITEM -->
			<div class="form-box-item" style="padding:20px 20px 10px 20px;">
				<!-- ALERT BOXES PREVIEW -->
				<div class="alert-boxes-preview">
					<div class="alert-boxes-preview-description">
						<img src="<?=$cCek['kategori_resmi2']; ?>" width="100%">
					</div>
					<div class="alert-boxes-preview-links">
						<p class="text-header small" style="margin-bottom:15px">Açıklama</p>
						<p style="font-size:0.8125em;text-align:justify;"><?=$cCek['aciklama'] ?></p>
					</div>
				</div>
				<!-- /ALERT BOXES PREVIEW -->
				<hr class="line-separator2">
				<p class="text-header" style="margin-bottom:15px"><?=$cCek['kategori_ad'] ?> Ürünleri</p>
				<!-- PRODUCT LIST -->
				<div class="product-list grid column4-wrap">
					
					<!-- Knight Online Cash & Npoints Usko -->

					<?php $sql1="SELECT * FROM `altkategori` WHERE ustId='$id'";
							$res1=$db->query($sql1);


					while($cek=$res1->fetch(PDO::FETCH_ASSOC)) { ?>
					<div class="product-item column" style="margin-right:6px; margin-left:6px; margin-bottom:12px;">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<img src="<?=$cek['resim'] ?>" alt="product-image">
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->
							<!-- PREVIEW ACTIONS -->
							<div class="preview-actions">
								<!-- PREVIEW ACTION -->
								<div class="preview-action" style="left:35px; margin-left: 25%">
									<a href="urun-<?=seo($cek['ad'].'-'.$cek['id']) ?>">
										<div class="circle tiny primary">
											<span class="icon-tag"></span>
										</div>
									</a>
									<a href="urun-<?=seo($cek['ad'].'-'.$cek['id']) ?>">
										<p>Ürünü İncele</p>
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
							<a href="urun-<?=seo($cek['ad'].'-'.$cek['id']) ?>">
								<p class="text-header" style="font-size:14px"><?=$cek['ad'] ?></p>
							</a>
						</div>
						<!-- /PRODUCT INFO -->
					</div>
					
				<?php } ?>

					<!-- Knight Online Cash & Npoints Steam -->
					
					
					<?php if ($cCek['itemilan']==1) { ?>
						<!-- Knight Online İtem Pazarı -->
					<div class="product-item column" style="margin-right:6px; margin-left:6px; margin-bottom:12px;; margin-bottom:12px;">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<img src="images/upload/oyunlar/knight_online_kategori_item_pazari.jpg" alt="product-image">
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->
							<!-- PREVIEW ACTIONS -->
							<div class="preview-actions" >
								<!-- PREVIEW ACTION -->
								<div class="preview-action" style="left:35px; margin-left: 25%">
									<a href="oyuncu-pazari?advert=<?=$cCek['kategori_id']; ?>">
										<div class="circle tiny primary">
											<span class="icon-tag"></span>
										</div>
									</a>
									<a href="knightonline.php">
										<p>İlanları İncele</p>
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
							<a href="oyuncu-pazari?advert=<?=$cCek['kategori_id']; ?>">
								<p class="text-header" style="font-size:14px">Knight Online İtem Pazarı</p>
							</a>
						</div>
						<!-- /PRODUCT INFO -->
					</div>
					<?php } ?>
					
					
						<?php if ($cCek['karakterilan']==1 || $cCek['cssilan']==1) { ?>
					<!-- Knight Online Karakter Pazarı -->
					<div class="product-item column" style="margin-right:6px; margin-left:6px; margin-bottom:12px;; margin-bottom:12px;">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<img src="images/upload/oyunlar/knight_online_kategori_karakter_pazari.jpg" alt="product-image">
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->
							<!-- PREVIEW ACTIONS -->
							<div class="preview-actions">
								<!-- PREVIEW ACTION -->
								<div class="preview-action" style="left:35px; margin-left: 25%">
									<a href="oyuncu-pazari?advertk=<?=$cCek['kategori_id']; ?>">
										<div class="circle tiny primary">
											<span class="icon-tag"></span>
										</div>
									</a>
									<a href="knightonline.php">
										<p>İlanları İncele</p>
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
							<a href="oyuncu-pazari?advertk=<?=$cCek['kategori_id']; ?>">
								<p class="text-header" style="font-size:14px">Knight Online Karakter Pazarı</p>
							</a>
						</div>
						<!-- /PRODUCT INFO -->
					</div>
					
					<?php } ?>
					
				</div>
				<!-- /PRODUCT LIST -->
				<div class="clearfix"></div>
			</div>
			<!-- /FORM BOX ITEM -->
        </div>
	</div>
	
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
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<script src="js/vendor/jquery.xmalert.min.js"></script>
<script src="js/oyunlar-alert-data.js"></script>

<!-- Canlı Destek -->
<?php include( "online-destek.php" );?>
</body>
</html>