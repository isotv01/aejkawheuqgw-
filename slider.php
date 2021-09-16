			<div class="content left">
				<div class="form-box-item" style="padding:10px 10px 0px 10px;margin-bottom:30px">
				<div id="product-sideshow-wrap">
					<div>
					<ul id="demo1">
                        <?php
                            $slider="SELECT * FROM `slider`";
                            $slider=$db->query($slider);

                            while($sliderCek=$slider->fetch(PDO::FETCH_ASSOC)) {  ?>
						<li><img src="<?=$sliderCek['resim'] ?>" max-width="848px" max-height="283px" width="848px" height="283px"/></li>
                        <?php }?>

					</ul>
					</div>
				</div>
				</div>
			</div>