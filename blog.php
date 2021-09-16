<?php
include 'head.php';

 $blogsorhit=$db->prepare("SELECT * FROM blog order by urun_id ASC");
			$blogsorhit->execute();
			$blogcekhit=$blogsorhit->fetch(PDO::FETCH_ASSOC);


							$id = $blogcekhit['urun_id']; // Film id'yi 1 olarak varsayıyoruz siz $id'yi GET ile çektiğiniz için 1 yerine GET kodunuzu yazabilirsiniz.
							$hit = $db->prepare("UPDATE blog SET goruntulenme= goruntulenme +1 WHERE urun_id=?");
							$hit->execute(array($id));

						


?>



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
		<div class="section">
			<!-- CONTENT -->
			<div class="content">
				
				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">
						<!-- PRODUCT ITEM -->
						<?php include( "./include/blog-page.php");?>
							
						<!-- /PRODUCT ITEM -->
					</div>
					<!-- /PRODUCT LIST -->
				</div>
				<!-- /PRODUCT SHOWCASE -->

				<!-- PAGER -->
<!--				<div class="pager primary">-->
<!--					<div class="pager-item"><p>1</p></div>-->
<!--					<div class="pager-item active"><p>2</p></div>-->
<!--					<div class="pager-item"><p>3</p></div>-->
<!--					<div class="pager-item"><p>...</p></div>-->
<!--					<div class="pager-item"><p>17</p></div>-->
<!--				</div>-->
				
				<!-- /PAGER -->
				
			</div>
			<!-- CONTENT -->

			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- LEFT MENU ITEM -->
					
				<!-- LEFT MENU ITEM -->

				<!-- POPÜLER HABERLER -->
                <?php include "include/populer-haberler.php"; ?>
					
				<!-- /POPÜLER HABERLER -->

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
<!--				<div class="sidebar-item">-->
<!--					-->
<!--					<div class="tag-list primary">-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1 tag-1</a>-->
<!--						<a href="#" class="tag-list-item">tag-1</a>-->
<!--					</div>-->
<!--				-->
<!--				</div>-->
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