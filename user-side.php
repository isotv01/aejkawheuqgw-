<a href="hesabim" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="images/upload/avatars/avatar.png" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header"><?php echo $kullanicicek['kullanici_adsoyad']; ?></p>
					<hr class="line-separator2">
								
					<div class="information-layout-item"><p class="text-header small">Kullanılabilir Bakiye</p><p style="text-align: center" class="price"><?php
                $odenenbakiye=$kullanicicek['kullanici_bakiye'];
                $cekilebilirbakiye=$kullanicicek['kullanici_bakiyecekilebilir'];
                $kullanilabilirbakiye=$odenenbakiye+$cekilebilirbakiye;


                echo $kullanilabilirbakiye; ?> <i class="fa fa-try" aria-hidden="true"></i></p></div>
              
		<div style="margin-top: 3%; margin-bottom: 3%;" class="information-layout-item"><p class="text-header small">Çekilebilir Bakiye</p><p style="text-align: center;" class="price"><?php echo $kullanicicek['kullanici_bakiyecekilebilir']; ?>  <i class="fa fa-try" aria-hidden="true"></i></p></div>
					<a href="banka-kredi-karti" class="button primary"><span class="fa fa-credit-card edit3"></span>BAKİYE YÜKLE</a>
					<div class="clearfix"></div>
					<hr class="line-separator">