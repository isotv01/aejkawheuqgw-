<?php $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
			$kategorisor->execute();
 $urunsor=$db->prepare("SELECT * FROM altkategori order by urun_id ASC");
			$urunsor->execute();

			 ?>


<div class="sidebar-item">
	<!-- OYUN ARAMA -->
	<label for="category" class="rl-label">OYUNLAR</label>
					<hr class="line-separator2">
	<div class="search-form" style="margin-bottom:20px">
		<input type="text" class="rounded search" name="search" id="myInput" onkeyup="myFunction()" placeholder="Hangi Oyunu Aramıştınız..." title="Hangi Oyunu Aramıştınız...">
		<input type="image" style="top:4px; right:4px;" src="images/search-icon-small.png" alt="search-icon">
	</div>
	<!-- OYUN ARAMA end -->
	<!-- MENU -->
		<ul class="dropdown hover-effect interactive" id="myUL">
		<?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
		<li class="dropdown-item interactive">
			<a href="#"><?php echo $kategoricek['kategori_ad'] ?>
				<!-- SVG ARROW -->
				<svg class="svg-arrow">
					<use xlink:href="#svg-arrow"></use>
				</svg>
				<!-- /SVG ARROW -->
			</a>
			<!-- INNER DROPDOWN -->
			<?php
                $kategori_id=$kategoricek['kategori_id'];
                $urunsor=$db->prepare("SELECT * FROM altkategori where ustId=:kategori_id ");
                  $urunsor->execute(array(
                    'kategori_id' => $kategori_id
                    ));

                  $say=$urunsor->rowCount();

                  ?>
			<ul id="myUL" class="inner-dropdown edit">
				<!-- INNER DROPDOWN ITEM -->
				<?php 

     

     while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
       ?>
				
				<p  class="inner-dropdown-item">
					<a href="urun-<?=seo($uruncek["ad"]).'-'.$uruncek["id"]?>"><?php echo $uruncek['ad'] ?></a>
				</p>
			<?php } ?>
				<!-- /INNER DROPDOWN ITEM -->
			
				<!-- INNER DROPDOWN ITEM -->
				
				<!-- /INNER DROPDOWN ITEM -->
			</ul>
			<!-- INNER DROPDOWN -->
		</li>
		<?php } ?>
		
	</ul>
	<!-- MENU end -->
	<a href="oyunlar.php" class="button medium primary" style="margin-top:22px">Tüm Oyunlar</a>
</div>