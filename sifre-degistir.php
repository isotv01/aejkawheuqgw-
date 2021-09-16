<?php 
include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}

$currentsub='sifredegistir';
$currentleft='hesabim2';


?>


<body>
	<!-- HEADER-ON -->
		<?php include "include/header.php"; ?>
	
	<!-- MOBIL-MENU-ON -->
		<?php include( "./include/mobilmenu.php");?>

	<!-- MENU-ON -->
		<?php include( "./include/menu.php");?>
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v3">
		<div class="section-headline">
			<h2>Kullanıcı Paneli</h2>
			<p>Anasayfa<span class="separator-10">/</span><span class="current-section">Kullanıcı Paneli</span></p>
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
				<div class="headline gold">
					<h4>Şifremi Değiştir</h4>
				</div>
                <?php if (@$_GET['durum']=="sifredegisti") { ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="green">Şifrenizi başarıyla değiştirdiniz.</a></p>
                        </div>
                    </article>
                <?php  } elseif (@$_GET['durum']=="eskisifrehata"){ ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="red">Şifreniz eksik veya hatalı.</a></p>
                        </div>
                    </article>
                <?php } elseif (@$_GET['durum']=="eksiksifre") { ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="red">Şifreniz minimum 6 karakterden oluşmalıdır.</a></p>
                        </div>
                    </article>
                <?php } elseif (@$_GET['durum']=="no") { ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="red">Hata : Şifreniz değiştirilemedi.</a></p>
                        </div>
                    </article>
                <?php } elseif (@$_GET['durum']=="sifreleruyusmuyor") { ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="red">Girdiğiniz şifreler uyuşmuyor.</a></p>
                        </div>
                    </article>
                <?php } ?>
				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<form action="netting/sifreguncelle.php" method="POST" id="profile-info-form">
						<!-- INPUT CONTAINER -->
						<div class="input-container ">
							<label for="files_included" class="rl-label required">Şuanki Şifreniz </label>
							<input type="text" id="files_included" name="kullanici_eskipassword" placeholder="Lütfen şuanki şifrenizi girin...">
						</div>
						<!-- /INPUT CONTAINER -->
						
						<!-- INPUT CONTAINER -->
						<div class="input-container ">
							<label for="files_included" class="rl-label required">Yeni Şifreniz </label>
							<input type="text" id="files_included" name="kullanici_passwordone" placeholder="Lütfen yeni şifrenizi girin...">
						</div>
						<!-- /INPUT CONTAINER -->
						
						<!-- INPUT CONTAINER -->
						<div class="input-container ">
							<label for="files_included" class="rl-label required">Yeni Şifreniz Tekrar </label>
							<input type="text" id="files_included" name="kullanici_passwordtwo" placeholder="Lütfen yeni şifrenizi tekrar girin...">
						</div>
                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
						<!-- /INPUT CONTAINER -->
                        <button type="submit" name="kullanicisifreguncelle"  class="button mid blue "><span class="fa fa-check edit3"></span> Şifremi Güncelle</button>


					</form>
				</div>
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
</body>
</html>