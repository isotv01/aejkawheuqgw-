<?php include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}

if(isset($_POST["tc_no"])) {
    $client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
    try {


        $result = $client->TCKimlikNoDogrula(array(
            'TCKimlikNo' => $_POST['tc'],
            'Ad' => $_POST['ad'],
            'Soyad' => $_POST['soyad'],
            'DogumYili' => $_POST['dogum']));
        if ($result->TCKimlikNoDogrulaResult) {
            $kullanici_id=$_POST['kullanici_id'];
            $ayarekle=$db->prepare("UPDATE musteri SET
                tc=:tc,
                ad=:ad,
                soyad=:soyad, 
                dogum=:dogum
                WHERE kullanici_id={$_POST['kullanici_id']}");

            $insert=$ayarekle->execute(array(
                'tc' => $_POST['tc'],
                'ad' => $_POST['ad'],
                'soyad' => $_POST['soyad'],
                'dogum' => $_POST['dogum']));


            echo '<script type="text/javascript">alert("Kayıt Başarıyla  yapılmıştır..");</script>';

        } else {
            echo '<script type="text/javascript">alert("Hatalı Bilgi..");</script>';

        }
    } catch (Exception $ex) {
        echo $ex->faultstring;
    }
}

?>

<?php

$currentsub='tcdogrula';
$currentleft='hesabim2';?>
<body>
	<!-- HEADER-ON -->
		<?php include "include/header.php"; ?>
	
	<!-- MOBIL-MENU-ON -->
    <?php include "include/mobilmenu.php"; ?>

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
<?php
$kullanici_id=$kullanicicek['kullanici_id'];
$kullanicisor=$db->prepare("SELECT * FROM musteri where kullanici_id=:id");
$kullanicisor->execute(array(
    'id' => $kullanici_id
));

if (empty($kullanicicek['tc'])) { ?>



			<!-- CONTENT -->
			<div class="content">
				<div class="headline gold">
					<h4>TC Kimlik Doğrulama</h4>
				</div>
				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<form action="tc-kimlik-dogrula.php?tc=onaylandi" method="POST" name="tc" id="profile-info-form">
						<!-- INPUT CONTAINER -->
						<div class="input-container half">
							<label for="new_email" class="rl-label">Adınız</label>
							<input type="text" name="ad" onkeyup="this.value=this.value.buyukHarf()" id="buyuk" required="" >
						</div>
						<!-- /INPUT CONTAINER -->
						
						<!-- INPUT CONTAINER -->
						<div class="input-container half">
							<label for="new_email" class="rl-label">Soyadınız</label>
							<input type="text" name="soyad" onkeyup="this.value=this.value.buyukHarf()" id="buyuk" required="">
						</div>
						<!-- /INPUT CONTAINER -->
						
						<div class="clearfix"></div>
						
						<!-- INPUT CONTAINER -->
						<div class="input-container half">
							<label for="acc_name" class="rl-label required">T.C Kimlik Numarası</label>
							<input type="text" id="acc_name"  name="tc" required="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Örnek 30333030333">
						</div>
						<!-- /INPUT CONTAINER -->
						
						<!-- INPUT CONTAINER -->
						<div class="input-container half">
							<label for="new_email" class="rl-label">Doğum Yılı</label>
							<input type="text" id="new_email" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="dogum" required="" placeholder="Örnek 1980">
						</div>
						<!-- /INPUT CONTAINER -->
                        <div>
                            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'];?>"></input>
                        </div>
						<button type="submit" name="tc_no"  class="button mid blue "><span class="fa fa-check edit3"></span> Kimlik Bilgilerimi Doğrula</button>
					</form>
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- CONTENT -->
<?php } else {
    $kullanici_id=$kullanicicek['kullanici_id'];
    $kullanicisor=$db->prepare("SELECT * FROM musteri where kullanici_id=:id");
    $kullanicisor->execute(array(
        'id' => $kullanici_id
    ));

    ?>

    <div class="content">
        <!-- POST -->
        <article class="post duyuru">
        <div class="duyuru-border">
            <p style="font-size: 20px;">Kullanıcı - <a  class="red"> TC Kimlik Numarası </a> Doğrulama İşlemi Yapılmış.</p>
        </div>
        <div class="clearfix"></div>
        </article>
        <!-- /POST -->
    </div>
            <div class="content">
                <div class="headline gold">
                    <h4>TC Kimlik Doğrulama</h4>
                </div>
    <div class="form-box-item">

            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="new_email" class="rl-label">Adınız</label>
                <input type="text" name="ad" value="<?php echo $kullanicicek['ad'] ?>" onkeyup="this.value=this.value.buyukHarf()" id="buyuk" disabled="" >
            </div>
            <!-- /INPUT CONTAINER -->

            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="new_email" class="rl-label">Soyadınız</label>
                <input type="text" name="soyad" value="<?php echo $kullanicicek['soyad'] ?>" onkeyup="this.value=this.value.buyukHarf()" id="buyuk" disabled="">
            </div>
            <!-- /INPUT CONTAINER -->

            <div class="clearfix"></div>

            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="acc_name" class="rl-label required">T.C Kimlik Numarası</label>
                <input type="text" id="acc_name"  name="tc" value="<?php echo $kullanicicek['tc'] ?>" disabled="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
            </div>
            <!-- /INPUT CONTAINER -->

            <!-- INPUT CONTAINER -->
            <div class="input-container half">
                <label for="new_email" class="rl-label">Doğum Yılı</label>
                <input type="text" id="new_email" value="<?php echo $kullanicicek['dogum'] ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="dogum" disabled=""  >
            </div>
        <!-- /INPUT CONTAINER -->
        <div>
            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'];?>"></input>
        </div>
        <button  style="color: black;"  class="button mid grey "><span class="fa fa-check edit3"></span> DOĞRULANMIŞ </button>

    </div>
                <!-- /FORM BOX ITEM -->
            </div>
<?php } ?>

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

        <script type="text/javascript">

            String.prototype.buyukHarf=function() {

                var str = [];
                for(var i = 0; i < this.length; i++) {
                    var ch = this.charCodeAt(i);
                    var c = this.charAt(i);
                    if(ch == 105) str.push('İ');
                    else if(ch == 305) str.push('I');
                    else if(ch == 287) str.push('Ğ');
                    else if(ch == 252) str.push('Ü');
                    else if(ch == 351) str.push('Ş');
                    else if(ch == 246) str.push('Ö');
                    else if(ch == 231) str.push('Ç');
                    else if(ch >= 97 && ch <= 122) str.push(c.toUpperCase());
                    else str.push(c);
                }
                return str.join('');
            }

        </script>
        <?php  if ($_GET['durum']=="tcgerekli") {?>
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
                    paragraph: 'İşlem yapabilmek için önce TC Kimlik NO doğrulamalısınız.',
                });
            </script>
        <?php } ?>
</body>
</html>