<?php

include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}
$currentsub='telaktiv';
$currentleft='hesabim2';


$maillll=$_SESSION['userkullanici_mail'];
$sqls = "SELECT * FROM `musteri` WHERE kullanici_mail='$maillll'";
$resultttt = $db->query($sqls);
$kullanicicek=$resultttt->fetch(PDO::FETCH_ASSOC);
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
        <h2>Telefon Numarası Doğrulama</h2>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">

    <?php if (empty($kullanicicek['tel'])) { ?>
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
            <!-- POST -->

                <article class="post duyuru">
                    <div class="duyuru-border">
                        <p style="font-size: 20px;">Alış-Veriş-Ödeme yapabilmek için <a  class="red"> Telefon Doğrulama İşlemi Yapılmalıdır. </a> </p>
                    </div>
                    <div class="clearfix"></div>
                </article>




            <!-- /POST -->
        </div>
        <!-- CONTENT -->

        <!-- CONTENT -->
        <div class="content">
            <div class="headline gold">
                <h4>Telefon Numarası Aktivasyon</h4>
            </div>
            <!-- FORM BOX ITEM -->
            <div class="form-box-item">

                <form action="telefon-aktivasyon.php?tel=1" method="POST" id="profile-info-form">
                    <!-- INPUT CONTAINER -->
                    <div class="input-container ">
                        <label for="files_included" class="rl-label required">Telefon Numaranız </label>
                        <input type="text" name="tel" placeholder="Lütfen Telefon numaranızı girin...">
                    </div>

                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container half ">
                        <label for="files_included" class="rl-label required">Kod İste</label>
                        <button type="submit" class="button mid dark"><span class="fa fa-paper-plane edit2"></span> Doğrulama Kodu Gönder</button>
                    </div>
                    </br></br></br></br>
                </form>

                    <!-- /INPUT CONTAINER -->
<?php if($_GET['tel'] == 1){ ?>
<?php
    function sms_gonder($Url,$Deger){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $Deger);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $Cikti = curl_exec($ch);
        curl_close($ch);
        return $Cikti;
    }


    $tel=$_POST['tel'];
    $mesajKodu = rand(1,999999);
    $mesaj = 'Merhaba, onay kodunuz: '.$mesajKodu.'';

    $baslik = 'Epinci.net'; //Baslik isminiz (En fazla 11 Karakter turkce karakter olmadan)
    $veriler = array(
        'islem' =>'1', //islem numarasi
        'user' =>'05419007979', //Kullanici kodunuz
        'pass' =>'I02Jsm6', //Kullanici sifreniz
        //'raporId' =>'raporIdniz', //Rapor Idsi Yalnızca 4 numaralı api için kullanınız
        'mesaj'=> $mesaj, //Mesaj metninin tutuldugu degiskenin adi
        'numaralar' => $tel, //Numaralin tutuldugu degiskenin adi
        'baslik' => $baslik, //Baslik isminizin tutuldugu degiskenin adi
    );
    $ozel_mesaj = sms_gonder("https://www.smsgondermepaneli.com/api-center/",$veriler);


    $update = $db->prepare("update musteri set telkod=? where kullanici_mail=?");
    $ok = $update->execute(array($mesajKodu,$maillll));

?>
                <form action="telefon-aktivasyon.php?tel=2" method="POST" id="profile-info-form">
                    <!-- INPUT CONTAINER -->
                    <div class="input-container ">
                        <label for="files_included" class="rl-label required">Telefon Numaranız </label>
                        <input type="text" readonly="" name="tel" value="<?php echo $_POST['tel']; ?>">
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->

                    <div class="input-container half ">
                        <label class="rl-label required">Telefon Doğrulama Kodu </label>
                        <input type="text" name="teldogrulama" >

                    </div>
                <div class="clearfix"></div>
                <button type="submit" class="button mid dark"><span class="fa fa-submit edit2"></span> Telefonumu Doğrula</button>
                </form>

                <?php


}elseif($_GET['tel'] == 2){ ?>

                <?php
    $sql = "SELECT * FROM `musteri` WHERE kullanici_mail='$maillll'";
    $resulttt = $db->query($sql);

    $kullanicitelcek=$resulttt->fetch(PDO::FETCH_ASSOC);
    $kullanicitel=$kullanicitelcek['telkod'];
    $kod=$kullanicitel;
    $kod2=$_POST['teldogrulama'];
    $telaktiv=$_POST['tel'];
    if(md5($kod) == md5($kod2)){
        $sql = "UPDATE `musteri` SET `tel`='$telaktiv' WHERE kullanici_mail='$maillll'";
        $resultt = $db->query($sql);


Header('Location: ?tel=3');
}else {
        Header('Location: ?tel=4');
    }

                } ?>

            </div>
            <!-- /FORM BOX ITEM -->
        </div>
        <!-- CONTENT -->
    </div>
    <?php } else {?>

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
                <!-- POST -->

                    <article class="post duyuru">
                        <div class="duyuru-border">
                            <p style="font-size: 20px;">Kullanıcı - <a  class="red"> Telefon </a> Doğrulama İşlemi Yapılmış.</p>
                        </div>
                        <div class="clearfix"></div>
                    </article>
          <!-- /POST -->
            </div>
            <!-- CONTENT -->

            <!-- CONTENT -->
            <div class="content">
                <div class="headline gold">
                    <h4>Telefon Numarası Aktivasyon</h4>
                </div>
                <!-- FORM BOX ITEM -->
                <div class="form-box-item">


                        <!-- INPUT CONTAINER -->
                        <div class="input-container ">
                            <label for="files_included" class="rl-label required">Telefon Numaranız </label>
                            <input type="text" disabled=""  placeholder="<?php echo $kullanicicek['tel']; ?>">
                        </div>

                    <button  style="color: black;"  class="button mid grey "><span class="fa fa-check edit3"></span> DOĞRULANMIŞ </button>

                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->

                    </br></br></br>


                </div>
                <!-- /FORM BOX ITEM -->
            </div>
            <!-- CONTENT -->
        </div>






    <?php } ?>
    <!-- /SECTION -->

    <!-- HIZMETLER -->
    <?php include( "./include/hizmetler.php" );?>
    <!-- /HIZMETLER -->

    <!-- FOOTER -->
    <?php include( "./include/footer.php" );?>
    <!-- /FOOTER -->

    <div class="shadow-film closed"></div>

    <!-- SVG ARROW -->
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

