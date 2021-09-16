<?php
include 'head.php';
include 'fonksiyon.php';

if ($_GET['id']=="") {
    Header("Location:index.php");
}

$currentleft='ilanlarim';

if(!uyeCek()){
    header("location:index.php");
    exit;
}



$kategorisor1=$db->prepare("SELECT * FROM itempazari where id=:id");
$kategorisor1->execute(array(
    'id' => $_GET['id']
));

$kategoricek1=$kategorisor1->fetch(PDO::FETCH_ASSOC);



?>



<body>
<!-- HEADER-ON -->
<?php include "include/header.php"; ?>

<!-- MOBIL-MENU-ON -->
<?php include( "./include/mobilmenu.php");?>

<!-- MENU-ON -->
<?php include( "./include/menu.php");?>

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
    <div class="section-headline">
        <h2><?php echo $kategoricek1['baslik']; ?> -- İlanınızı Düzenliyorsunuz</h2>
        <p>Anasayfa<span class="separator">/</span>Kullanıcı Paneli<span class="separator">/</span><span class="current-section">Yeni İlan Ekle</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
    <div class="section full">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item author-bio">
                <?php include "user-side.php"; ?>
                <!-- DROPDOWN -->
                <?php include( "./include/left-menu-panel.php" );?>
                <!-- /DROPDOWN -->
            </div>
            <!-- /SIDEBAR ITEM -->
        </div>
        <!-- /SIDEBAR -->

        <!-- CONTENT -->
        <div class="content">

            <!-- FORM BOX ITEM -->
            <div class="form-box-item full">

                <!-- INPUT CONTAINER OYUN SEÇ -->

                <!-- /INPUT CONTAINER OYUN SEÇ -->

                    <!-- POST TAB -->
                    <div  class="post-tab">
                        <!-- TAB HEADER -->

                        <!-- /TAB HEADER -->

                        <!-- ITEM TAB CONTENT -->
                        <div id="cek" >
                            </br>
                            <form action="netting/ilanduzenle.php" method="POST" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                <div class="input-container half">
                                    <label for="item_name" class="rl-label required">İlan Başlığı ( 25 Karakter ) </label>
                                    <input type="text" required="" id="item_name" name="baslik"  value="<?php echo $kategoricek1['baslik'] ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container half">
                                    <label for="category" class="rl-label required">Teslimat Süresi</label>
                                    <label for="category" class="select-block">
                                        <select required="" name="teslim" id="category">

                                            <option value="1" <?php echo $kategoricek1['teslim'] == '1' ? 'selected=""' : ''; ?>>1 Saat</option>
                                            <option value="3" <?php echo $kategoricek1['teslim'] == '3' ? 'selected=""' : ''; ?>>3 Saat</option>
                                            <option value="5" <?php echo $kategoricek1['teslim'] == '5' ? 'selected=""' : ''; ?>>5 Saat</option>
                                            <option value="12" <?php echo $kategoricek1['teslim'] == '12' ? 'selected=""' : ''; ?>>12 Saat</option>

                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <?php if ($kategoricek1['gb']!=1 && $kategoricek1['item']!=1) { ?>
                                <div class="input-container half2">
                                    <label for="category" class="rl-label required">Irk </label>
                                    <label for="category" class="select-block">
                                        <select required="" name="irk" id="category">
                                            <option >IRK SEÇİN</option>
                                            <option <?php echo $kategoricek1['irk'] == '1' ? 'selected=""' : ''; ?> value="1">Karus</option>
                                            <option <?php echo $kategoricek1['irk'] == '2' ? 'selected=""' : ''; ?> value="2">El Morad</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="input-container half2">
                                    <label for="category" class="rl-label required">Job </label>
                                    <label for="category" class="select-block">
                                        <select required="" name="job" id="category">
                                            <option >JOB SEÇİN</option>
                                            <option <?php echo $kategoricek1['job'] == '1' ? 'selected=""' : ''; ?> value="1">Warrior</option>
                                            <option <?php echo $kategoricek1['job'] == '2' ? 'selected=""' : ''; ?> value="2">Rogue</option>
                                            <option <?php echo $kategoricek1['job'] == '3' ? 'selected=""' : ''; ?> value="3">Magician</option>
                                            <option <?php echo $kategoricek1['job'] == '4' ? 'selected=""' : ''; ?> value="4">Priest</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="input-container half2">
                                    <label for="files_included" class="rl-label required">Level </label>
                                    <input type="text" required=""  id="files_included" name="level" value="<?php echo $kategoricek1['level'] ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container half2">
                                    <label for="files_included" class="rl-label required">National Point ( NP ) </label>
                                    <input type="text" required=""  id="files_included" name="np" value="<?php echo $kategoricek1['np'] ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                    <div class="input-container half2">
                                        <label for="files_included" class="rl-label required">Quest İtem</label>
                                        <input type="text" required=""  id="files_included" name="quest" value="<?php echo $kategoricek1['quest'] ?>">
                                    </div>
                                <!-- INPUT CONTAINER -->
                                    <?php if ($kategoricek1['karakter']==1) { ?>
                                <div class="input-container half2">
                                    <label for="files_included" class="rl-label required">Cash Miktarı </label>
                                    <input type="text"  required="" id="files_included" name="cash" value="<?php echo $kategoricek1['cash'] ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container half2">
                                    <label for="files_included" class="rl-label required">Premium Tipi </label>
                                    <input type="text" required=""  id="files_included" name="preTip" value="<?php echo $kategoricek1['preTip'] ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container half2">
                                    <label for="files_included" class="rl-label required">Premium Saati </label>
                                    <input type="text" required=""  id="files_included" name="preSaat" value="<?php echo $kategoricek1['preSaat'] ?>">
                                </div>
                                <?php } ?>

                                <?php } ?>

                                <!-- INPUT CONTAINER -->
                                <div class="input-container">
                                    <label for="item_description" class="rl-label required">Açıklama Düzenle </label>
                                    <textarea id="item_description" required=""  name="aciklama"><?php echo $kategoricek1['aciklama']; ?></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $kategoricek1['id']; ?>" >
                                <!-- /INPUT CONTAINER -->
                                <?php if($kategoricek1['gb']!=1) { ?>
                                <label for="item_name" class="rl-label required">Mevcut Resim </label>
                                <img width="400" height="200" src="<?php echo $kategoricek1['resim']; ?>">
                                <label for="item_name" class="rl-label required">Resim Değiştir </label>
                                <div class="input-container">
                                    <input   type="file" name="ilanresmi">
                                </div>
                                <?php } ?>
                                <!-- INPUT CONTAINER -->
                                <div class="input-container half">
                                    <label for="files_included" class="rl-label required">Satış Fiyatı</label>
                                    <input type="text" id="cekilecek" required=""  name="fiyat" value="<?php echo $kategoricek1['fiyat']; ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container half">
                                    <label for="item_dimensions" class="rl-label">Bakiyenize Yüklenecek Miktar</label>
                                    <input type="text" id="tutar" name="tutar" readonly="" value="<?php echo $kategoricek1['bakiye']; ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <div class="clearfix"></div>

                                <!-- CHECKBOX -->
                                <?php if ($kategoricek1['aVitrin']==1) { ?>
                                <input <?php echo $kategoricek1['aVitrin'] == '1' ? 'checked="" disabled=""' : ''; ?> type="checkbox" id="filter1">
                                <?php } elseif ($kategoricek1['aVitrin']==0) { ?>
                                    <input type="checkbox" id="filter1" name="aVitrin">
                                <?php } ?>
                                <label for="filter1">
                                    <span class="checkbox tertiary"><span></span></span>
                                    Anasayfa Vitrin'de Göster <a class="ilan-ekle-1">1.50 ₺</a>
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <?php if ($kategoricek1['oVitrin']==1) { ?>
                                <input <?php echo $kategoricek1['oVitrin'] == '1' ? 'checked="" disabled=""' : ''; ?> type="checkbox" id="filter2" >
                                <?php } elseif ($kategoricek1['oVitrin']==0) { ?>
                                <input type="checkbox" id="filter2" name="oVitrin">
                                <?php } ?>
                                <label for="filter2">
                                    <span class="checkbox tertiary"><span></span></span>
                                    Oyuncu Pazarı Vitrin'de Göster <a class="ilan-ekle-2">1.00 ₺</a>
                                </label>
                                <?php if ($kategoricek1['renkli']==1) { ?>
                                <input <?php echo $kategoricek1['renkli'] == '1' ? 'checked="" disabled=""' : ''; ?> type="checkbox" id="filter3">
                                <?php } elseif ($kategoricek1['renkli']==0) { ?>
                                <input type="checkbox" id="filter3" name="renkli">
                                <?php } ?>
                                <label for="filter3">
                                    <span class="checkbox tertiary"><span></span></span>
                                    Renkli Yazı <a class="ilan-ekle-2">0.50 ₺</a>
                                </label>
                                <!-- /CHECKBOX -->
                                <hr class="line-separator-10">
                                <div style="ilan-ekle-not">
                                    <p>* Komisyon satıcıdan ( %10 ) kesilir.</p>
                                    <p>* Satıcı; İlandaki ürünün durumunda herhangi bir değişiklik olduğunda, güncelleme veya yayından kaldırmakla yükümlüdür.</p>
                                    <p>* Kişisel bilgiler olan ilanlar yayınlanmıyacaktır ( Telefon , E-mail vb gibi. )</p>
                                </div>
                                <hr class="line-separator-10">
                                <!-- CHECKBOX -->
                                <input type="checkbox" required=""  id="filter4" name="kosul">
                                <label for="filter4"><span class="checkbox tertiary"><span></span></span>
                                    <a href="#ilan-kosullari"  class="promo-popup" style="color:#e61852;font-weight:bold;">İlan verme koşulları</a>'nı okuyup kabul ettim.
                                </label>
                                <!-- /CHECKBOX -->

                                </BR>
                                <button type="submit" name="ilanduzenle" class="button mid dark">KAYDET</button>
                            </form>

                        </div>
                        <script>
                            $( "body" ).on( "keyup", "#cek #cekilecek", function(button) {

                                console.log(this);
                                var cekilecek= $("#cek input[name=fiyat]").val();



                                var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                                $("#cek input[name=tutar]").val(hesaplama);
                            });
                            $( "body" ).on( "change", "#cek #cekilecek", function(button) {

                                console.log(this);
                                var cekilecek= $("#cek input[name=fiyat]").val();



                                var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                                $("#cek input[name=tutar]").val(hesaplama);
                            });



                        </script>
                        <!-- /ITEM TAB CONTENT -->

                        <!-- KARAKTER TAB CONTENT -->

                        <!-- /GB CSS TAB CONTENT -->

                    </div>


                <!-- /POST TAB -->


            </div>
            <!-- /FORM BOX ITEM -->

        </div>
        <!-- CONTENT VITRIN -->

        <!-- /SECTION -->
    </div>
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<?php include( "./include/footer.php" );?>
<!-- /FOOTER -->

<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
        <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z" />
    </symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
    <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
        <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 " />
    </symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
    <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13" />
        <rect y="5" width="13" height="3" />
    </symbol>
</svg>
<!-- /SVG PLUS -->

<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>
<!-- Post Tab -->
<script src="js/post-tab.js"></script>
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