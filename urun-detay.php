<?php
ob_start();
session_start();

include "admins/netting/baglan.php" ;
include "admins/fonksiyon.php";

include "netting/ayar.php";

$ustId=$_GET['urun_id'];

$sql11="SELECT * FROM `altkategori` WHERE id='$ustId'";
$res11=$db->query($sql11);
$cCek11=$res11->fetch(PDO::FETCH_ASSOC);
$kID=$cCek11['ustId'];

$oyun="SELECT * FROM `kategori` WHERE kategori_id='$kID'";
$oyun=$db->query($oyun);
$oyunC=$oyun->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="title" content="Epinci.Net | Türkiye'nin En Büyük Oyun Alışveriş Sitesi">
    <meta name="description" content="<?=strip_tags($oyunC['aciklama']) ?>">
    <meta name="keywords" content="<?=$oyunC['keywords'] ?>">
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
	
	<!-- HEADER-ON -->
	<?php include( "./include/header.php");?>
    <?php include( "./include/giris-yap-popup.php");?>
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v4">
		<div class="section-headline">
			<h2><?=$oyunC['kategori_ad'].' '.$cCek11['ad'] ?></h2>
			<p>Anasayfa<span class="separator">/</span><span class="current-section">Oyunlar</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->
	
	<!-- SECTION WRAP -->
	<div class="section-wrap">
		
		<!-- SECTION -->
		<div class="section" style="padding:30px 0 30px">
			
			<!-- LEFT MENU -->
			<div class="content left">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item" style="padding:20px 20px 20px 20px;">
					<!-- URUN DETAY -->
					<div class="alert-boxes-preview">
						<!-- URUN DETAY RESIM -->
						<div class="alert-boxes-preview-description">
							<img src="<?=$cCek11['resim'] ?>" width="100%">
						</div>
						<!-- /URUN DETAY RESIM -->
						<!-- URUN DETAY METIN -->
						<div class="alert-boxes-preview-links">
							<p class="text-header" style="margin-bottom:15px"><?=$oyunC['kategori_ad'].' '.$cCek11['ad'] ?></p>
							<p style="font-size:0.8125em;text-align:justify;"><?=$cCek11['aciklama']; ?></p>
						</div>
						<!-- /URUN DETAY METIN -->
					</div>
					<hr class="line-separator2">

					<div class="share-links-wrap">
						<p class="text-header small">Paylaş :</p>
						<!-- SHARE LINKS -->
                        <!--
						<ul class="share-links hoverable">
							<li><a href="#" class="fb"></a></li>
							<li><a href="#" class="twt"></a></li>
							<li><a href="#" class="db"></a></li>
							<li><a href="#" class="rss"></a></li>
							<li><a href="#" class="gplus"></a></li>
						</ul>
						-->
						<!-- /SHARE LINKS -->
					</div>
				</div>
				<!-- FORM BOX ITEM -->
				<!-- TAB MENU -->
					<div class="post-tab" style="margin-top:30px; margin-bottom:10px">
						<!-- TAB BUTON -->
						<div class="tab-header primary">
							<!-- BUTON -->
							<div class="tab-item">
								<p class="text-header small">Fiyat Listesi</p>
							</div>
							<!-- /BUTON -->
							<!-- BUTON -->
							<div class="tab-item">
								<p class="text-header small">Nasıl Alırım ?</p>
							</div>
							<!-- /BUTON -->
							<!-- BUTON -->
							<div class="tab-item">
								<p class="text-header small">Nasıl Kullanılır ?</p>
							</div>
							<!-- /BUTON -->
							<!-- BUTON -->
                            <?php $kullanici_id=$kullanicicek['kullanici_id'];
                            $urun_id=$cCek11['id'];

                            $yorumsor=$db->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay  order by yorum_zaman DESC");
                            $yorumsor->execute(array(
                                'urun_id' => $urun_id,
                                'yorum_onay' => 1
                            )); ?>
							<div class="tab-item">
								<p class="text-header small">Yorumlar (<?php echo $yorumsor->rowCount(); ?>)</p>
							</div>
							<!-- /BUTON -->
						</div>
						<!-- /TAB BUTON -->
						<!-- TAB BUTON FIYAT LISTESI -->
						<div class="tab-content">
							<!-- FIYAT LISTESI -->
							<div class="transaction-list" style="margin:20px 20px 20px 20px; padding-bottom:0; border-bottom:none">
								<!-- LISTE BASLIK -->
								<div class="transaction-list-header">
									<div class="transaction-list-header-epin2">
										<p class="text-header small">Ürün Adı</p>
									</div>
									<div class="transaction-list-header-degeri">
										<p class="text-header small">Oyun Karşılığı</p>
									</div>
									<div class="transaction-list-header-stok">
										<p class="text-header small">Stok</p>
									</div>
									<div class="transaction-list-header-fiyat3">
										<p class="text-header small">Fiyat</p>
									</div>
									<?php if ($cCek11['tip']=='epin') { ?>
									<div class="transaction-list-header-adet">
										<p class="text-header small">Adet</p>
									</div>
								<?php } ?>
									<div class="transaction-list-header-sepet-ekle">
										<p class="text-header small">İşlem</p>
									</div>
									
								</div>
								<!-- LISTE URUN -->

							

								<!-- LISTE URUN -->

					<?php 



					if ($cCek11['tip']=='gb') {
					$sql1="SELECT * FROM `urun` WHERE kategori_id='$ustId'";
							$res1=$db->query($sql1);
							
						} elseif ($cCek11['tip']=='epin') {
							$sql1="SELECT * FROM `kcurun` WHERE kategori_id='$ustId'";
							$res1=$db->query($sql1);
							

						}

					while($cek=$res1->fetch(PDO::FETCH_ASSOC)) { ?>
						  <form action="netting/kcsiparis.php" method="POST" >
								<div class="transaction-list-item">
									<div class="transaction-list-item-epin2">
										<p class="category "><?=$cek['urun_ad'] ?></p>
									</div>
									<div class="transaction-list-item-degeri">
										<p class="category"><?=$cek['urun_degeri'] ?></p>
									</div>
									<?php if ($cek['urun_stok']==0) { ?>
									<div class="transaction-list-item-stok">
										<p class="category tertiary">Yok</p>
									</div>
								<?php } else { ?> 
									<div class="transaction-list-item-stok">
										<p class="category primary">Var</p>
									</div>

								<?php } ?>
									<div class="transaction-list-item-fiyat3">
										<p class="category"><?=$cek['urun_fiyat'] ?> ₺</p>
									</div>
									<?php if ($cCek11['tip']=='epin') { ?>
									<div class="transaction-list-item-adet">
										<input style="height:30px" type="number" min="1" step="1" value="1" name="adet">


                                                <input type="hidden" name="urun_id"  value="<?php echo $cek['urun_id'] ?>">

                                                <input type="hidden" name="urun_ad"  value="<?php echo $cek['urun_ad']; ?>">
                                                <input type="hidden" name="kategori_id" value="<?php echo $cek['kategori_id']; ?>" >
									</div>
								<?php } ?>
									<div class="transaction-list-item-sob">
										<?php if ($cCek11['tip']=='epin') { ?>
										<button type="submit" name="kcsiparis" class="button mtb-7-5 primary" style="margin-top:9px; width:100%; "><i class="fa fa-cart-arrow-down edit" aria-hidden="true"></i>SATIN AL</button>
										<?php } elseif ($cCek11['tip']=='gb') {  if ($cek['urun_stok']>0) { ?>
											<a href="" style="margin-top:9px; width:100%; " data-ocid="<?php echo $cek['urun_id']; ?>" class="button mtb-7-5 primary   satinAlModal"><span class="fa fa-cart-plus"></span>&nbsp;&nbsp;Satın Al</a>
										<?php } else { ?> 

											<a style="margin-top:9px; width:100%; "  class="button mtb-7-5 tertiary "><span class="fa fa-close"></span>&nbsp;&nbsp;Stok Yok</a>

										<?php } } ?>
									</div>
									<?php 
									 if ($cek['urunsat_durum']==1) {
									if ($cCek11['tip']=='gb') { ?>
									<div class="transaction-list-item-audetay">
										<a href="" style="margin-top:9px; width:100%; " data-bcid="<?php echo $cek['urun_id']; ?>" class="button mtb-7-5 primary  bizeSatBtn"><span class="fa fa-refresh fa-spin"></span> Bize Sat</a>
									</div>
								<?php } } ?>
								</div>

							</form>
						<?php } ?>
								
							</div>							
						</div>
						
						<!-- TAB NASIL ALIRIM -->
						<div class="tab-content">
							<div class="form-box-item full" style="border:none; margin-bottom:0px">
								<p class="primary"><?=$oyunC['kategori_ad'].' '.$cCek11['ad']; ?> nasıl satın alabilirim ?</p></br>
								<p><?=$oyunC['kategori_ad'].' '.$cCek11['ad']; ?> satın alabilmeniz için öncelikle sitemizde yeteri kadar bakiyeniz olması gerekmektedir. Ödeme yaparak bakiyenizi
								yükledikten sonra sipariş vererek 7/24 <?=$oyunC['kategori_ad'].' '.$cCek11['ad']; ?> satın alabilirsiniz. <?=$oyunC['kategori_ad'].' '.$cCek11['ad']; ?> size <?php if($cCek11['tip']=='epin') { echo 'E-Pin kodu olarak'; } elseif ($cCek11['tip']=='gb') { echo 'Oyun içi Para olarak'; } ?> teslim edilmektedir.
                                    <?php if($cCek11['tip']=='epin') { ?> Siparişinizi verdiğiniz anda E-pin kodlarınız siparişlerim sayfasında karşınıza
								cıkacaktır ve kullanıma hazırdır. " <?=$oyunC['kategori_ad'].' '.$cCek11['ad']; ?> kodunu nasıl kullanacağım ? / nasıl yüklerim ? " gibi sorularınızın cevabını kullanım bilgisi bölümünde bulabilirsiniz.<?php } ?></p>
							</div>
						</div>
						
						<!-- TAB NASIL KULLANIRIM -->
						<div class="tab-content">
							<div class="form-box-item full" style="border:none; margin-bottom:0px">
                                <?php if ($cCek11['tip']=='epin') { ?>
								<p class="primary"><?=$cCek11['ad'] ?> nasıl yüklenir ?</p></br>
                                <?php } ?>
								<p><?=$cCek11['kullanim'] ?></p>
							</div>
						</div>
						
						<!-- TAB YORUMLAR -->
						<div class="tab-content">
                            <?php include( "./include/yorum.php" );?>
						</div>
						<!-- /TAB YORUMLAR -->	
					</div>
					<!-- /TAB MENU -->
			</div>
			<!-- /LEFT MENU -->
			
			<!-- RIGHT MENU -->
			<div class="sidebar right">
				<!-- MENU ITEM -->
				<div class="sidebar-item" style="margin-bottom:30px">
					<!-- DROPDOWN -->
					<ul class="dropdown hover-effect interactive">
						<!-- DROPDOWN ITEM -->

						<?php 
						$ID=$oyunC['kategori_id'];
						$oyunK="SELECT * FROM `altkategori` WHERE ustId='$ID'";
						$oyunKs=$db->query($oyunK);
						

						while($oyunKcek=$oyunKs->fetch(PDO::FETCH_ASSOC)) { ?>
						<li class="dropdown-item">
							<a href="urun-<?=seo($oyunKcek['ad']).'-'.$oyunKcek['id'] ?>"><?=$oyunKcek['ad'] ?></a>
						</li>
					<?php } ?>
						
					</ul>
					<!-- /DROPDOWN -->
				</div>
			</div>
        </div>
		<!-- /SECTION -->
	</div>
	<!-- /SECTION WRAP -->
	
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
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Post Tab -->
<script src="js/post-tab2.js"></script>
<!-- XM Pie Chart -->
<script src="js/vendor/jquery.xmpiechart.min.js"></script>
<script src="js/pie-chart-data.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>

<!-- Alert-Data -->
    <!-- Magnific Popup -->
    <script src="js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="js/popup-data.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>

<script src="js/oyunlar-alert-data.js"></script>
<script src="js/popup-data.js"></script>
    <script src="js/alerts.js"></script>
    <script src="js/custom.js"></script>
<!-- Canlı Destek -->
<?php include( "online-destek.php" );?>
</body>
</html>