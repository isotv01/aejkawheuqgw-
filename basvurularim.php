
        <?php include 'head.php';
        include "fonksiyon.php";
        if(!uyeCek()){
            header("location:index.php");
            exit;
        }



        ?>
        <body>
        <!-- HEADER-ON -->
        <?php include "include/header.php";
        if (isset($_POST['basvur'])) {
            $kulMail=$kullanicicek['kullanici_mail'];
            $kulAdSoyad=$kullanicicek['ad'].' '.$kullanicicek['soyad'];
            $kulTel=$kullanicicek['tel'];
            $kulId=$kullanicicek['kullanici_id'];
            $skype=$_POST['skype'];
            $server=$_POST['server'];
            $guvenlik=$_POST['security'];
            $logo=$_POST['logo'];
            $beta=$_POST['beta'];
            $official=$_POST['official'];
            $epinHow=$_POST['epinhow'];
            $fiyat=$_POST['fiyat'];
            $epin=$_POST['epin'];

            $sql=$db->query("INSERT INTO `tedarikbasvuru`( `adsoyad`,`kulId`, `tel`, `skype`, `server`, `guvenlik`, `logo`, `beta`, `official`, `uyeMail`, `epinHow`, `fiyat`, `epin`) VALUES ('$kulAdSoyad','$kulId','$kulTel','$skype','$server','$guvenlik','$logo','$beta','$official','$kulMail','$epinHow','$fiyat','$epin')");
            Header("Location:?basvuru=ok");
        }


        $currentleft='tedarikbasvurularim';



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
                        <h4>Tedarikçi Başvurularım</h4>
                    </div>
                    <div class="post">
                        <!-- TRANSACTION LIST -->
                        <div class="transaction-list">
                            <!-- TRANSACTION LIST HEADER -->

                            <div class="transaction-list-header">
                                <div class="transaction-list-header-sn">
                                    <p class="text-header small">ID</p>
                                </div>

                                <div class="transaction-list-header-tarih">
                                    <p class="text-header small">Server Adı</p>
                                </div>
                                <div style="margin-left: 8%" class="transaction-list-header-tarih">
                                    <p class="text-header small">Güvenlik</p>
                                </div>
                                <div style="margin-left: 8%"  class="transaction-list-header-tarih">
                                    <p class="text-header small">Official</p>
                                </div>
                                <div style="margin-left: 8%"  class="transaction-list-header-sob">
                                    <p class="text-header small">Durum</p>
                                </div>

                            </div>
                            <!-- /TRANSACTION LIST HEADER -->

                            <!-- TRANSACTION LIST ITEM -->
                            <?php
                            $kuLID=$kullanicicek['kullanici_id'];
                            $sel2=$db->query("SELECT * FROM `tedarikbasvuru` WHERE kulId='$kuLID' order by id DESC");


                            while($tdCek2=$sel2->fetch(PDO::FETCH_ASSOC)) { ?>

                                <div class="transaction-list-item">

                                    <div class="transaction-list-item-sn">
                                        <p class="category primary"><?php echo $tdCek2['id']; ?></p>
                                    </div>

                                    <div  class="transaction-list-item-tarih">
                                        <p class="category primary"><?php echo $tdCek2['server']; ?></p>
                                    </div>

                                    <div style="margin-left: 8%"  class="transaction-list-item-tarih">
                                        <p class="category primary"><?php echo $tdCek2['guvenlik'];?></p>

                                    </div>


                                    <div style="margin-left: 8%"  class="transaction-list-item-tarih">
                                        <p class="category primary"><?php echo $tdCek2['official']; ?></p>
                                    </div>

                                    <?php if($tdCek2['durum']==0) { ?>
                                        <div style="margin-left: 8%"  class="transaction-list-item-sob">
                                            <a class="button featured" style="margin-top:9px; width:100%;"><span class="fa fa-hourglass-start edit3"></span> Beklemede</a>
                                        </div>
                                    <?php }elseif($tdCek2['durum']==1) { ?>
                                        <div style="margin-left: 8%"  class="transaction-list-item-sob">
                                            <a class="button secondary" style="margin-top:9px; width:100%;"><span class="fa fa-check edit3"></span> Onaylandı</a>
                                        </div>
                                    <?php } elseif($tdCek2['durum']==2) { ?>
                                        <div style="margin-left: 8%"  class="transaction-list-item-sob">
                                            <a class="button tertiary" style="margin-top:9px; width:100%;"><span class="fa fa-remove edit3"></span> İptal Edildi</a>
                                        </div>
                                    <?php } ?>

                                </div>
                            <?php }    ?>

                <!-- /TRANSACTION LIST ITEM -->

                <!-- TRANSACTION LIST ITEM -->





            </div>
            <!-- DASHBOARD CONTENT -->
        </div></div>
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
<?php if (@$_GET['basvuru']=="ok") { ?>
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
            paragraph: 'Başvurunuz başarıyla tarafımıza ulaşmıştır.',
        });
    </script>
<?php } ?>
</body>
</html>
