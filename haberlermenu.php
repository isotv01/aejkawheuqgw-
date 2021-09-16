<?php 

 $urunsor=$db->prepare("SELECT * FROM blog order by urun_id DESC limit 3");
    $urunsor->execute();


?>

<div class="sidebar-item author-items-v2 mobile-close">
					<h4 style="">Haberler</h4>
					<hr class="line-separator2">
					<?php



while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
?>
					<div class="item-preview">
						<a href="blog-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>">
							<figure class="product-preview-image small liquid imgLiquid_bgSize imgLiquid_ready">
								<img src="<?php echo $uruncek['urun_resmi2']; ?>">
							</figure>
						</a>
						<a href="blog-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>"><p class="text-header small"><?php echo $uruncek['urun_ad']; ?></p></a>
						<p class="category tiny primary" style="margin-top:5px"><a href="blog-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>"><?php 
						$katId=$uruncek['kategori_id'];
						$sql="SELECT * FROM `blogkategori` WHERE kategori_id='$katId'";
						$sql=$db->query($sql);
						$katCek=$sql->fetch(PDO::FETCH_ASSOC);
						echo $katCek['kategori_ad']; ?></a></p>
						<p class="category tiny"><a href="blog-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>"><?php echo $uruncek['urun_zaman']; ?></a></p>
					</div>
					<?php } ?>
					
					
					<hr class="line-separator" style="margin-bottom:9px;">
					<p class="category primary"  style="text-align:right;"><a href="blog.php">TÜM HABERLER</a></p>
				</div>