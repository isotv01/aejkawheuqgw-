<?php

include "head.php";

?>


<body>
<!-- MODAL -->
<!-- MODAL / END -->

<!-- POP-UP-ON -->
<?php include( "./include/gb-bize-sat-all-popup.php");?>
<?php include( "./include/giris-yap-popup.php");?>

<!-- HEADER-ON -->
<?php include( "./include/header.php");?>
<!-- MOBIL-MENU -->
<?php include( "./include/mobilmenu.php");?>
<!-- MENU -->
<?php include( "./include/menu.php");?>
<!-- HEADER / END -->

<!-- SLIDER -->
<div class="banner-wrap">
</div>
<!-- SLIDER / END -->

<!-- SECTION WRAP -->
<div class="section-wrap">
    <!-- SECTION -->
    <div class="section">
        <!-- SIDEBAR -->

        <!-- /SIDEBAR -->

        <!-- CONTENT -->

        <?php



        $eposta = $_GET["eposta"];
        $uyekod    = $_GET["kod"];

        if(!$eposta || !$uyekod){

            Header("Location:index.php?durum=kodlarbos");


        }else {


            $query = $db->prepare("select * from musteri where kullanici_mail=? and uyekod=?");
            $query->execute(array($eposta,$uyekod));
            $query->fetch(PDO::FETCH_ASSOC);
            $kontrol = $query->rowCount();

            if($kontrol){


                if($_POST){

                    $sifre = md5($_POST["kullanici_password"]);

                    if(!$sifre){
                        Header("Location:index.php?durum=sifrebos");
                    }else {
                        $update = $db->prepare("update musteri set kullanici_password=? where kullanici_mail=? and uyekod=?");
                        $ok = $update->execute(array($sifre,$eposta,$uyekod));

                        if($ok == true){
                            $uyekod2=md5(rand(0,1000));
                            $update2 = $db->prepare("UPDATE musteri SET uyekod=? WHERE kullanici_mail=?");
                            $okey = $update2->execute(array($uyekod2,$eposta));
                            Header("Location:index.php?durum=basarili");

                        }else {
                            Header("Location:index.php?durum=hata");
                        }
                    }



                }else {

                    ?>
                    <div class="1">
                        <div class="headline gold">
                            <h4>Şifremi Değiştir</h4>
                        </div>
                        <!-- FORM BOX ITEM -->
                        <div class="form-box-item">
                            <form action="" method="POST" id="profile-info-form">
                                <!-- INPUT CONTAINER -->
                                <div class="input-container ">
                                    <label for="files_included" class="rl-label required">Yeni Şifreniz </label>
                                    <input type="text" id="files_included" name="kullanici_password" placeholder="Lütfen yeni şifrenizi girin...">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->


                                <!-- /INPUT CONTAINER -->
                                <button type="submit" class="button mid blue "><span class="fa fa-check edit3"></span> Şifremi Güncelle</button>


                            </form>

                        </div>
                        <!-- /FORM BOX ITEM -->
                    </div>
                    <?php

                }




            }else {

                Header("Location:index.php?durum=kullanilmiskod");

            }


        }



        ?>

        <!-- CONTENT -->
    </div>
    <!-- SECTION END -->
</div>
<!-- SECTION WRAP END -->

<!-- HIZMETLER -->
<?php include( "./include/hizmetler.php");?>
<!-- /HIZMETLER -->

<!-- FOOTER -->
<?php include( "./include/footer.php");?>
<!-- /FOOTER -->

<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
        <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
    </symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
    <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
        <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
    </symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
    <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13"/>
        <rect y="5" width="13" height="3"/>
    </symbol>
</svg>
<!-- /SVG PLUS -->

<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>
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