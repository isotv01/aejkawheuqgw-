<div class="content left">
				<div id="product-sideshow-wrap">
					<div id="product-sideshow" style="padding:0px 0 4px;">
						<!-- PRODUCT SHOWCASE GOLDBAR -->
						<div class="product-showcase">
							<!-- HEADLINE -->
							<div class="headline vitrin-blue" style="max-height:66px;">
								<h4>İndirimdeki Ürünler</h4>
								<!-- SLIDE CONTROLS -->
								<div class="slide-control-wrap">
									<div class="slide-control left">
										<!-- SVG ARROW -->
										<svg class="svg-arrow">
											<use xlink:href="#svg-arrow"></use>
										</svg>
										<!-- /SVG ARROW -->
									</div>

									<div class="slide-control right">
										<!-- SVG ARROW -->
										<svg class="svg-arrow">
											<use xlink:href="#svg-arrow"></use>
										</svg>
										<!-- /SVG ARROW -->
									</div>
								</div>
								<!-- /SLIDE CONTROLS -->
							</div>
							<!-- /HEADLINE -->

							<!-- PRODUCT LIST -->
							<div id="pl-3" class="product-list grid column4-wrap owl-carousel owl-theme" style="margin-bottom:0px">
								<?php 
	
	$sqlurun="SELECT * FROM kcurun WHERE urun_fiyateski>0 order by urun_id DESC limit 10";
	$urunsor=$db->query($sqlurun);
	while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {

 ?>
															<!-- PRODUCT ITEM -->
						<div class="product-item column">
							<!-- PIN -->
								<span class="pin secondary">%<?php 

		$indirimlifiyat=$uruncek['urun_fiyat'];
		$fiyat=$uruncek['urun_fiyateski'];

		$indirim= ( $fiyat - $indirimlifiyat ) / $fiyat * 100;
		echo ceil($indirim);
		?> İNDİRİM</span>
							<!-- /PIN -->
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="<?=$uruncek['urun_resmi2'] ?>" height="150" width="258">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->
								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<?php if ($uruncek['urun_stok']!=0) { ?>
									<div class="preview-action" style="left:35px;margin-left: 25%;">
										<a>
											<div class="circle green">
												<span class="icon-plus" id="orta"></span>
											</div>
										</a>
										<a>
											<p>Stokta Var</p>
										</a>
									</div>
									<?php } elseif ($uruncek['urun_stok']==0) {?>
									<div class="preview-action" style="left:35px;margin-left: 25%;">
										<a>
											<div class="circle red">
												<span class="icon-minus" id="orta"></span>
											</div>
										</a>
										<a>
											<p>Stokta Yok</p>
										</a>
									</div>
									<?php } ?>
									<!-- /PREVIEW ACTION -->

									<!-- PREVIEW ACTION -->
									
									<!-- /PREVIEW ACTION -->
								</div>
								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PRODUCT PREVIEW ACTIONS -->

							<!-- PRODUCT INFO -->
							<div class="product-info">
								<a>
									<p class="text-header">
										<?php 
										$katId=$uruncek['kategori_id'];
										$sqlkat="SELECT * FROM kategori WHERE kategori_id=$katId";
										$katSor=$db->query($sqlkat);
										$katCek=$katSor->fetch(PDO::FETCH_ASSOC);
										echo $katCek['kategori_ad'];

										?>
									</p></br>
									<p class="text-header"><?=$uruncek['urun_ad'];?></p>
								</a>
								<p>
								<a class="category">Oyun Değeri &nbsp; &nbsp;:</a>
								<a class="category secondary"><?=$uruncek['urun_degeri']; ?><a class="fiyat-red"><?=$uruncek['urun_fiyateski'] ?> ₺</a></a>
								</p>
								<p class="price"><?=$uruncek['urun_fiyat'] ?> <span>₺</span></p>
								<p>
								<a class="category">Teslim Süresi &nbsp;:</a>
								<a class="category tertiary"><?=$uruncek['urun_teslim']; ?></a>
								</p>
							</div>
							<!-- /PRODUCT INFO -->
							<hr class="line-separator">

							<!-- USER RATING -->
							<div class="user-rating">
								<a href="urun-<?=seo($uruncek['urun_ad']).'-'.$uruncek['urun_id'] ?>" class="button primary full"><span class="fa fa-cart-arrow-down edit"></span>SATIN AL</a>
							</div>
						</div>
					
						<!-- /PRODUCT ITEM -->
	
						
						

<?php } ?>
							</div>
							<!-- /PRODUCT LIST -->
						</div>
						<!-- /PRODUCT SHOWCASE GOLDBAR -->
					</div>
				</div>
			</div>