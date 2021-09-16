
<?php include 'head.php'; ?>
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

	<!-- SECTION -->
	<div class="section-wrap">

		<!-- /SECTION -->
		<div class="section" style="padding:20px 0 0;">
            <!-- GOLD BAR CAROUSEL -->
            <div id="ew1-cmrf-controls" class="carousel-match-result-wrap yoket">
                <!-- MATCH SELECTOR -->
                <div class="match-selector server">
                    <!-- DROPDOWN SIMPLE WRAP -->
                    <div class="dropdown-simple-wrap" style="position: relative;">
                        <!-- DP CURRENT OPTION -->
                        <div id="ew1-match-selector-dropdown-trigger" class="dp-current-option">
                            <!-- DP CURRENT OPTION VALUE -->
                            <div id="ew1-match-selector-dropdown-option-value" class="dp-current-option-value">
                                <p style="font-size: large; margin-top: 25%;" class="dp-option-text"><a style="color: #9a8400;">gold bar</a><br>borsası</p>
                            </div>
                            <!-- /DP CURRENT OPTION VALUE -->
                        </div>
                        <!-- /DP CURRENT OPTION -->
                    </div>
                    <!-- /DROPDOWN SIMPLE WRAP -->

                    <!-- CONTROL PREVIOUS -->

                    <!-- /CONTROL PREVIOUS -->
                </div>
                <!-- /MATCH SELECTOR -->

                <!-- CAROUSEL MATCH RESULT -->
                <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    jssor_1_slider_init = function() {

                        var jssor_1_options = {
                            $AutoPlay: 1,
                            $Idle: 0,
                            $SlideDuration: 5000,
                            $SlideEasing: $Jease$.$Linear,
                            $PauseOnHover: 4,
                            $SlideWidth: 275,
                            $Align: 0
                        };

                        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                        /*#region responsive code begin*/

                        var MAX_WIDTH = 1170;

                        function ScaleSlider() {
                            var containerElement = jssor_1_slider.$Elmt.parentNode;
                            var containerWidth = containerElement.clientWidth;

                            if (containerWidth) {

                                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                                jssor_1_slider.$ScaleWidth(expectedWidth);
                            }
                            else {
                                window.setTimeout(ScaleSlider, 30);
                            }
                        }

                        ScaleSlider();

                        $Jssor$.$AddEvent(window, "load", ScaleSlider);
                        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                        /*#endregion responsive code end*/
                    };
                </script>
                <style>
                    /*jssor slider loading skin spin css*/
                    .jssorl-009-spin img {
                        animation-name: jssorl-009-spin;
                        animation-duration: 1.6s;
                        animation-iteration-count: infinite;
                        animation-timing-function: linear;
                    }

                    @keyframes jssorl-009-spin {
                        from { transform: rotate(0deg); }
                        to { transform: rotate(360deg); }
                    }

                    @media only screen and (max-width: 1350px) {
                        .yoket {
                            display: none;
                        }
                    }
                </style>
                <div id="jssor_1" style="margin:0 auto;top:0px;left:0px;width:1170px;height:40px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->


                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:192px;width:1170px;height:70px;overflow:hidden;">
                        <?php $urunsorcarosel=$db->prepare("SELECT * FROM urun order by urun_sira ASC");
                        $urunsorcarosel->execute();
                        while($uruncekcarosel=$urunsorcarosel->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div  class="carousel-match-result-item">
                                <?php
                                $katIDd = $uruncekcarosel['kategori_id'];
                                $katSor = $db->prepare("SELECT * FROM altkategori WHERE id = ? ");
                                $katSor->execute(array(
                                    $katIDd
                                ));
                                $katCek = $katSor->fetch(PDO::FETCH_ASSOC);

                                ?>
                                <div style="width: 300px; " class="widget-match-result server">
                                    <a href="urun-<?=seo($katCek["ad"]).'-'.$katCek["id"]?>" class="widget-match-result-item server-name">
                                        <div style="width:100px;" class="team-info-wrap server-name">
                                            <div class="team-info server-name">
                                                <p class="team-name"><?php



                                                    $ustKatID= $katCek['ustId'];
                                                    $ustBorsa="SELECT * FROM `kategori` WHERE kategori_id='$ustKatID'";
                                                    $ustBorsa=$db->query($ustBorsa);
                                                    $ustkatCek = $ustBorsa->fetch(PDO::FETCH_ASSOC);
                                                    echo $ustkatCek['kategori_ad'];
                                                    ?></p>
                                                <?php if ($uruncekcarosel['urun_degeri']=="Silver Bar(10M)") { ?>
                                                    <p class="team-country"><?php echo $uruncekcarosel['urun_degeri'] ?></p>
                                                <?php } else { ?>
                                                    <p style="color: #9a8400;" class="team-country"><?php echo $uruncekcarosel['urun_degeri'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div  class="team-info-wrap gb-sel">
                                            <div class="team-info sel">
                                                <p class="team-name"><?php echo $uruncekcarosel['bizesat_fiyat'] ?> <i class="fa fa-try" aria-hidden="true"></i></p>
                                                <p class="team-country down"><i class="icon-arrow-down price-down"></i>ALIŞ</p>
                                            </div>
                                        </div>
                                        <div style="margin-left: -10px;" class="team-info-wrap gb-buy">
                                            <div class="team-info buy">
                                                <p class="team-name"><?php echo $uruncekcarosel['urun_fiyat'] ?> <i class="fa fa-try" aria-hidden="true"></i></p>
                                                <p class="team-country"><i class="icon-arrow-up price-up"></i>SATIŞ</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        <?php } ?>
                        <?php $urunsorcarosel=$db->prepare("SELECT * FROM urun order by urun_sira ASC");
                        $urunsorcarosel->execute();
                        while($uruncekcarosel=$urunsorcarosel->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="carousel-match-result-item">
                                <?php
                                $katIDd = $uruncekcarosel['kategori_id'];
                                $katSor = $db->prepare("SELECT * FROM altkategori WHERE id = ? ");
                                $katSor->execute(array(
                                    $katIDd
                                ));
                                $katCek = $katSor->fetch(PDO::FETCH_ASSOC);

                                ?>
                                <div style="width: 300px; " class="widget-match-result server">
                                    <a href="urun-<?=seo($katCek["ad"]).'-'.$katCek["id"]?>" class="widget-match-result-item server-name">
                                        <div style="width:100px;" class="team-info-wrap server-name">
                                            <div class="team-info server-name">
                                                <p class="team-name"><?php



                                                    $ustKatID= $katCek['ustId'];
                                                    $ustBorsa="SELECT * FROM `kategori` WHERE kategori_id='$ustKatID'";
                                                    $ustBorsa=$db->query($ustBorsa);
                                                    $ustkatCek = $ustBorsa->fetch(PDO::FETCH_ASSOC);
                                                    echo $ustkatCek['kategori_ad'];
                                                    ?></p>
                                                <?php if ($uruncekcarosel['urun_degeri']=="Silver Bar(10M)") { ?>
                                                    <p class="team-country"><?php echo $uruncekcarosel['urun_degeri'] ?></p>
                                                <?php } else { ?>
                                                    <p style="color: #9a8400;" class="team-country"><?php echo $uruncekcarosel['urun_degeri'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div  class="team-info-wrap gb-sel">
                                            <div class="team-info sel">
                                                <p class="team-name"><?php echo $uruncekcarosel['bizesat_fiyat'] ?> <i class="fa fa-try" aria-hidden="true"></i></p>
                                                <p class="team-country down"><i class="icon-arrow-down price-down"></i>ALIŞ</p>
                                            </div>
                                        </div>
                                        <div style="margin-left: -10px;" class="team-info-wrap gb-buy">
                                            <div class="team-info buy">
                                                <p class="team-name"><?php echo $uruncekcarosel['urun_fiyat'] ?> <i class="fa fa-try" aria-hidden="true"></i></p>
                                                <p class="team-country"><i class="icon-arrow-up price-up"></i>SATIŞ</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        <?php } ?>
                    </div>

                </div>

                <!-- /CAROUSEL MATCH RESULT -->

                <!-- CONTROL NEXT -->

                <!-- /CONTROL NEXT -->
            </div>
            <!-- /GOLD BAR CAROUSEL -->
			<?php include 'usturun.php'; ?>

			<!-- SLIDE SHOW -->
			<?php include 'slider.php'; ?>

			<!-- OYUNLAR MENU -->
			<div class="sidebar right">
				
				<!-- HIZLI SATIŞ ITEM -->
				<?php include 'rightopsat.php'; ?>
				
				<!-- MENU ITEM -->
				<?php include 'oyunlarmenu.php'; ?>
				
				<!-- HABERLER ITEM -->
				<?php include 'haberlermenu.php'; ?>
			</div>
			
			<!-- POPÜLER URUNLER -->
			<?php include 'populerurunler.php'; ?>
			
			<!-- INDIRIMLI URUNLER -->
			<?php include 'indirimliurunler.php'; ?>
			
			<!-- KAMPANYALAR -->
			
			
			<div class="clearfix"></div>
			
			<!-- PRODUCT SIDESHOW -->
			<?php include 'sonalinan.php'; ?>
		
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
    <!-- GB BORSASI -->
    <script type="text/javascript">jssor_1_slider_init();</script>
<!-- jQuery -->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>

<!-- Post Tab -->
<script src="js/post-tab2.js"></script>
<!-- Owl Carousel -->
<script src="js/vendor/owl.carousel.min.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Home -->
<script src="js/home.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>

<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>

<!-- Social -->
<script src="js/vendor/jquery.mousewheel.js" type="text/javascript"></script>
<!-- Oyun Arama -->
<script>
	function myFunction() {
		var input, filter, ul, ul, ul, li, a, i;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		ul = document.getElementById("myUL");
		li = ul.getElementsByTagName("li");
		for (i = 0; i < li.length; i++) {
			a = li[i].getElementsByTagName("a")[0];
			if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
				li[i].style.display = "";
			} else {
				li[i].style.display = "none";

			}
		}
	}
</script>
<!-- Slider -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/skdslider.min.js"></script>
<script src="js/slider-data.js"></script>
    <!-- Alert-Data -->
    <script src="js/vendor/jquery.xmalert.min.js"></script>

    <script src="js/alerts.js"></script>
<!-- Canlı Destek -->
	<?php include( "online-destek.php" );?>
</body>
</html>

<?php
if(isset($_GET['durum'])){
    if($_GET['durum']=="basariligiris"){
        ?>

        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageSuccess',
                title: 'Onay Mesajı',
                paragraph: 'Giriş İşlemi Başarılı!',
            });
        </script>
    <?php } elseif ($_GET['durum']=="basarisizgiris") { ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Giriş İşlemi Başarısız!<br><br> Aktivasyon işlemi yapılmamış veya bilgileriniz hatalı',

            });
        </script>
    <?php }  } ?>


