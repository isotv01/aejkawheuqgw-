<?php 
include 'head.php';

$currentleft='hesabim';

$ilansorhit=$db->prepare("SELECT * FROM itempazari order by id ASC");
$ilansorhit->execute();
$ilancekhit=$ilansorhit->fetch(PDO::FETCH_ASSOC);


$hitId = $_GET['id'];
$hit = $db->prepare("UPDATE itempazari SET goruntulenme= goruntulenme +1 WHERE id='$hitId'");
$hit->execute(array($hitId));

$ilansor=$db->prepare("SELECT * FROM itempazari where id=:id");
$ilansor->execute(array(
    'id' => $_GET['id']
));

$ilancek=$ilansor->fetch(PDO::FETCH_ASSOC);
$teslim=$ilancek['teslim'];
$aciklama=$ilancek['aciklama'];

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
        <h2><?php echo $ilancek['baslik']; ?></h2>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
    <div class="section full">
        <!-- SIDEBAR -->
        <div class="sidebar right">
            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item">
				<h3>İLAN BİLGİLERİ</h3>
                <hr class="line-separator-10">
                <p class="price large tertiary"><?php echo $ilancek['fiyat']; ?> ₺</p>
                <hr class="line-separator-10">
                <div class="clearfix"></div>
                <form action="netting/ilansiparis.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $ilancek['id']; ?>" >
                    <button type="submit" name="ilansatinal" class="button mid blue spaced"><span class="fa fa-cart-arrow-down edit"></span> SATIN AL</button>

                </form>
                <div class="clearfix"></div>
                <div class="post-paragraph half">
                    <!-- INFORMATION LAYOUT -->

                    <div class="information-layout">
                        <div class="information-layout-item">
                            <p class="text-header">Görüntülenme</p>
                            <p><?php echo $ilancek['goruntulenme']; ?></p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">İlan Tarihi</p>
                            <p><?php echo $ilancek['tarih']; ?></p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">Son Aktivite</p>
                            <p><?php echo $ilancek['guncelleme']; ?></p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">İlan Durumu</p>
                            <p class="green">Yeni İlan</p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">Teslimat Süresi</p>
                            <p>
                                <?php if ($teslim==1) { echo '1 saat';} ?>
                                <?php if ($teslim==3) { echo '3 saat';} ?>
                                <?php if ($teslim==5) { echo '5 saat';} ?>
                                <?php if ($teslim==12) { echo '12 saat';} ?>

                            </p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">Oyun</p>
                            <p>
                                <?php
                                $katID= $ilancek['katid'];
                                $katSor=$db->prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
                                $katSor->execute(array(
                                    $katID
                                ));
                                $katCek=$katSor->fetch(PDO::FETCH_ASSOC);
                                echo $katCek['kategori_ad'];
                                ?>

                            </p>
                        </div>
                    </div>
                    <!-- INFORMATION LAYOUT -->
                </div>
            </div>
            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item author-reputation full">
                <h3>SATICI BİLGİLERİ</h3>
                <hr class="line-separator-10">
					<div class="post-paragraph half">
                    <!-- INFORMATION LAYOUT -->
                    <div class="information-layout">
						<div class="information-layout-item">
                            <p class="text-header">İsim</p>
                            <p>
                                <?php
                                $kulID= $ilancek['satankulid'];
                                $kulSor=$db->prepare("SELECT * FROM musteri WHERE kullanici_id = ? ");
                                $kulSor->execute(array(
                                    $kulID
                                ));
                                $kulCek=$kulSor->fetch(PDO::FETCH_ASSOC);
                                echo $kulCek['ad'];
                                ?>

                            </p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">Üyelik Tarihi</p>
                            <p><?php
                                $kulID= $ilancek['satankulid'];
                                $kulSor=$db->prepare("SELECT * FROM musteri WHERE kullanici_id = ? ");
                                $kulSor->execute(array(
                                    $kulID
                                ));
                                $kulCek=$kulSor->fetch(PDO::FETCH_ASSOC);
                                echo $kulCek['kullanici_zaman'];
                                ?></p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">TC Kimlik</p>
                            <p class="green"><i class="fa fa-check" aria-hidden="true"></i> Onaylı</p>
                        </div>
                        <div class="information-layout-item">
                            <p class="text-header">Telefon</p>
                            <p class="green"><i class="fa fa-check" aria-hidden="true"></i> Doğrulanmış</p>
                        </div>
						<div class="user-rating">
							<ul class="rating" style="width: 100%; margin-top:10px">
								<li class="rating-item tooltip tooltipstered" style="text-align: center;"><span class="basarili"><i class="fa fa-check" aria-hidden="true"></i></span> <?php
                                    $kulID= $ilancek['satankulid'];
                                    $kulSor=$db->prepare("SELECT * FROM musteri WHERE kullanici_id = ? ");
                                    $kulSor->execute(array(
                                        $kulID
                                    ));
                                    $kulCek=$kulSor->fetch(PDO::FETCH_ASSOC);
                                    echo $kulCek['basarilisatis'];
                                    ?> BAŞARILI</li>
								<li class="rating-item tooltip tooltipstered" style="text-align: center;"><span class="basarisiz"><i class="fa fa-times" aria-hidden="true"></i></span> <?php
                                    $kulID= $ilancek['satankulid'];
                                    $kulSor=$db->prepare("SELECT * FROM musteri WHERE kullanici_id = ? ");
                                    $kulSor->execute(array(
                                        $kulID
                                    ));
                                    $kulCek=$kulSor->fetch(PDO::FETCH_ASSOC);
                                    echo $kulCek['basarisizsatis'];
                                    ?> BAŞARISIZ</li>
							</ul>
						</div>
						<hr class="line-separator-10">
                    </div>
                    <!-- INFORMATION LAYOUT -->
                </div>              
            </div>
            <!-- /SIDEBAR ITEM -->
            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item author-items-v2">
                <h4>Satıcının Diğer İlanları</h4>
                <hr class="line-separator">
                <!-- ITEM PREVIEW -->
                <?php
                $kulIdd= $ilancek['satankulid'];
                $digersor=$db->prepare("SELECT * FROM itempazari where satankulid=:id order by id DESC limit 3");
                $digersor->execute(array(
                    'id' => $kulIdd
                ));
                while($digercek=$digersor->fetch(PDO::FETCH_ASSOC)) {

                ?>
                <div class="item-preview" style="padding: 2px 0 0 80px!important;">
                    <a href="ilan-<?=seo($digercek["baslik"]).'-'.$digercek["id"]?>">
                        <?php $oyunParasi2=$digercek['oPara'];
                        if($oyunParasi2==2) { ?>
                            <figure class="product-preview-image small">
                                <img src="images/upload/urun/gold_bar.jpg" height="55" width="72">
                            </figure>
                        <?php } elseif ($oyunParasi2==1) { ?>
                            <figure class="product-preview-image small">
                                <img src="images/upload/urun/silver_bar.jpg" height="55" width="72">
                            </figure>
                        <?php } else { ?>
                        <figure class="product-preview-image small">
                            <img src="../<?php echo $digercek['resim']; ?>" height="55" width="72">
                        </figure>
                        <?php } ?>
                    </a>
                    <a href="ilan-<?=seo($digercek["baslik"]).'-'.$digercek["id"]?>">
                        <p class="text-header small"><?php echo $digercek['baslik'] ?></p>
                    </a>
                    <p class="category tiny secondary" style="margin-top:5px"><a href="ilan-<?=seo($digercek["baslik"]).'-'.$digercek["id"]?>">
                            <?php

                            $katIdd = $digercek['katid'];
                            $katsorr = $db->prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
                            $katsorr->execute(array(
                                $katIdd
                            ));
                            $katcekk = $katsorr->fetch(PDO::FETCH_ASSOC);
                            echo $katcekk['kategori_ad']; ?>

                        </a></p>
                </div>
                <?php } ?>
                <!-- /ITEM PREVIEW -->


                <div class="clearfix"></div>
            </div>
            <!-- /SIDEBAR ITEM -->
        </div>
        <!-- /SIDEBAR -->

        <!-- CONTENT -->
        <div class="content left">
            <!-- POST -->
            <article class="post">
                <!-- ALERT BOXES PREVIEW -->
                <!-- ALERT BOXES PREVIEW -->
                <div class="alert-boxes-preview">
                    <?php
                    $oyunParasi=$ilancek['oPara'];
                    if($oyunParasi==2) { ?>
                    <div class="alert-boxes-preview-description">
                        <img  src="images/upload/urun/gold_bar.jpg" width="100%">
                    </div>
                    <?php } elseif ($oyunParasi==1) { ?>
                    <div class="alert-boxes-preview-description">
                        <img  src="images/upload/urun/silver_bar.jpg" width="100%">
                    </div>

                    <?php } else { ?>
                    <div class="alert-boxes-preview-description">
                        <img src="../<?php echo $ilancek['resim'] ?>" width="100%">
                    </div>
                    <?php } ?>
                    <div class="alert-boxes-preview-links">
                        <p class="text-header small" style="margin-bottom:15px">Açıklama</p>
                        <p style="font-size:0.8125em;text-align:justify;">
                            <?php
                            $aciklama2=$ilancek['aciklama'];
                            $aciklama=explode("\n",$aciklama2);
                            foreach ($aciklama as $satir) {
                                 echo nl2br($satir); } ?>

                        </p>
                    </div>
                </div>
                <!-- /ALERT BOXES PREVIEW -->

             
				<!-- POST CONTENT -->
                <?php if ($ilancek['karakter']==1) { ?>
                    <div class="post-content" style="padding:15px 0px">
                        <!-- SIDEBAR ITEM -->
                        <div class="sidebar-item product-info">
                            <h4>Karakter Özellikleri</h4>
                            <hr class="line-separator">
                            <div class="post-paragraph half">
                                <!-- INFORMATION LAYOUT -->
                                <div class="information-layout">
                                    <div class="information-layout-item"><p class="text-header">Türü :</p><p>Account</p></div>
                                    <div class="information-layout-item"><p class="text-header">Level :</p><p><?php echo $ilancek['level'] ?></p></div>
                                    <div class="information-layout-item"><p class="text-header">Irk :</p><p>
                                            <?php if ($ilancek['irk']==1) { echo 'Karus';} ?>
                                            <?php if ($ilancek['irk']==2) { echo 'Human';} ?>
                                        </p></div>
                                    <div class="information-layout-item"><p class="text-header">Job :</p><p>
                                            <?php if ($ilancek['job']==1) { echo 'Warrior';} ?>
                                            <?php if ($ilancek['job']==2) { echo 'Rogue';} ?>
                                            <?php if ($ilancek['job']==3) { echo 'Priest';} ?>
                                            <?php if ($ilancek['job']==4) { echo 'Magician';} ?>
                                        </p></div>
                                    <div class="information-layout-item"><p class="text-header">National Point ( NP ) :</p><p><?php echo $ilancek['np']; ?></p></div>
                                </div>
                                <!-- INFORMATION LAYOUT -->
                            </div>
                            <div class="post-paragraph half">
                                <!-- INFORMATION LAYOUT -->
                                <div class="information-layout">
                                    <div class="information-layout-item"><p class="text-header">Quest İtemi :</p><p><?php echo $ilancek['quest']; ?></p></div>
                                    <div class="information-layout-item"><p class="text-header">Premium Tipi :</p><p><?php echo $ilancek['preTip']; ?></p></div>
                                    <div class="information-layout-item"><p class="text-header">Premium Saati :</p><p><?php echo $ilancek['preSaat']; ?></p></div>
                                    <div class="information-layout-item"><p class="text-header">Cash Miktarı :</p><p><?php echo $ilancek['cash']; ?></p></div>
                                </div>
                                <!-- INFORMATION LAYOUT -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /SIDEBAR ITEM -->
                    </div>
                <?php } ?>
                <?php if ($ilancek['css']==1) { ?>
                    <div class="post-content" style="padding:15px 0px">
                        <!-- SIDEBAR ITEM -->
                        <div class="sidebar-item product-info">
                            <h4>Karakter Özellikleri</h4>
                            <hr class="line-separator">
                            <div class="post-paragraph half">
                                <!-- INFORMATION LAYOUT -->
                                <div class="information-layout">
                                    <div class="information-layout-item"><p class="text-header">Türü :</p><p>Ring</p></div>
                                    <div class="information-layout-item"><p class="text-header">Level :</p><p><?php echo $ilancek['level'] ?></p></div>
                                    <div class="information-layout-item"><p class="text-header">Irk :</p><p>
                                            <?php if ($ilancek['irk']==1) { echo 'Karus';} ?>
                                            <?php if ($ilancek['irk']==2) { echo 'Human';} ?>
                                        </p></div>
                                    <div class="information-layout-item"><p class="text-header">Job :</p><p>
                                            <?php if ($ilancek['job']==1) { echo 'Warrior';} ?>
                                            <?php if ($ilancek['job']==2) { echo 'Rogue';} ?>
                                            <?php if ($ilancek['job']==3) { echo 'Magician';} ?>
                                            <?php if ($ilancek['job']==4) { echo 'Priest';} ?>
                                        </p></div>

                                </div>
                                <!-- INFORMATION LAYOUT -->
                            </div>
                            <div class="post-paragraph half">
                                <!-- INFORMATION LAYOUT -->
                                <div class="information-layout">
                                    <div class="information-layout-item"><p class="text-header">National Point ( NP ) :</p><p><?php echo $ilancek['np']; ?></p></div>
                                    <div class="information-layout-item"><p class="text-header">Quest İtemi :</p><p><?php echo $ilancek['quest']; ?></p></div>
                                    </div>
                                <!-- INFORMATION LAYOUT -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /SIDEBAR ITEM -->
                    </div>
                <?php } ?>
             
                <!-- SHARE -->
                <?php if ($ilancek['gb']==1) { ?>
                    <hr class="line-separator-10">
                <?php } elseif ($ilancek['item']==1) { ?>
                    <hr class="line-separator-10">
                <?php } ?>
			<div class="sharethis-inline-share-buttons"></div>


                <!-- /SHARE -->
            </article>
            <!-- /POST -->
            <?php
            $ilan_id=$ilancek['id'];

            $yorumsor=$db->prepare("SELECT * FROM yorumlar where ilan_id=:ilan_id and yorum_onay=:yorum_onay  order by yorum_zaman DESC");
            $yorumsor->execute(array(
            'ilan_id' => $ilan_id,
            'yorum_onay' => 1
            )); ?>
            <!-- URUN YORUMU -->
            <div class="comment-list" style="border:none">
                <h3>Yorum Yap</h3></br>

                <!-- YORUM YAP -->
                <?php if (isset($_SESSION['userkullanici_mail'])) {?>

                <form action="admins/netting/islem.php" method="POST" role="form">
                    <div class="comment-wrap comment-reply">
                        <!-- USER AVATAR -->
                        <a href="user-profile.html">
                            <figure class="user-avatar medium">
                                <img src="images/logo_avatar.png" alt="">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <!-- YORUM -->

                        <textarea name="yorum_detay" placeholder="Sayın <?php echo $kullanicicek['kullanici_adsoyad']; ?> Yorumunuzu Yazın..."></textarea>
                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">

                        <input type="hidden" name="ilan_id" value="<?php echo $ilancek['id'] ?>">

                        <input type="hidden" name="gelen_url" value="<?php
                        echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";

                        ?>">
                        <div style="width:50%; float:right">
                            <button type="submit" name="yorumkaydet" style="float: right;" class="button gold">Gönder</button>
                        </div>
                </form>

                <!-- /YORUM -->
            </div>
        <?php } else {?>
            <div class="comment-wrap comment-reply">
                <!-- USER AVATAR -->
                <a href="user-profile.html">
                    <figure class="user-avatar medium">
                        <img src="images/logo_avatar.png" alt="">
                    </figure>
                </a>
                <!-- /USER AVATAR -->
                <!-- YORUM -->

                <textarea disabled="" style="color: #9a8400" name="treply100" >Yorum yapabilmek için giriş yapmalısınız...</textarea>

                </form>

                <!-- /YORUM -->
            </div>
        <?php } ?>

            <hr class="line-separator">
            <!-- YORUM -->

            <?php




            while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {

                $ykullanici_id=$yorumcek['kullanici_id'];

                $ykullanicisor=$db->prepare("SELECT * FROM musteri where kullanici_id=:id");
                $ykullanicisor->execute(array(
                    'id' => $ykullanici_id
                ));

                $ykullanicicek=$ykullanicisor->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="comment-wrap">
                    <!-- USER AVATAR -->
                    <a href="user-profile.html">
                        <figure class="user-avatar medium">
                            <img src="images/logo_avatar.png" alt="">
                        </figure>
                    </a>
                    <div class="comment">
                        <p class="text-header"><?php echo $ykullanicicek['kullanici_adsoyad'] ?></p>
                        <p class="report"><?php echo $yorumcek['yorum_zaman'] ?></p>

                        <p class="text"><?php echo $yorumcek['yorum_detay'] ?></p>
                    </div>
                </div>
                <hr class="line-separator">
            <?php } ?>
            <!-- YORUM -->



            <!-- YORUM -->

            <!-- YORUM -->




            <!-- PAGER -->
            <!--<div class="pager primary">-->
            <!--    <div class="pager-item"><p>1</p></div>-->
            <!--    <div class="pager-item active"><p>2</p></div>-->
            <!--    <div class="pager-item"><p>3</p></div>-->
            <!--    <div class="pager-item"><p>...</p></div>-->
            <!--    <div class="pager-item"><p>17</p></div>-->
            <!--</div>-->
            <!-- /PAGER -->

            <!--<div class="clearfix"></div>-->
            <!---->
            <!--<hr class="line-separator">-->


            <!-- YORUM YAP -->
        </div>
        <!-- URUN YORUMU -->



    </div>
        <!-- CONTENT VITRIN -->

        <!-- /SECTION -->
    </div>
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<?php include( "./include/footer.php" );?>
<!-- /FOOTER -->

<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
        <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329 L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z" />
    </symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
    <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
        <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751 2.495,6.313 -0.002,3.878 3.45,3.376 " />
    </symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
    <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13" />
        <rect y="5" width="13" height="3" />
    </symbol>
</svg>
<!-- /SVG PLUS -->

<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>
<!-- Post Tab -->
<script src="js/post-tab.js"></script>
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

</body>

</html>	