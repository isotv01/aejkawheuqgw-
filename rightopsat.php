				<div class="sidebar-item author-items-v2" style="margin-bottom:30px">
					<div class="input-container half">
						<label for="category" class="rl-label">BİZE OYUN PARASI SAT</label>
						<hr class="line-separator2">
						<label for="category" class="select-block">
							<select onChange="if (this.value) window.location.href=this.value">
								<option value="#"></option>
                                <?php
                                $op="SELECT * FROM `altkategori` WHERE tip='gb'";
                                $op=$db->query($op);

                                while($opCek=$op->fetch(PDO::FETCH_ASSOC)) {
                                    $opId=$opCek['id'];
                                    $opS="SELECT * FROM `urun` WHERE kategori_id='$opId' and urunsat_durum='1'";
                                    $opS=$db->query($opS);
                                    $opSCek=$opS->fetch(PDO::FETCH_ASSOC);
                                    $iD=$opSCek['kategori_id'];
                                    $opC="SELECT * FROM `altkategori` WHERE id='$iD'";
                                    $opC=$db->query($opC);
                                    $opCCek=$opC->fetch(PDO::FETCH_ASSOC);
                                    $ustId=$opCCek['ustId'];
                                    $opCust="SELECT * FROM `kategori` WHERE kategori_id='$ustId'";
                                    $opCust=$db->query($opCust);
                                    $opCustCek=$opCust->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <option value="urun-<?=seo($opCCek['ad']).'-'.$opCCek['id'] ?>"><?=$opCustCek['kategori_ad'] ?></option>
                                <?php }  ?>


							</select>

							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</div>
				</div>