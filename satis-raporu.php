<?php include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}
$currentsub='satisr';
$currentleft='tedarik';
 ?>
<body>
	<!-- HEADER-ON -->
		<?php include "include/header.php"; 
if ($kullanicicek['tedarikci']==0) {
	Header("Location:index.php?tedarikci=degil");
}
		?>
	
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v3">
		<div class="section-headline">
			<h2>Kullanıcı Paneli</h2>
			<p>Anasayfa<span class="separator">/</span><span class="current-section">Kullanıcı Paneli</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section full">
			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio">
					<?php include "user-side.php"; ?>
					<!-- DROPDOWN -->
					<?php include( "./include/left-menu-panel.php" );?>	
					<!-- /DROPDOWN -->		
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->
			
			<!-- CONTENT -->
			<div class="content">
				<!-- POST -->
				
				<!-- /POST -->
			</div>
			<!-- CONTENT -->
			
			<!-- CONTENT -->
			<div class="content">
				<div class="headline gold">
					<h4>Satış Raporları</h4>
				</div>
				<!-- FORM BOX ITEM -->
		
				<?php 

				if (isset($_POST['sec'])) {
					$altId=$_POST['qr'];

					$sql="SELECT * FROM `tedarikciler` WHERE altkategori_id='$altId'";
					$res=$db->query($sql);
				

				?>
		<div class="form-box-item full">	
				<h4><?php 

							$alt1="SELECT * FROM `altkategori` WHERE id='$altId'";
							$alt1=$db->query($alt1);
							$altCek1=$alt1->fetch(PDO::FETCH_ASSOC);
							

							$ustId=$altCek1['ustId'];
							$ust="SELECT * FROM `kategori` WHERE kategori_id='$ustId'";
							$ust=$db->query($ust);
							$ustCek=$ust->fetch(PDO::FETCH_ASSOC);
							echo $ustCek['kategori_ad'].' '.$altCek1['ad'];
							?>
							Satış Raporları
							</h4>				
				<!-- TRANSACTION LIST -->
				<div class="transaction-list">
					<!-- TRANSACTION LIST HEADER -->
					<div class="transaction-list-header">
						<div style="margin-left: 2%" class="transaction-list-header-tarih">
							<p class="text-header small">Kategori</p>
						</div>
						<div style="margin-left: 10%" class="transaction-list-header-tarih">
							<p class="text-header small">Tedarikçi Ortak</p>
						</div>
						<div style="margin-left: 10%" class="transaction-list-header-utipi">
							<p class="text-header small">Yüzde</p>
						</div>
						<div style="margin-left: -20%" class="transaction-list-header-adet">
							<p class="text-header small">Kazanç</p>
						</div>
						
					</div>
					<!-- /TRANSACTION LIST HEADER -->
					<?php 

					while($ceq=$res->fetch(PDO::FETCH_ASSOC)) {

					 ?>
					<!-- TRANSACTION LIST ITEM -->
					<div class="transaction-list-item">
						<div style="margin-left: 2%" class="transaction-list-item-tarih">
							<p class="category primary"><?php 

							$alt="SELECT * FROM `altkategori` WHERE id='$altId'";
							$alt=$db->query($alt);
							$altCek=$alt->fetch(PDO::FETCH_ASSOC);
							echo $altCek['ad'];
							?></p>
						</div>
						<div style="margin-left: 10%" class="transaction-list-item-tarih">
							<p class="category primary"><?php 
							$usId=$ceq['user_id'];
							$user="SELECT * FROM `musteri` WHERE kullanici_id='$usId'";
							$user=$db->query($user);
							$userCek=$user->fetch(PDO::FETCH_ASSOC);
							echo $userCek['ad'].' '.$userCek['soyad'];
							?></p>
						</div>
						<div style="margin-left: 10%" class="transaction-list-item-utipi">
							<p class="category primary">% <?=$ceq['pay']; ?></p>
						</div>
						<div style="margin-left: -20%" class="transaction-list-item-adet">
							<p class="category primary"><?php 

							$Fiyat=$db->prepare("SELECT SUM(siparis_toplam) AS a FROM kcsiparis WHERE kullanici_id='$usId' and kategori_id='$altId' and siparis_durum='2'");
							$Fiyat->execute();
							$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);
							$tutar=$FiyatYaz['a'];
							$yeniTutar=$tutar*$ceq['pay']/100;
							echo $yeniTutar;

							?> ₺</p>
						</div>
						
					</div>
				<?php } ?>
					<!-- /TRANSACTION LIST ITEM -->
					<!-- TRANSACTION LIST ITEM -->
					
					<!-- /TRANSACTION LIST ITEM -->
				</div>
				<!-- /TRANSACTION LIST -->
				</div>
<?php } ?>
		
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- CONTENT -->
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
<!-- XM LineFill -->
<script src="js/vendor/jquery.xmlinefill.min.js"></script>
<!-- Badges -->
<script src="js/badges.js"></script>
</body>
</html>