<?php 
include 'head.php';
include "fonksiyon.php";

$currentsub='nakitcekim';
$currentleft='hesabim3';


if(!uyeCek()){
    header("location:index.php");
    exit;
}

$kullanicisor=$db->prepare("SELECT * FROM musteri where kullanici_mail=:mail");
$kullanicisor->execute(array(
    'mail' => $_SESSION['userkullanici_mail']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

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
				<!-- POST -->
				<article class="post duyuru">
					<div class="duyuru-border">
					<p>Sadece kendi adınıza kayıtlı veya soy isminiz aynı olduğu birinci derece akrabalarınızın banka hesaplarına ödeme yapılır üçüncü şahısların hesaplarına ödeme yapılmamaktadır. Lütfen ödeme talebinde bulunurken bunu göz önünde bulundurunuz...</p>
					</div>
				</article>
                <?php if (@$_GET['durum']=="tconay") { ?>
                <article class="post duyuru">
                    <div class="duyuru-border">
                        <p><a style="font-size: 30px;" class="red">TC Kimlik Onayı Gerekmektedir.</a></p>
                    </div>
                </article>
                <?php  } elseif (@$_GET['durum']=="yetersizbakiye"){ ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="red">Yetersiz Bakiye.</a></p>
                        </div>
                    </article>
                <?php } elseif (@$_GET['durum']=="min4") { ?>
                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p><a style="font-size: 30px;" class="red">Minimum Çekilebilir Tutar = 4 TL</a></p>
                        </div>
                    </article>
                <?php } ?>
				<!-- /POST -->
			</div>
			<!-- CONTENT -->
			
			<!-- CONTENT -->
			<div class="content">
				<!-- FORM BOX ITEMS -->
				<div class="form-box-item full">
					<!-- POST TAB -->
					<div class="post-tab xmtab" style="display: block;">
						<!-- TAB HEADER -->
						<div class="tab-header primary">
							<!-- TAB ITEM -->
							<div class="tab-item selected">
								<p class="text-header small">Nakit Talep Et</p>
							</div>
							<!-- /TAB ITEM -->

							<!-- TAB ITEM -->
							<div class="tab-item">
								<p class="text-header small">Banka Hesabı Ekle</p>
							</div>
							<!-- /TAB ITEM -->

							<!-- TAB ITEM -->
							<div class="tab-item">
								<p class="text-header small">Banka Hesaplarım</p>
							</div>
							<!-- /TAB ITEM -->
						</div>
						<!-- /TAB HEADER -->

						<!-- TAB CONTENT -->
                        <?php $kullanici_id=$kullanicicek['kullanici_id'];
                        $bankasor=$db->prepare("SELECT * FROM kullanicibanka where kullanici_id=:id order by banka_id DESC");
                        $bankasor->execute(array(
                        'id' => $kullanici_id
                        ));

                        $bankacek=$bankasor->fetch(PDO::FETCH_ASSOC) ; ?>


						<div class="tab-content void open"><br>
                            <form action="netting/cekimtalep.php" method="POST">
							<!-- INPUT CONTAINER -->
							<div class="input-container">
								<label for="files_included" class="rl-label required">Havale-Eft Yapılacak Banka</label>
								<label for="category" class="select-block">
									<select name="banka_ad" id="category">
                                        <?php
                                        $kullanici_id=$kullanicicek['kullanici_id'];
                                        $bankasor=$db->prepare("SELECT * FROM kullanicibanka where kullanici_id=:id order by banka_id DESC");
                                        $bankasor->execute(array(
                                            'id' => $kullanici_id
                                        ));
                                        while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $bankacek['banka_ad'] ?>"><?php echo $bankacek['banka_ad'] ?></option>
                                            <?php } ?>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</div>
							<!-- /INPUT CONTAINER -->

                            <br>

                            <!-- INPUT CONTAINER -->
                        <div id="cek">
                            <div class="input-container half">
                                <label for="files_included" class="rl-label">Çekilebilir Bakiye</label>
                                <input type="text" id="files_included"  value="<?php echo $kullanicicek['kullanici_bakiyecekilebilir']; ?> ₺" readonly="">
                            </div>

                            <!-- /INPUT CONTAINER -->
                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label required">Çekmek İstediğiniz Tutar</label>
                                <input type="text" id="cekilecek" name="cekilecek" placeholder="00.00">
                            </div>
                            <!-- /INPUT CONTAINER -->
                            <div class="clearfix"></div>

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label required">Havale / EFT Kesinti Tutarı</label>
                                <input type="text" id="kesinti" name="kesinti" value="3.00" readonly="">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label">Hesabınıza Geçecek Tutar</label>
                                <input type="text" id="tutar" name="tutar" placeholder="0.00" readonly="">
                            </div>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                               <?php  $bankasor=$db->prepare("SELECT * FROM kullanicibanka where kullanici_id=:id order by banka_id DESC");
                                $bankasor->execute(array(
                                'id' => $kullanici_id
                                ));

                                $bankacek=$bankasor->fetch(PDO::FETCH_ASSOC) ; ?>
                                <input type="hidden" id="files_included" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>" readonly="">
                                <input type="hidden" id="files_included" name="banka_iban" value="<?php echo $bankacek['banka_iban']; ?>" readonly="">
                                <input type="hidden" id="files_included" name="banka_hesapadsoyad" value="<?php echo $bankacek['banka_hesapadsoyad']; ?>" readonly="">


                                <div class="input-container">

                                    <button type="submit" class="button mid blue" name="cekimtalep" ><span class="fa fa-check edit3"></span>Nakit Talep Et</button>
                                </div




                                >
                        </form>
                        </div>





                            <!-- /INPUT CONTAINER -->
                            <!-- /INPUT CONTAINER -->
						<!-- /TAB CONTENT -->

						<!-- TAB CONTENT -->
						<div class="tab-content void closed"><br>
                            <form action="netting/banka.php" method="POST">
                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
							<!-- INPUT CONTAINER -->
							<div class="input-container">
								<label for="files_included" class="rl-label required">Banka Adı </label>
								<input type="text" id="files_included" name="banka_ad" placeholder="Örnek : Türkiye İş Bankası ">
							</div>
							<!-- /INPUT CONTAINER -->
								
							<!-- INPUT CONTAINER -->
							<div class="input-container">
								<label for="files_included" class="rl-label required">Hesap Sahibi Adı Soyadı </label>
								<input type="text" id="files_included" name="banka_hesapadsoyad" placeholder="İSİM SOYİSİM">
							</div>
							<!-- /INPUT CONTAINER -->
									
							<!-- INPUT CONTAINER -->
							<div class="input-container">
								<label for="files_included" class="rl-label required">IBAN Numaranız </label>
								<input type="text" id="files_included" name="banka_iban" placeholder="TR00 0000 0000 0000 0000 0000 00">
							</div>
							<!-- /INPUT CONTAINER -->
                                <button type="submit" class="button mid blue" name="bankakaydet" ><span class="fa fa-check edit3"></span>Banka Hesabı Ekle</button>

                            </form>
						</div>
						<!-- /TAB CONTENT -->


								
						<!-- TAB CONTENT -->
						<div class="tab-content void closed"><br>
							<!-- TRANSACTION LIST -->
							<div class="transaction-list">
								<!-- TRANSACTION LIST HEADER -->
								<div class="transaction-list-header">
									<div class="transaction-list-header-banka">
										<p class="text-header small">Banka</p>
									</div>
									<div class="transaction-list-header-isim">
										<p class="text-header small">İsim Soyisim</p>
									</div>
									<div class="transaction-list-header-iban">
										<p class="text-header small">IBAN</p>
									</div>
									<div class="transaction-list-header-sil">
										<p class="text-header small"></p>
									</div>
								</div>
								<!-- /TRANSACTION LIST HEADER -->
                                <?php $kullanici_id=$kullanicicek['kullanici_id'];
                                $bankasor=$db->prepare("SELECT * FROM kullanicibanka where kullanici_id=:id order by banka_id DESC");
                                $bankasor->execute(array(
                                    'id' => $kullanici_id
                                ));

                                while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
								<!-- TRANSACTION LIST ITEM -->
								<div class="transaction-list-item">
									<div class="transaction-list-item-banka">
										<p class="category green"><?php echo $bankacek['banka_ad'] ?></p>
									</div>
									<div class="transaction-list-item-isim">
										<p class="category green"><?php echo $bankacek['banka_hesapadsoyad'] ?></p>
									</div>
									<div class="transaction-list-item-iban">
										<p class="category green"><?php echo $bankacek['banka_iban'] ?></p>
									</div>
									<div class="transaction-list-item-sil">
										<a href="netting/banka.php?banka_id=<?php echo $bankacek['banka_id']; ?>&bankasil=ok" class="button tertiary" style="margin-top:9px; width:100%;">SİL</a>
									</div>
								</div>
								<!-- /TRANSACTION LIST ITEM -->
                 <?php } ?>
							</div>
						</div>
						<!-- /TAB CONTENT -->
					</div>
					<!-- /POST TAB -->
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
<script src="js/post-tab2.js"></script>
        <script>
            $( "body" ).on( "keyup", "#cek #cekilecek", function(button) {

                console.log(this);
                var cekilecek= $("#cek input[name=cekilecek]").val();
                var kesinti=$("#cek input[name=kesinti]").val();


                var hesaplama=(cekilecek-kesinti).toFixed(2);

                $("#cek input[name=tutar]").val(hesaplama);
            });
            $( "body" ).on( "change", "#cek #cekilecek", function(button) {

                console.log(this);
                var cekilecek= $("#cek input[name=cekilecek]").val();
                var kesinti=$("#cek input[name=kesinti]").val();


                var hesaplama=(cekilecek-kesinti).toFixed(2);

                $("#cek input[name=tutar]").val(hesaplama);
            });



        </script>


</body>
</html>