<!-- jQuery -->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- Owl Carousel -->
<script src="js/vendor/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>
<script src="js/oyunlar-alert-data.js"></script>
<!-- Social -->
<script src="js/sosyal-api.js"></script>
<script src="js/sosyal-data.js"></script>
<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
    <?php if($_GET['tel'] == 1){ ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageSuccess',
                title: 'Onay Mesajı',
                paragraph: 'Onay Kodunuz Gönderilmiştir.',
            });
        </script>
    <?php } elseif($_GET['tel'] == 2){ ?>

    <?php } elseif($_GET['tel'] == 3){ ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageSuccess',
                title: 'Onay Mesajı',
                paragraph: 'Telefon doğrulama işlemi başarılı !.',
            });
        </script>
    <?php } elseif($_GET['tel'] == 4){ ?>
        <script>
            $('body').xmalert({
                x: 'right',
                y: 'top',
                xOffset: 30,
                yOffset: 30,
                alertSpacing: 40,
                lifetime: 6000,
                fadeDelay: 0.3,
                template: 'messageError',
                title: 'Onay Mesajı',
                paragraph: 'Telefon doğrulama işlemi başarısız !.',
            });
        </script>
    <?php } ?>

    <?php if($_GET['durum'] == "telaktiv"){ ?>
    <script>
        $('body').xmalert({
            x: 'right',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageError',
            title: 'Onay Mesajı',
            paragraph: 'Alış-Veriş-Ödeme Yapabilmek için Telefon numaranızı doğrulamalısınız.',
        });
    </script>
    <?php } ?>
</body>
</html>