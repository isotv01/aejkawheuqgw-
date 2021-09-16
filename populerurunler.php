<div class="content left mobile-close">
				<div id="product-sideshow-wrap">
					<div id="product-sideshow" style="padding:0px 0 20px;">
						<!-- PRODUCT SHOWCASE GOLDBAR -->
						<div class="product-showcase">
							<!-- HEADLINE -->
							<div class="headline vitrin" style="max-height:66px;">
								<h4>Popüler Oyunlar</h4>
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
							<div id="pl-1" class="product-list grid column4-wrap owl-carousel owl-theme" style="margin-bottom:0px">
									<?php 
	
	$sql="SELECT * FROM kategori order by kategori_sira ASC limit 0,6";
	$kategorisor=$db->query($sql);
	while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

 ?>

						<!-- PRODUCT ITEM -->
						<div class="product-item column" style="padding-top:150px; margin-right:11px; margin-bottom:11px; border:0px;">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="<?=$kategoricek['kategori_resmi2']; ?>" alt="product-image">
								</figure>

								<!-- /PRODUCT PREVIEW IMAGE -->
								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<div class="preview-action" style="left:35px;margin-left: 25%;">
										<a href="oyun-<?=seo($kategoricek['kategori_ad']); ?>">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="oyun-<?=seo($kategoricek['kategori_ad']); ?>">
											<p>Oyuna Git</p>
										</a>
									</div>

									<!-- /PREVIEW ACTION -->
									<!-- PREVIEW ACTION -->
									



									<!-- /PREVIEW ACTION -->
								</div>

								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PRODUCT PREVIEW ACTIONS -->
						</div>

					<?php } ?>
						<!-- /PRODUCT ITEM -->
						
						
									
				
							</div>
							<div id="pl-2" class="product-list grid column4-wrap owl-carousel owl-theme" style="margin-bottom:0px">
									<?php 
	
	$sql2="SELECT * FROM kategori order by kategori_sira ASC limit 5,6";
	$kategorisor2=$db->query($sql2);
	while($kategoricek2=$kategorisor2->fetch(PDO::FETCH_ASSOC)) {

 ?>

						<!-- PRODUCT ITEM -->
						<div class="product-item column" style="padding-top:150px; margin-right:11px; margin-bottom:11px; border:0px;">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="<?=$kategoricek2['kategori_resmi2']; ?>" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->
								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<div class="preview-action" style="left:35px;margin-left: 25%;">
										<a href="oyun-<?=seo($kategoricek2['kategori_ad']); ?>">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="oyun-<?=seo($kategoricek2['kategori_ad']); ?>">
											<p>Oyuna Git</p>
										</a>
									</div>
									<!-- /PREVIEW ACTION -->
									<!-- PREVIEW ACTION -->
									
									<!-- /PREVIEW ACTION -->
								</div>
								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PRODUCT PREVIEW ACTIONS -->
						</div>
					
					<?php } ?>
						<!-- /PRODUCT ITEM -->
						
						
									
							</div>
							<!-- /PRODUCT LIST -->
						</div>
						<!-- /PRODUCT SHOWCASE GOLDBAR -->
					</div>
				</div>
			</div>