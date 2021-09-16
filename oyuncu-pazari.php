<?php
include 'head.php';



$current='oyuncupazari';

?>



<body>
<!-- MODAL -->
<!-- REGISTER -->

<!-- LOGIN -->


<!-- MODAL / END -->

<!-- KULLANICI GİRİŞ KAYIT BAKİYE BİLGİSİ -->
<?php include "include/header.php"; ?>

<?php include( "./include/giris-yap-popup.php");?>
<!-- MOBIL-MENU -->
<?php include "include/mobilmenu.php"; ?>
<!-- MENU -->
<?php include( "./include/menu.php");?>
<!-- HEADER / END -->

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
    <div class="section-headline">
        <h2>OYUNCU PAZARI</h2>

    </div>
</div>
<!-- SIDEBAR NAV -->
<div class="sidebar-nav-wrap">
    <div class="sidebar-nav">
        <!-- SIDEBAR FILTERS -->
        <?php
        $fiyata=@$_POST['fiyatagore'];
        $servera=@$_POST['serveragore'];

        $sayfa= @$_GET['s'];

        if(empty($sayfa) || !is_numeric($sayfa)) {
            $sayfa=1;
        }




        $kacar=28;

        $sql= ("SELECT COUNT(*) FROM `itempazari` WHERE durum='1'");
        $result = $db->prepare($sql);
        $result->execute();
        $ksayisi = $result->fetchColumn();



        $ssayisi= ceil($ksayisi/$kacar);

        $nereden= ($sayfa*$kacar)-$kacar;

        if ($fiyata==1 && $servera>0) {


            $ilansor = $db->prepare("SELECT * FROM itempazari WHERE durum='1' and katid='$servera' and oVitrin='0' order by fiyat DESC limit $nereden,$kacar");
            $ilansor->execute();



        } elseif ($fiyata==0 && $servera>0) {
            $ilansor = $db->prepare("SELECT * FROM itempazari WHERE durum='1' and katid='$servera' and oVitrin='0' order by fiyat ASC limit $nereden,$kacar");
            $ilansor->execute();



        } elseif ($fiyata==1) {
            $ilansor = $db->prepare("SELECT * FROM itempazari WHERE durum='1' and oVitrin='0' order by fiyat DESC limit $nereden,$kacar");
            $ilansor->execute();

        } elseif ($fiyata==0) {
            $ilansor = $db->prepare("SELECT * FROM itempazari WHERE durum='1' and oVitrin='0' order by fiyat ASC limit $nereden,$kacar");
            $ilansor->execute();

        } else {

            $ilansor = $db->prepare("SELECT * FROM itempazari WHERE durum='1' and oVitrin='0' order by id DESC limit $nereden,$kacar");
            $ilansor->execute();

        }?>
        <div class="search-form">
            <input style="width: 320px; float: left;" type="text"  class="rounded search" oninput="w3.filterHTML('#id01', '#ilan-ara', this.value)" placeholder="İlan Ara...">
            <input style="left:284px; top:13px" type="image" src="images/search-icon-small.png">
        </div>


        <div class="sidebar-filters" style="margin-top: 14px;">


            <form action="" method="POST" style="margin-top:0px;">

                <label for="price_filter" class="select-block">
                    <select name="fiyatagore" id="price_filter">
                        <option <?php echo $fiyata == '0' ? 'selected="" ' : ''; ?> value="0">Ucuzdan Pahalıya Sırala</option>
                        <option <?php echo $fiyata == '1' ? 'selected="" ' : ''; ?> value="1">Pahalıdan Ucuza Sırala</option>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
                
                <label for="itemspp_filter" class="select-block">
                    <select name="serveragore" id="itemspp_filter">
                        <option>Serverlara Göre Sırala</option>
                        <?php  $urunsor21=$db->prepare("SELECT * FROM kategori WHERE itemilan='1' or karakterilan='1' or gbilan='1' or cssilan='1' order by kategori_id DESC");
                        $urunsor21->execute();
                        while($uruncek21=$urunsor21->fetch(PDO::FETCH_ASSOC)) { ?>




                        <option <?php echo $servera == $uruncek21['kategori_id'] ? 'selected="" ' : ''; ?> value="<?php echo $uruncek21['kategori_id'] ?>"><?php echo $uruncek21['kategori_ad'] ?></option>
                        <?php } ?>
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>



            <button  type="submit" class="button dark-light" style="margin-top: 0px;">Filtrele</button>
            </form>
            <a style="width: 200px; margin-top:0;" class="button primary" href="ilan-ver.php" ><i class="fa fa-list"></i> İLAN VER</a>
        </div>

        <!-- /SIDEBAR FILTERS -->
    </div>
</div>
<!-- /SIDEBAR NAV -->

<!-- SECTION -->
<div class="section-wrap">
    <div class="section index">
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase">
            <!-- PRODUCT LIST -->
            <div id="id01" class="product-list grid column5-wrap">

                <?php include( "./include/ilan-item.php");?>
                
            </div>
            <!-- /PRODUCT LIST -->
        </div>
        <!-- /PRODUCT SHOWCASE -->

        <div class="clearfix"></div>

        <!-- PAGER -->
        <div class="pager primary">
            <?php for ($i=1; $i<=$ssayisi; $i++) { ?>
            <div class="pager-item">
                <a href="oyuncu-pazari.php?s=<?php echo $i; ?>"><p ><?php echo $i; ?></p></a>
            </div>
            <?php } ?>
        </div>
        <!-- /PAGER -->
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

<!-- jQuery -->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<!-- Angular -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>

<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<!-- JRange -->
<script src="js/vendor/jquery.range.min.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>

<script src="js/popup-data.js"></script>
<!-- Sidebar Menu -->
<script src="js/sidebar-menu.js"></script>
<!-- Shop -->
<script src="js/shop.js"></script>
<!-- Shop -->
<script src="js/ilan-arama.js"></script>

</body>

</html>