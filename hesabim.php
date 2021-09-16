<?php include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}

$currentleft='hesabim';
?>
<body>
	
	<!-- POP-UP-ON -->
		<?php include( "./include/siparis-detay-popup.php");?>
		<?php include( "./include/siparis-detay-karakter-popup.php");?>
	
	<!-- HEADER-ON -->
		<?php include( "./include/header.php");?>
	
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
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio">
					<!-- USER AVATAR -->
					<?php include 'user-side.php' ?>			
					
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
                    <h4>Hesap Bilgilerim</h4>
                </div>
				<!-- POST -->
				<?php if (empty($kullanicicek['tc'])) { ?>
				<article class="post" style="padding:15px 15px 15px">
					<div class="duyuru-border">
				<h3><p class="text-header tertiary" style="margin-bottom:10px; margin-top:10px;">UYARI !!!</p></h3>
				<p style="font-size:0.875em;line-height:24px; margin-bottom:10px; text-align:center;">
				Kimlik bilgileriniz 27 Haziran 2013'te yürürlüğe giren 6493 sayılı 
				<a href="https://www.bddk.org.tr/WebSitesi/turkce/Mevzuat/Odeme_Hizmetleri_Kanunu/Odeme_Hizmetleri_Kanunu.aspx" class="tertiary">" Ödeme ve Menkul Kıymet Muhabakat Sistemleri, Ödeme Hizmetleri ve Elektronik Para Kurulaşları Hakkında Kanun"</a> kanun kapsamında ödeme güvenliğini sağlamak amacıyla alınmaktadır. Bu bilgiler hiçbir şekilde herhangi bir kurum/kuruluş ya da kişi ile paylaşılmamaktadır.</p>
				<p style="font-size:0.875em;line-height:24px; margin-bottom:10px; text-align:center;">TC Kimlik doğrulaması üyelere arası mesajlaşma, nakit talebinde bulunabilmek ve ödemeleriniz daha hızlı kontrolü için gerekmektedir Diğer durumlarda TC Kimlik doğrulaması yapılması zorunlu değildir.</p>
				<a href="tc-kimlik-dogrula" class="button primary" style="margin-left:auto; margin-right:auto; width:100%; margin-bottom:10px;"><span class="fa fa-check edit3"></span>TC KİMLİK NO DOĞRULA</a>
			</div>
				<div class="clearfix"></div>
				</article>
			<?php } ?>
				<!-- /POST -->
			</div>
			<!-- CONTENT -->
			
			<!-- CONTENT -->
			<div class="content">
				<!-- POST -->
				<article class="post">
					<!-- SIDEBAR ITEM -->
					<div class="sidebar-item product-info">
						<h4>Bilgilerim</h4>
						<hr class="line-separator">
						<div class="post-paragraph half">
						<!-- INFORMATION LAYOUT -->
						<div class="information-layout">
							<div class="information-layout-item"><p class="text-header">Ad Soyad :</p><p><?=$kullanicicek['kullanici_adsoyad']; ?></p></div>
							<?php if ($kullanicicek['kullanici_durum']=1) { ?>
						<div class="information-layout-item user-detay"><p class="text-header">E-Posta Adresi :</p><p><a href="#" title="<?=$kullanicicek['kullanici_mail']; ?>"  style="color: #00d7b3;">Onaylandı</a></p></div>
                        <?php } else  { ?>
                         <div class="information-layout-item user-detay"><p class="text-header">E-Posta Adresi :</p><p><a href="#" style="color: red;">Onaylamak İçin Tıklayın</a></p></div>
                        <?php } ?>
							<div class="information-layout-item user-detay"><p class="text-header">Üyelik Tarihi</p><p><?php echo $kullanicicek['kullanici_zaman']; ?></p></div>
						</div>
						<!-- INFORMATION LAYOUT -->
					</div>
					<div class="post-paragraph half">
						<!-- INFORMATION LAYOUT -->
						<div class="information-layout">
							
							<?php if (!empty($kullanicicek['tel'])) { ?>
						<div class="information-layout-item user-detay"><p class="text-header">Telefon No :</p><p><a href="#" title="<?=$kullanicicek['tel']; ?>" style="color: #00d7b3;">Onaylandı</a></p></div>
                        <?php } else {?>
                            <div class="information-layout-item user-detay"><p class="text-header">Telefon No :</p><p><a href="telefon-aktivasyon" style="color: red;">Onaylamak için Tıklayın</a></p></div>
                        <?php } ?>
							<?php if (empty($kullanicicek['tc'])) { ?>
                            <div class="information-layout-item user-detay"><p class="text-header">TC Kimlik No :</p><p><a href="tc-kimlik-dogrula" style="color: red;">Onaylamak İçin Tıklayın</a></p></div>
                        <?php } else  { ?>
                            <div class="information-layout-item user-detay"><p class="text-header">TC Kimlik No :</p><p><a href="#" title="<?=$kullanicicek['tc']; ?>"  style="color: #00d7b3;">Onaylandı</a></p></div>
                        <?php } ?>
							<div class="information-layout-item user-detay"><p class="text-header">Son Ödeme Yapılan IP</p><p><?php
                                $kulId= $kullanicicek['kullanici_id'];
                                $kulsor=$db->prepare("SELECT * FROM bakiyeislemleri WHERE kulid = ? order by id DESC");
                                $kulsor->execute(array(
                                    $kulId
                                ));
                                $kulcek=$kulsor->fetch(PDO::FETCH_ASSOC);
                                echo $kulcek['ip'];
                                ?>    </p></div>
						</div>
						<!-- INFORMATION LAYOUT -->
					</div>
					<div class="clearfix"></div>
					</div>
					<!-- /SIDEBAR ITEM -->
					<div class="clearfix"></div>
				</article>
				<!-- /POST -->
			</div>
			<!-- CONTENT -->
			
			<!-- CONTENT -->

			<div class="content">
                <!--

                   <div class="form-box-item full">
                   <h4>Son 5 Alışveriş İşlemi</h4>

                   <div class="transaction-list">

                       <div class="transaction-list-header">
                           <div class="transaction-list-header-sn">
                               <p class="text-header small">No</p>
                           </div>
                           <div class="transaction-list-header-tarih">
                               <p class="text-header small">Tarih Saati</p>
                           </div>
                           <div class="transaction-list-header-utipi">
                               <p class="text-header small">Ürün Adı</p>
                           </div>
                           <div class="transaction-list-header-adet">
                               <p class="text-header small">Adet</p>
                           </div>
                           <div class="transaction-list-header-fiyat">
                               <p class="text-header small">Tutarı</p>
                           </div>
                           <div class="transaction-list-header-incele">
                               <p class="text-header small"></p>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-sn">
                               <p class="category primary">65420</p>
                           </div>
                           <div class="transaction-list-item-tarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-utipi">
                               <p class="category primary">Knight Kingdom 33400 CPoint + 9000 CPoint Bonus</p>
                           </div>
                           <div class="transaction-list-item-adet">
                               <p class="category primary">5 Adet</p>
                           </div>
                           <div class="transaction-list-item-fiyat">
                               <p class="category primary">500.00 ₺</p>
                           </div>
                           <div class="transaction-list-item-incele">
                               <a href="#siparis-detay-popup" class="button secondary promo-popup" style="margin-top:9px;">DETAY</a>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-sn">
                               <p class="category primary">65420</p>
                           </div>
                           <div class="transaction-list-item-tarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-utipi">
                               <p class="category primary"> Oraclegamer 4800 Cpoint + 1100 Bonus</p>
                           </div>
                           <div class="transaction-list-item-adet">
                               <p class="category primary">5 Adet</p>
                           </div>
                           <div class="transaction-list-item-fiyat">
                               <p class="category primary">500.00 ₺</p>
                           </div>
                           <div class="transaction-list-item-incele">
                               <a href="#siparis-detay-popup" class="button secondary promo-popup" style="margin-top:9px;">DETAY</a>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-sn">
                               <p class="category primary">65420</p>
                           </div>
                           <div class="transaction-list-item-tarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-utipi">
                               <p class="category primary">Usko Game 1000 Jpoint (100 bonus)</p>
                           </div>
                           <div class="transaction-list-item-adet">
                               <p class="category primary">5 Adet</p>
                           </div>
                           <div class="transaction-list-item-fiyat">
                               <p class="category primary">500.00 ₺</p>
                           </div>
                           <div class="transaction-list-item-incele">
                               <a href="#siparis-detay-popup" class="button secondary promo-popup" style="margin-top:9px;">DETAY</a>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-sn">
                               <p class="category primary">65420</p>
                           </div>
                           <div class="transaction-list-item-tarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-utipi">
                               <p class="category primary">83/1 Priest 119k NP Quest +6 FULL SKİLL</p>
                           </div>
                           <div class="transaction-list-item-adet">
                               <p class="category primary">1 Adet</p>
                           </div>
                           <div class="transaction-list-item-fiyat">
                               <p class="category primary">200.00 ₺</p>
                           </div>
                           <div class="transaction-list-item-incele">
                               <a href="#siparis-detay-karakter-popup" class="button secondary promo-popup" style="margin-top:9px;">DETAY</a>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-sn">
                               <p class="category primary">65420</p>
                           </div>
                           <div class="transaction-list-item-tarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-utipi">
                               <p class="category primary">Knight Kingdom 33400 CPoint + 9000 CPoint Bonus</p>
                           </div>
                           <div class="transaction-list-item-adet">
                               <p class="category primary">5 Adet</p>
                           </div>
                           <div class="transaction-list-item-fiyat">
                               <p class="category primary">500.00 ₺</p>
                           </div>
                           <div class="transaction-list-item-incele">
                               <a href="#siparis-detay-popup" class="button secondary promo-popup" style="margin-top:9px;">DETAY</a>
                           </div>
                       </div>

                   </div>

                   </div>


                   <div class="form-box-item full">
                   <h4>Son 5 Satış İşlemi</h4>

                   <div class="transaction-list">

                       <div class="transaction-list-header">
                           <div class="transaction-list-header-sn">
                               <p class="text-header small">No</p>
                           </div>
                           <div class="transaction-list-header-tarih">
                               <p class="text-header small">Tarih Saati</p>
                           </div>
                           <div class="transaction-list-header-utipi">
                               <p class="text-header small">Ürün Adı</p>
                           </div>
                           <div class="transaction-list-header-adet">
                               <p class="text-header small">Adet</p>
                           </div>
                           <div class="transaction-list-header-fiyat">
                               <p class="text-header small">Tutarı</p>
                           </div>
                           <div class="transaction-list-header-incele">
                               <p class="text-header small"></p>
                           </div>
                       </div>



                       <div class="transaction-list-item">
                           <div class="transaction-list-item-sn">
                               <p class="category primary">65420</p>
                           </div>
                           <div class="transaction-list-item-tarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-utipi">
                               <p class="category primary">Sell 83 Level Mage</p>
                           </div>
                           <div class="transaction-list-item-adet">
                               <p class="category primary">1 Adet</p>
                           </div>
                           <div class="transaction-list-item-fiyat">
                               <p class="category primary">100.00 ₺</p>
                           </div>
                           <div class="transaction-list-item-incele">
                               <a href="#siparis-detay-karakter-popup" class="button secondary promo-popup" style="margin-top:9px;">DETAY</a>
                           </div>
                       </div>

                   </div>

                   </div>

                   <div class="form-box-item full">
                   <h4>Son 5 Siteye Giriş Bilgileri</h4>

                   <div class="transaction-list">

                       <div class="transaction-list-header">
                           <div class="transaction-list-header-ipsn">
                               <p class="text-header small">S.No</p>
                           </div>
                           <div class="transaction-list-header-iptarih">
                               <p class="text-header small">Tarih Saati</p>
                           </div>
                           <div class="transaction-list-header-ip">
                               <p class="text-header small">IP Adresi</p>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-ipsn">
                               <p class="category primary">01</p>
                           </div>
                           <div class="transaction-list-item-iptarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-ip">
                               <p class="category primary">IP : 88.241.36.16</p>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-ipsn">
                               <p class="category primary">02</p>
                           </div>
                           <div class="transaction-list-item-iptarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-ip">
                               <p class="category primary">IP : 88.241.36.16</p>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-ipsn">
                               <p class="category primary">03</p>
                           </div>
                           <div class="transaction-list-item-iptarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-ip">
                               <p class="category primary">IP : 88.241.36.16</p>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-ipsn">
                               <p class="category primary">04</p>
                           </div>
                           <div class="transaction-list-item-iptarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-ip">
                               <p class="category primary">IP : 88.241.36.16</p>
                           </div>
                       </div>

                       <div class="transaction-list-item">
                           <div class="transaction-list-item-ipsn">
                               <p class="category primary">05</p>
                           </div>
                           <div class="transaction-list-item-iptarih">
                               <p class="category primary">31.03.2017 - 13:11</p>
                           </div>
                           <div class="transaction-list-item-ip">
                               <p class="category primary">IP : 88.241.36.16</p>
                           </div>
                       </div>

                   </div>

                   </div>


   -->
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
<!-- Owl Carousel -->
<script src="js/vendor/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<script src="js/oyunlar-alert-data.js"></script>

<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
<!-- Canlı Destek -->
	<?php include( "online-destek.php" );?>
<?php if (empty($kullanicicek['tc']) && empty($kullanicicek['tel'])) { ?>
<script type="text/javascript">
$('body').xmalert({ 
	x: 'left',
	y: 'top',
	xOffset: 30,
	yOffset: 50,
	alertSpacing: 40,
	lifetime: 6000,
	fadeDelay: 0.3,
	autoClose: false,
	template: 'survey',
	title: 'Güvenlik Uyarısı',
	paragraph: 'Sitemizin sağlamış olduğu hiç bir güvenlik önlemini kullanmıyorsunuz hesap güvenliğiniz için en az 1 adet güvenlik önlemi aktif etmenizi ısrarla tavsiye ederiz',
	timestamp: '',
	imgSrc: 'images/dashboard/alert-logo.png',
	buttonSrc: [ 'tc-kimlik-dogrula' ],
	buttonText: 'Güvenlik <span class="primary">Ayarları</span>',
});
</script>
<?php } ?>

</body>
</html>