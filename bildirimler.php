<?php
include 'head.php';
include "fonksiyon.php";

$currentleft='bildirimler';

if(!uyeCek()){
    header("location:index.php");
    exit;
}
?>

<body>
<!-- MODAL -->
<!-- MODAL / END -->

<!-- HEADER -->
<?php include "include/header.php"; ?>
<!-- MOBIL-MENU -->
<?php include "include/mobilmenu.php"; ?>
<!-- MENU -->
<?php include( "./include/menu.php");?>
<!-- HEADER / END -->

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
    <div class="section-headline">
        <h2>Bildirimlerim</h2>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
    <!-- SECTION -->
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
            <div class="headline buttons gold">

                <?php
                $kullanici_id=$kullanicicek['kullanici_id'];
                $bildirimsor=$db->prepare("SELECT * FROM kullanicibildirim where kullanici_id=:id order by bildirim_id DESC limit 10");
                $bildirimsor->execute(array(
                    'id' => $kullanici_id
                ));
                $bildirimcek=$bildirimsor->fetch(PDO::FETCH_ASSOC);
                ?>
                <h4>Bildirimlerim</h4><a href="netting/bildirimtemizle.php?kullanici_id=<?php echo $kullanici_id; ?>&bildirimtemizle=ok" class="button mid-short tertiary">Temizle</a>
            </div>
            <!-- /HEADLINE -->

            <!-- PROFILE NOTIFICATIONS -->
            <div class="profile-notifications">
                <!-- PROFILE NOTIFICATION -->
                <?php $kullanici_id=$kullanicicek['kullanici_id'];
                $bildirimsor=$db->prepare("SELECT * FROM kullanicibildirim where kullanici_id=:id order by bildirim_id DESC limit 10");
                $bildirimsor->execute(array(
                    'id' => $kullanici_id
                ));

                while($bildirimcek=$bildirimsor->fetch(PDO::FETCH_ASSOC)) {
                    if ($bildirimcek['bildirim_turu']=='odemeOk') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="warning"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-wallet warning"></span>
                            </div>
                        </div>

                    <?php } elseif ($bildirimcek['bildirim_turu']=='odemeIslem') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="primary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-wallet primary"></span>
                            </div>
                        </div>
                    <?php } elseif ($bildirimcek['bildirim_turu']=='odemeOnay') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="success"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-wallet success"></span>
                            </div>
                        </div>
                    <?php } elseif ($bildirimcek['bildirim_turu']=='odemeIptal') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="tertiary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-wallet tertiary"></span>
                            </div>
                        </div>

                    <?php }  elseif ($bildirimcek['bildirim_turu']=='siparisOk') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="secondary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket secondary"></span>
                            </div>
                        </div>
                    <?php } elseif ($bildirimcek['bildirim_turu']=='siparisIslem') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="secondary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket secondary"></span>
                            </div>
                        </div>
                    <?php } elseif ($bildirimcek['bildirim_turu']=='siparisOnay') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="primary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket primary"></span>
                            </div>
                        </div>

                    <?php } elseif ($bildirimcek['bildirim_turu']=='siparisIptal') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="tertiary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket tertiary"></span>
                            </div>
                        </div>

                    <?php }  elseif ($bildirimcek['bildirim_turu']=='satisOk') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="warning"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket warning"></span>
                            </div>
                        </div>
                    <?php } elseif ($bildirimcek['bildirim_turu']=='satisIslem') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="primary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket primary"></span>
                            </div>
                        </div>
                    <?php } elseif ($bildirimcek['bildirim_turu']=='satisOnay') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="success"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket success"></span>
                            </div>
                        </div>

                    <?php } elseif ($bildirimcek['bildirim_turu']=='satisIptal') { ?>
                        <div class="profile-notification">
                            <div class="profile-notification-date">
                                <p><?php echo $bildirimcek['bildirim_zaman'] ?></p>
                            </div>
                            <div class="profile-notification-body">
                                <figure class="user-avatar">
                                    <img src="favicon.ico" alt="user-avatar">
                                </figure>
                                <p><a href="#" class="tertiary"><?php echo $bildirimcek['bildirim_aciklama'] ?></a></p>
                            </div>
                            <div class="profile-notification-type">
                                <span class="type-icon icon-basket tertiary"></span>
                            </div>
                        </div>

                    <?php } ?>




                <?php } ?>
                <!-- PROFILE NOTIFICATION -->

                <!-- PROFILE NOTIFICATION -->

                <!-- PROFILE NOTIFICATION -->

            </div>
            <!-- /PROFILE NOTIFICATIONS -->

        </div>
        <!-- CONTENT -->

    </div>
    <!-- /SECTION -->
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
</body>
</html>