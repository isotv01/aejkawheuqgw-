<?php
include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}
$currentleft='kcsiparislerim';


?>


<body>

<!-- MODAL -->
<!-- SIPARIS DETAY -->
<?php include "netting/kcsiparis-detay.php";?>
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
            <div class="headline gold">
                <h4>KC Sipariş Geçmişi</h4>
            </div>
            <!-- /HEADLINE -->

        </div>
        <div class="content">
            <div class="post">
                <!-- TRANSACTION LIST -->
                <div class="transaction-list">
                    <!-- TRANSACTION LIST HEADER -->

                    <div class="transaction-list-header">
                        <div class="transaction-list-header-sn">
                            <p class="text-header small">ID</p>
                        </div>
                        <div class="transaction-list-header-tarih">
                            <p class="text-header small">Tarih</p>
                        </div>
                        <div class="transaction-list-header-utipi2">
                            <p class="text-header small">Ürün Cinsi</p>
                        </div>
                        <div class="transaction-list-header-fiyat2">
                            <p class="text-header small">Tutar</p>
                        </div>
                        <div class="transaction-list-header-sob">
                            <p class="text-header small">Durum</p>
                        </div>
                        <div class="transaction-list-header-audetay">
                            <p class="text-header small">İşlem</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION LIST HEADER -->

                    <!-- TRANSACTION LIST ITEM -->
                    <?php
                    $kullanici_id=$kullanicicek['kullanici_id'];
                    $siparissor=$db->prepare("SELECT * FROM kcsiparis where kullanici_id=:id order by siparis_id DESC");
                    $siparissor->execute(array(
                        'id' => $kullanici_id
                    ));

                    while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {
                        $spIDs=$sipariscek['urun_ad'];
                        $sql="SELECT * FROM `kcurun` WHERE urun_ad='$spIDs'";
                        $sql2=$db->query($sql);
                        $deg=$sql2->fetch(PDO::FETCH_ASSOC);
                        if ($sipariscek['siparis_durum']==0) { ?>
                            <div class="transaction-list-item">

                                <div class="transaction-list-item-sn">
                                    <p class="category featured"><?php echo $sipariscek['siparis_id']; ?></p>
                                </div>

                                <div class="transaction-list-item-tarih">
                                    <p class="category featured"><?php echo $sipariscek['siparis_zaman']; ?></p>
                                </div>

                                <div class="transaction-list-item-utipi2">
                                    <p class="category featured"><?php echo $sipariscek['urun_ad']." - ".$deg['urun_degeri'];?></p>

                                </div>


                                <div class="transaction-list-item-fiyat2">
                                    <p class="category featured"><?php echo $sipariscek['siparis_toplam']; ?> ₺</p>
                                </div>

                                <?php if($sipariscek['siparis_durum']==0) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Beklemede</a>
                                    </div>
                                <?php }elseif($sipariscek['siparis_durum']==1) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button secondary" style="margin-top:9px; width:100%;"><span class="fa fa-refresh fa-spin edit3"></span> Teslim Ediliyor</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==2) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Tamamlandı</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==3) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                    </div>
                                <?php } ?>
                                <div class="transaction-list-item-audetay">
                                    <a href="" data-scid="<?php echo $sipariscek['siparis_id']; ?>" class="button dark kcspDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
                                </div>
                            </div>
                        <?php } elseif ($sipariscek['siparis_durum']==1) { ?>

                            <div class="transaction-list-item">

                                <div class="transaction-list-item-sn">
                                    <p class="category secondary"><?php echo $sipariscek['siparis_id']; ?></p>
                                </div>

                                <div class="transaction-list-item-tarih">
                                    <p class="category secondary"><?php echo $sipariscek['siparis_zaman']; ?></p>
                                </div>

                                <div class="transaction-list-item-utipi2">
                                    <p class="category secondary"><?php echo $sipariscek['urun_ad']." - ".$deg['urun_degeri'];?></p>
                                </div>

                                <div class="transaction-list-item-fiyat2">
                                    <p class="category secondary"><?php echo $sipariscek['siparis_toplam']; ?> ₺</p>
                                </div>

                                <?php if($sipariscek['siparis_durum']==0) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Beklemede</a>
                                    </div>
                                <?php }elseif($sipariscek['siparis_durum']==1) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button secondary" style="margin-top:9px; width:100%;"><span class="fa fa-refresh fa-spin edit3"></span> Teslim Ediliyor</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==2) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Tamamlandı</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==3) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                    </div>
                                <?php } ?>
                                <div class="transaction-list-item-audetay">
                                    <a href="" data-scid="<?php echo $sipariscek['siparis_id']; ?>" class="button dark kcspDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
                                </div>
                            </div>

                        <?php } elseif ($sipariscek['siparis_durum']==2) { ?>

                            <div class="transaction-list-item">

                                <div class="transaction-list-item-sn">
                                    <p class="category primary"><?php echo $sipariscek['siparis_id']; ?></p>
                                </div>

                                <div class="transaction-list-item-tarih">
                                    <p class="category primary"><?php echo $sipariscek['siparis_zaman']; ?></p>
                                </div>

                                <div class="transaction-list-item-utipi2">
                                    <p class="category primary"><?php echo $sipariscek['urun_ad']." - ".$deg['urun_degeri'];?></p>
                                </div>

                                <div class="transaction-list-item-fiyat2">
                                    <p class="category primary"><?php echo $sipariscek['siparis_toplam']; ?> ₺</p>
                                </div>

                                <?php if($sipariscek['siparis_durum']==0) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Beklemede</a>
                                    </div>
                                <?php }elseif($sipariscek['siparis_durum']==1) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button secondary" style="margin-top:9px; width:100%;"><span class="fa fa-refresh fa-spin edit3"></span> Teslim Ediliyor</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==2) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Tamamlandı</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==3) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                    </div>
                                <?php } ?>
                                <div class="transaction-list-item-audetay">

                                    <a href="" data-scid="<?php echo $sipariscek['siparis_id']; ?>" class="button dark kcspDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
                                </div>
                            </div>

                        <?php } elseif ($sipariscek['siparis_durum']==3) { ?>

                            <div class="transaction-list-item">

                                <div class="transaction-list-item-sn">
                                    <p class="category tertiary"><?php echo $sipariscek['siparis_id']; ?></p>
                                </div>

                                <div class="transaction-list-item-tarih">
                                    <p class="category tertiary"><?php echo $sipariscek['siparis_zaman']; ?></p>
                                </div>

                                <div class="transaction-list-item-utipi2">
                                    <p class="category tertiary"><?php echo $sipariscek['urun_ad']." - ".$deg['urun_degeri'];?></p>
                                </div>

                                <div class="transaction-list-item-fiyat2">
                                    <p class="category tertiary"><?php echo $sipariscek['siparis_toplam']; ?> ₺</p>
                                </div>

                                <?php if($sipariscek['siparis_durum']==0) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Beklemede</a>
                                    </div>
                                <?php }elseif($sipariscek['siparis_durum']==1) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button secondary" style="margin-top:9px; width:100%;"><span class="fa fa-refresh fa-spin edit3"></span> Teslim Ediliyor</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==2) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button primary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Tamamlandı</a>
                                    </div>
                                <?php } elseif($sipariscek['siparis_durum']==3) { ?>
                                    <div class="transaction-list-item-sob">
                                        <a class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                    </div>
                                <?php } ?>
                                <div class="transaction-list-item-audetay">
                                    <a href="" data-scid="<?php echo $sipariscek['siparis_id']; ?>" class="button dark kcspDetay" style="margin-top:9px; width:100%;"><span style="color:#ffc000">DETAY</span></a>
                                </div>
                            </div>

                        <?php } ?>

                    <?php } ?>
                    <!-- /TRANSACTION LIST ITEM -->

                    <!-- TRANSACTION LIST ITEM -->





                </div>
                <!-- DASHBOARD CONTENT -->
            </div>
        </div>
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
<script src="js/custom.js"></script>

