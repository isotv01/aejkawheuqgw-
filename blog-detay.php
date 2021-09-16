<?php
ob_start();
session_start();

include "admins/netting/baglan.php" ;
include "admins/fonksiyon.php";

include "netting/ayar.php";
if ($_GET['urun_id']=="") {
    Header("Location:index.php");
}

$blogsor=$db->prepare("SELECT * FROM blog where urun_id=:urun_id");
$blogsor->execute(array(
    'urun_id' => $_GET['urun_id']
));

$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

$blogsorhit=$db->prepare("SELECT * FROM blog order by urun_id ASC");
$blogsorhit->execute();
$blogcekhit=$blogsorhit->fetch(PDO::FETCH_ASSOC);


$id = $_GET['urun_id'];
$hit = $db->prepare("UPDATE blog SET goruntulenme= goruntulenme +1 WHERE urun_id='$id'");
$hit->execute(array($id));


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="title" content="Epinci.Net | Türkiye'nin En Büyük Oyun Alışveriş Sitesi">
    <meta name="description" content="<?=$blogcek['urun_detay'] ?>">
    <meta name="keywords" content="<?=$blogcek['urun_keyword'] ?>">
    <meta name="robots" content="index, follow">
    <base href="https://www.epinci.net/" />
    <link rel="stylesheet" href="css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="css/vendor/tooltipster.css">
    <link rel="stylesheet" href="css/vendor/owl.carousel.css">
    <link rel="stylesheet" href="css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="css/skdslider.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/social-1.css">
    <link rel="stylesheet" href="css/font-fa/css/font-awesome.css">
    <link rel="stylesheet" href="css/borsa.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- favicon -->
    <link rel="icon" href="favicon.ico">
    <title>Epinci.Net | Türkiye'nin En Büyük Oyun Alışveriş Sitesi</title>
</head>



<body>
	<!-- MODAL -->
	<!-- MODAL / END -->
    <!-- POP-UP-ON -->
    <?php include( "./include/gb-bize-sat-all-popup.php");?>
    <?php include( "./include/giris-yap-popup.php");?>
	<!-- HEADER -->
		<?php include "include/header.php";?>
		<!-- MOBIL-MENU -->
    <?php include "include/mobilmenu.php"; ?>
		<!-- MENU -->
		<?php include( "./include/menu.php");?>
	<!-- HEADER / END -->
	
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap v3">
		<div class="section-headline">
			<h2>BLOG</h2>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->
	
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section full">
			<!-- CONTENT -->
			<div class="content">
				<!-- POST -->
				<article class="post blog-post">
					<!-- POST IMAGE -->
					<div class="post-image">
						<figure class="product-preview-image large liquid">
							<img height="485" src="<?php echo $blogcek['urun_resmi2']; ?>" alt="" width="100%">
						</figure>
					</div>
					<!-- /POST IMAGE -->

					<!-- POST CONTENT -->
					<div class="post-content with-title">
						<p class="text-header big"><?php echo $blogcek['urun_ad']; ?></p>
						<div class="meta-line">

								<p class="category primary">
                                    <?php
                                    $urun_id= $blogcek['kategori_id'];
                                    $blogsor2=$db->prepare("SELECT * FROM blogkategori WHERE kategori_id = ? ");
                                    $blogsor2->execute(array(
                                        $urun_id
                                    ));
                                    $blogcek2=$blogsor2->fetch(PDO::FETCH_ASSOC);
                                    echo $blogcek2['kategori_ad'] ?>

                                </p>

							<!-- METADATA -->
							<div class="metadata">
								<!-- META ITEM -->
<!--								<div class="meta-item tooltip" title="Yorum">-->
<!--									<span class="icon-bubble"></span>-->
<!--									<p>05</p>-->
<!--								</div>-->
								<!-- /META ITEM -->

								<!-- META ITEM -->
								<div class="meta-item tooltip" title="Görüntülenme">
									<span class="icon-eye tooltip"></span>
									<p><?php echo $blogcek['goruntulenme']; ?></p>
								</div>
								<!-- /META ITEM -->
							</div>
							<!-- /METADATA -->
							<p><?php  $tarihzaman=$blogcek['urun_zaman'];
                                $tarih=explode(" ",$tarihzaman);
                                echo $tarih[0]; ?></p>
						</div>
						<!-- POST PARAGRAPH -->
						<div class="post-paragraph">

							<p>
                                <?php echo $blogcek['urun_detay']; ?>

                            </p>

							</div>
						<!-- /POST PARAGRAPH -->

					</div>
					<!-- /POST CONTENT -->

					<hr class="line-separator-10">
                   <p>Tags :  <p style="font-size: x-small; color: #06b99b;"> <?php echo $blogcek['urun_keyword']; ?></p></p>

					<!-- SHARE -->
				<!--	<div class="share-links-wrap">
						<p class="text-header small">Paylaş:</p>
						 SHARE LINKS
						<ul class="share-links hoverable">
							<li><a href="#" class="fb"></a></li>
							<li><a href="#" class="twt"></a></li>
							<li><a href="#" class="db"></a></li>
							<li><a href="#" class="rss"></a></li>
							<li><a href="#" class="gplus"></a></li>
						</ul>
						 /SHARE LINKS
					</div> -->
					<!-- /SHARE -->
				</article>
				<!-- /POST -->

				<!-- BLOG COMMENTS -->
