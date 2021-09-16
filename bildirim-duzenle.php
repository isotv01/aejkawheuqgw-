<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="css/vendor/tooltipster.css">
	<link rel="stylesheet" href="css/vendor/magnific-popup.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/social-1.css">
	<link rel="stylesheet" href="css/font-fa/css/font-awesome.css">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>Knight Online PVP Server Market | Gold Bar | İtem | Karakter</title>
</head>
<body>
	
	<!-- HEADER-ON -->
		<?php include( "./include/header.php");?>
	
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v3">
		<div class="section-headline">
			<h2>Bildirim Düzenle</h2>
			<p>Anasayfa<span class="separator">/</span>Kullanıcı Paneli<span class="separator">/</span><span class="current-section">Bildirim Düzenle</span></p>
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
					<a href="bakiye_yukle.php" class="button primary"><span class="fa fa-credit-card edit3"></span>BAKİYE YÜKLE</a>
					<div class="clearfix"></div>
					<hr class="line-separator">			
				<!-- DROPDOWN -->
				<?php include( "./include/left-menu-panel.php" );?>	
				<!-- /DROPDOWN -->		
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->	
			
			<div class="content">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<form id="profile-info-form">
					<!-- INPUT CONTAINER -->
					<div class="input-container">
						<label class="rl-label "><span class="fa fa-mobile edit"></span>SMS Bildirimleri</label>
						<hr class="line-separator2">
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Nakit Talebi Mesajı ] Yaptığınız nakit talep işlemleri onaylandığında sms bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping2" name="copy_shipping2">
						<label for="copy_shipping2" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Ödeme Mesajı ] Ödeme onayında sms bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ E-Bülten Mesajı ] İndirim ve Kampanyalardan haberdar olmanızı sağlar.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping12" name="copy_shipping1">
						<label for="copy_shipping12" class="label-check">
							<span class="checkbox secondary"><span></span></span>
							[ Özel Mesaj ] Diğer kullanıcılardan gelen mesajı sms bildirimi gönderir.<span style="margin-left:10px;">0.10 TL ( Her Bir Mesaj İçin )</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Takip Mesajı ] Sizi takip eden diğer kullanıcılara yeni eklediğiniz ilanları sms bildirimi gönderir.<span style="margin-left:10px;">3.0 TL ( Her Bir İlan İçin )</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Favori Mesajı ] Favorilere eklenen ilanınızda yaptığınız indirim ve değişikleri sms bildirimi gönderir.<span style="margin-left:10px;">3.0 TL ( Her Bir İndirim & Değişiklik İçin )</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Yorum Mesajı ] İlanlarınıza yapılan yorumları sms bildirimi gönderir.<span style="margin-left:10px;">0.10 TL ( Her Bir Yorum İçin )</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<hr class="line-separator2">
						<label class="rl-label "><span class="fa fa-envelope edit"></span>E-Posta Bildirimleri</label>
						<hr class="line-separator">
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Kod Bildirimi ] Aldığınız ürün kodlarını e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Nakit Talebi Mesajı ] Yaptığınız nakit talep işlemleri onaylandığında e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ E-Bülten Mesajı ] İndirim ve Kampanyalardan haberdar olmanızı sağlar.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Ödeme Mesajı ] Ödeme onayında e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Özel Mesaj ] Diğer kullanıcılardan mesaj geldiğinde e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Takip Mesajı ] Takip ettiğiniz diğer kullanıcılar yeni ilan eklediğinde e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Favori Mesajı ] Favorilerilerinize eklediğiniz ilanlarda yapılan indirim ve değişikliklerde e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
						<!-- CHECKBOX -->
						<input type="checkbox" form="profile-info-form" id="copy_shipping1" name="copy_shipping1">
						<label for="copy_shipping1" class="label-check">
							<span class="checkbox primary"><span></span></span>
							[ Yorum Mesajı ] İlanlarınıza yapılan yorumu e-posta bildirimi gönderir.<span style="margin-left:10px;">ÜCRETSİZ</span>
						</label>
						<!-- /CHECKBOX -->
						<hr class="line-separator2">
						
					</div>
					<!-- /INPUT CONTAINER -->
	
					<button class="button mid dark"><span class="primary"><span class="fa fa-pencil edit3"></span>Güncelle</span></button>
					</form>
				</div>
				<!-- /FORM BOX ITEM -->
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