<?php
if(isset($_GET['durum'])){
    if($_GET['durum'] == "ok"){
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
                paragraph: 'Sipariş İşlemi Başarılı! Gerekli Bilgiler Detay sayfasında verilecektir.',
            });
        </script>
    <?php }elseif ($_GET['durum'] == "basarilickf"){ ?>

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
                paragraph: 'Sipariş İşlemi Başarılı! Gerekli Bilgiler Detay sayfasında verilecektir.',
            });
        </script>
    <?php } elseif ($_GET['durum'] == "yetersizbakiye") { ?>
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
                paragraph: 'Yetersiz bakiye, lütfen bakiye yükleyiniz.',
            });
        </script>


    <?php } else { ?>
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
                paragraph: 'Sipariş verilirken bir hata Oluştu.',
            });
        </script>
    <?php } ?>
<?php }
?>
<?php
if ($_GET['stok'] == "yok") { ?>
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
            paragraph: 'Stok Yetersiz, Lütfen stok kontrol edip tekrar deneyiniz.',
        });
    </script>
<?php } ?>

<?php
if ($_GET['enfazla'] == "5") { ?>
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
            paragraph: 'Tek seferde en fazla 5 adet KC sipariş verebilirsiniz.',
        });
    </script>
<?php } ?>

</body>
</html>