<!--				<div class="blog-comments">-->
<!--					<h4 class="section-title">Yorumlar (05)</h4>-->
<!---->
<!--					<hr class="line-separator">-->
<!---->
<!--					-->
<!---->
<!--							<div class="comment-list" style="border:none">-->
<!---->
<!--								<div class="comment-wrap">-->
<!---->
<!--									<a href="user-profile.html">-->
<!--										<figure class="user-avatar medium">-->
<!--											<img src="images/upload/avatars/avatar.png" alt="">-->
<!--										</figure>-->
<!--									</a>-->
<!--									<div class="comment">-->
<!--                                        <p class="text-header">IAloneQueen</p>-->
<!--										<p class="timestamp"></p>-->
<!--										<a class="report">08 Saat 15 Dakika Önce</a>-->
<!--										<p>Gerçekten çok kaliteli bir site hizmet çok hızlı güvenilir gözünüz kapalı alışveriş yapabilrisiniz</p>-->
<!--									</div>-->
<!--								</div>-->
<!---->
<!--								-->
<!--								<hr class="line-separator">-->
<!--								-->
<!---->
<!--								<div class="comment-wrap">-->
<!--									-->
<!--									<a href="user-profile.html">-->
<!--										<figure class="user-avatar medium">-->
<!--											<img src="images/upload/avatars/avatar.png" alt="">-->
<!--										</figure>-->
<!--									</a>-->
<!--									<div class="comment">-->
<!--										<p class="text-header">IAloneQueen</p>-->
<!--										<p class="timestamp"></p>-->
<!--										<a class="report">08 Saat 15 Dakika Önce</a>-->
<!--										<p>Gerçekten çok kaliteli bir site hizmet çok hızlı güvenilir gözünüz kapalı alışveriş yapabilrisiniz</p>-->
<!--									</div>-->
<!--								</div>-->
<!---->
<!--								-->
<!--								<hr class="line-separator">-->
<!--								-->
<!--								-->
<!---->
<!--                                <div class="pager primary">-->
<!--                                    <div class="pager-item"><p>1</p></div>-->
<!--                                    <div class="pager-item active"><p>2</p></div>-->
<!--                                    <div class="pager-item"><p>3</p></div>-->
<!--                                    <div class="pager-item"><p>...</p></div>-->
<!--                                    <div class="pager-item"><p>17</p></div>-->
<!--                                </div>-->
<!---->
<!---->
<!--                                <div class="clearfix"></div>-->
<!---->
<!--								<hr class="line-separator">-->
<!--                              -->
<!--								<h3>Yorum Yap</h3></br>-->
<!---->
<!---->
<!--								<div class="comment-wrap comment-reply">-->
<!---->
<!---->
<!--										<figure class="user-avatar medium">-->
<!--											<img src="images/upload/avatars/avatar.png" alt="">-->
<!--										</figure>-->
<!---->
<!---->
<!--									<form class="comment-reply-form">-->
<!--										<textarea name="treply100" placeholder="Sayın IAloneK1ng Yorumunuzu Yazın..."></textarea>-->
<!--										<div style="width:50%; float:right">-->
<!--											<button class="button blue"><span class="fa fa-paper-plane edit3"></span> Gönder</button>-->
<!--										</div>-->
<!--									</form>-->
<!---->
<!--								</div>-->
<!--								-->
<!--							</div>-->
<!--
<!--				</div>-->
				<!-- /BLOG COMMENTS -->
			</div>
			<!-- CONTENT -->

			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- LEFT MENU ITEM -->

				<!-- LEFT MENU ITEM -->

				<!-- POPÜLER HABERLER -->
				<?php include "include/populer-haberler.php" ?>

				<!-- BÜLTEN -->

				<!-- /BÜLTEN -->

				<!-- REKLAM ALANI -->
				<div class="sidebar-item">
					<a href="#">
						<img width="205px" height="242px" src="images/242-reklam-banner.jpg" alt="">
					</a>
				</div>
				<!-- /REKLAM ALANI -->

				<!-- ETİKET BULUTU -->

				<!-- /ETİKET BULUTU -->
			</div>
			<!-- /SIDEBAR -->
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

<!-- SVG CHECK -->
<svg style="display: none;">
	<symbol id="svg-check" viewBox="0 0 15 12" preserveAspectRatio="xMinYMin meet">
		<polygon points="12.45,0.344 5.39,7.404 2.562,4.575 0.429,6.708 3.257,9.536 3.257,9.536 
			5.379,11.657 14.571,2.465 "/>
	</symbol>
</svg>
<!-- /SVG CHECK -->

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
</body>
</html>