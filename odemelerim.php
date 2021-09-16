<?php 
include 'head.php';
include 'fonksiyon.php';
$currentleft='odemelerim';

if(!uyeCek()){
    header("location:index.php");
    exit;
}


?>


<body>
	<!-- MODAL -->
		<!-- SIPARIS DETAY -->

	<!-- MODAL / END -->
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
			<!-- CONTENT -->
			<div class="content">
			<!-- HEADLINE -->
				<div class="headline primary">
					<h4>Ödeme Geçmişi</h4>
				</div>
				<!-- /HEADLINE -->
				<div class="content">
					<div class="post">

						<!-- TRANSACTION LIST -->
						<div class="transaction-list">
							<!-- TRANSACTION LIST HEADER -->
							<div class="transaction-list-header">
								<div class="transaction-list-header-s-no1">
									<p class="text-header small">İşlem No</p>
								</div>
								<div class="transaction-list-header-tarih5">
									<p class="text-header small">Tarih Saati</p>
								</div>
								<div class="transaction-list-header-otipi">
									<p class="text-header small">Ödeme Tipi</p>
								</div>
								<div class="transaction-list-header-fiyat2">
									<p class="text-header small">Tutarı</p>
								</div>
								<div class="transaction-list-header-durum">
									<p class="text-header small">Durumu</p>
								</div>
							</div>
							<!-- /TRANSACTION LIST HEADER -->
                            <?php
                            $kullanici_id=$kullanicicek['kullanici_id'];

                            $odemesor=$db->prepare("SELECT * FROM bakiyeislemleri where kulid=:id order by id DESC");
                            $odemesor->execute(array(
                                'id' => $kullanici_id
                            ));
                  

                            while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)) { ?>

							<!-- TRANSACTION LIST ITEM -->
                                <?php if ($odemecek['islemdurumu']==0) { ?>
							<div class="transaction-list-item">
								<div class="transaction-list-item-s-no1">
									<p class="category featured">#<?php echo $odemecek['id']; ?></p>
								</div>
								<div class="transaction-list-item-tarih5">
									<p class="category featured"><?php echo $odemecek['tarih']; ?></p>
								</div>
                                <?php if($odemecek['islemturu']==2) { ?>
								<div class="transaction-list-item-otipi">
									<p class="category featured">Paytr Kredi kartı ödemesi.</p>
								</div>
                                <?php } elseif ($odemecek['islemturu']==1) { ?>
                                <div class="transaction-list-item-otipi">
                                    <p class="category featured">Paytr Atm/Havale ödemesi.</p>
                                </div>
                                <?php } ?>
								<div class="transaction-list-item-fiyat2">
									<p class="category featured"><?php echo $odemecek['bakiye'] ?> ₺</p>
								</div>

                                <?php if($odemecek['islemdurumu']==0) { ?>
								<div class="transaction-list-item-durum">
									<a href="#" class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Kontrol Ediliyor</a>
								</div>
                                <?php } elseif($odemecek['islemdurumu']==1) { ?>
                                <div class="transaction-list-item-durum">
                                    <a href="#" class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Onaylandı</a>
                                </div>
                                <?php } elseif($odemecek['islemdurumu']==2) { ?>
                                    <div class="transaction-list-item-durum">
                                        <a href="#" class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                    </div>
                                <?php } ?>

								<div class="transaction-list-item-audetay">
                                    <a href="" data-odcid="<?php echo $odemecek['id']; ?>" class="button dark odDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
								</div>
							</div>
                            <?php } elseif ($odemecek['islemdurumu']==1) { ?>

                                    <div class="transaction-list-item">
                                        <div class="transaction-list-item-s-no1">
                                            <p class="category primary">#<?php echo $odemecek['id']; ?></p>
                                        </div>
                                        <div class="transaction-list-item-tarih5">
                                            <p class="category primary"><?php echo $odemecek['tarih']; ?></p>
                                        </div>
                                        <?php if($odemecek['islemturu']==2) { ?>
                                            <div class="transaction-list-item-otipi">
                                                <p class="category primary">Paytr Kredi kartı ödemesi.</p>
                                            </div>
                                        <?php } elseif ($odemecek['islemturu']==1) { ?>
                                            <div class="transaction-list-item-otipi">
                                                <p class="category primary">Paytr Atm/Havale ödemesi.</p>
                                            </div>
                                        <?php } ?>
                                        <div class="transaction-list-item-fiyat2">
                                            <p class="category primary"><?php echo $odemecek['bakiye'] ?> ₺</p>
                                        </div>

                                        <?php if($odemecek['islemdurumu']==0) { ?>
                                            <div class="transaction-list-item-durum">
                                                <a href="#" class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Kontrol Ediliyor</a>
                                            </div>
                                        <?php } elseif($odemecek['islemdurumu']==1) { ?>
                                            <div class="transaction-list-item-durum">
                                                <a href="#" class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Onaylandı</a>
                                            </div>
                                        <?php } elseif($odemecek['islemdurumu']==2) { ?>
                                            <div class="transaction-list-item-durum">
                                                <a href="#" class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                            </div>
                                        <?php } ?>

                                        <div class="transaction-list-item-audetay">
                                            <a href="" data-odcid="<?php echo $odemecek['id']; ?>" class="button dark odDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
                                        </div>
                                    </div>

                             <?php } elseif ($odemecek['islemdurumu']==2) { ?>

                                    <div class="transaction-list-item">
                                        <div class="transaction-list-item-s-no1">
                                            <p class="category tertiary">#<?php echo $odemecek['id']; ?></p>
                                        </div>
                                        <div class="transaction-list-item-tarih5">
                                            <p class="category tertiary"><?php echo $odemecek['tarih']; ?></p>
                                        </div>
                                        <?php if($odemecek['islemturu']==2) { ?>
                                            <div class="transaction-list-item-otipi">
                                                <p class="category tertiary">Paytr Kredi kartı ödemesi.</p>
                                            </div>
                                        <?php } elseif ($odemecek['islemturu']==1) { ?>
                                            <div class="transaction-list-item-otipi">
                                                <p class="category tertiary">Paytr Atm/Havale ödemesi.</p>
                                            </div>
                                        <?php } ?>
                                        <div class="transaction-list-item-fiyat2">
                                            <p class="category tertiary"><?php echo $odemecek['bakiye'] ?> ₺</p>
                                        </div>

                                        <?php if($odemecek['islemdurumu']==0) { ?>
                                            <div class="transaction-list-item-durum">
                                                <a href="#" class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Kontrol Ediliyor</a>
                                            </div>
                                        <?php } elseif($odemecek['islemdurumu']==1) { ?>
                                            <div class="transaction-list-item-durum">
                                                <a href="#" class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Onaylandı</a>
                                            </div>
                                        <?php } elseif($odemecek['islemdurumu']==2) { ?>
                                            <div class="transaction-list-item-durum">
                                                <a href="#" class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                            </div>
                                        <?php } ?>

                                        <div class="transaction-list-item-audetay">
                                            <a href="" data-odcid="<?php echo $odemecek['id']; ?>" class="button dark odDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
                                        </div>
                                    </div>
                             <?php } ?>
							<!-- /TRANSACTION LIST ITEM -->

                            <?php } ?>
							<!-- /TRANSACTION LIST ITEM -->
						</div>
					</div>
				</div>
				<!-- DASHBOARD CONTENT -->
			</div>
			<!-- /CONTENT -->
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
<script src="js/custom.js"></script>
    <?php
    if(isset($_GET['odeme'])){
        if($_GET['odeme']=="1"){
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
                    paragraph: 'Ödeme İşlemi Başarılı bir şekilde Gerçekleştirildi.Bakiye Hesabınıza Eklendi.',
                });
            </script>
        <?php }else{ ?>

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
                    paragraph: 'Ödeme İşlemi Yapılırken Bir hata Oluştu.',
                });
            </script>
        <?php } ?>
    <?php }
    ?>
</body>
</html>