<?php
if(isset($_GET['durum'])){
    if($_GET['durum']=="kayitbasarili"){
        ?>

        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageSuccess',
                title: 'Onay Mesajı',
                paragraph: 'Kayıt İşlemi Başarılı! Lütfen E-Postanıza gelen mail ile üyeliğinizi aktif ediniz.',
            });
        </script>
    <?php } elseif ($_GET['durum']=="mukerrerkayit") { ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Bu E-Posta daha önce kullanılmış.',
            });
        </script>

    <?php } elseif ($_GET['durum']=="farklisifre") { ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Şifreler uyuşmuyor.',
            });
        </script>

    <?php } } ?>
<?php
if(isset($_GET['durum'])){
    if($_GET['durum']=="exit"){
        ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Çıkış işlemi başarılı.',
            });
        </script>
    <?php } } ?>

<?php
if(isset($_GET['aktivasyon'])){
    if($_GET['aktivasyon']=="bos"){
        ?>

        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Aktivasyon kodu boş olamaz.',
            });
        </script>
    <?php }elseif($_GET['aktivasyon']=="basarili"){ ?>

        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageSuccess',
                title: 'Onay Mesajı',
                paragraph: 'Aktivasyon İşlemi Başarılı! Keyifli Alışverişler...',
            });
        </script>
    <?php } elseif($_GET['aktivasyon']=="kullanilmiskod") { ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Aktivasyon kodu daha önce kullanılmış.',
            });
        </script>

    <?php } } ?>

<?php  if ($_GET['durum']=="girisgerekli") {?>
    <script>
        $('body').xmalert({
            x: 'right',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageError',
            title: 'Onay Mesajı',
            paragraph: 'Sipariş verebilmek için önce giriş yapmalısınız.',
        });
    </script>
<?php } ?>

<?php  if ($_GET['durum']=="telaktivyok") {?>
    <script>
        $('body').xmalert({
            x: 'right',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageError',
            title: 'Onay Mesajı',
            paragraph: 'Alış-Veriş-Ödeme Yapabilmek için Telefon numaranızı doğrulamalısınız.',
        });
    </script>
<?php } ?>


<?php if ($_GET['durum']=="gonderildi") { ?>

    <script>
        $('body').xmalert({
            x: 'right',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageSuccess',
            title: 'Onay Mesajı',
            paragraph: 'Sıfırlama E-Postası başarıyla gönderilmiştir. Spam klasörünü kontrol etmeyi unutmayın..',
        });
    </script>
<?php } ?>
