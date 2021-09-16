<div class="topbox-header">
    <?php
    $ustBol="SELECT * FROM `head`";
    $ustBol=$db->query($ustBol);
    while($ustBolCek=$ustBol->fetch(PDO::FETCH_ASSOC)) { ?>
				<div class="topbox-item">
					<a target="_blank" href="<?=$ustBolCek['link'] ?>">
					<div  class="img">
						<img src="<?=$ustBolCek['path'] ?>" alt="<?=$ustBolCek['baslik'] ?>" width="46">
					</div>
					<div class="row">
					<div class="title"><?=$ustBolCek['baslik'] ?></div>
					<div class="type"><?=$ustBolCek['aciklama'] ?></div>
					</div>
					</a>
				</div>
					<?php } ?>
			</div>