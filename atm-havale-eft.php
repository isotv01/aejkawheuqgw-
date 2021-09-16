<?php
include 'head.php';

$current='bakiye';

$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
$bankasor->execute();

?>


<body>
<!-- MODAL -->
<!-- MODAL / END -->
<!-- POP-UP-ON -->
<?php include( "./include/gb-bize-sat-all-popup.php");?>
<?php include( "./include/giris-yap-popup.php");?>
<!-- HEADER -->
<?php include  "include/header.php" ;?>
<!-- MOBIL-MENU -->
<?php include "include/mobilmenu.php"; ?>
<!-- MENU -->
<?php include( "./include/menu.php");?>
<!-- HEADER / END -->

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
    <div class="section-headline">
        <h2>PAYTR ATM, HAVALE & EFT ÖDEME BİLDİRİMİ</h2>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
    <div class="section full">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <!-- DROPDOWN -->
            <ul class="dropdown hover-effect">
                <li class="dropdown-item">
                    <a href="hesap-numaralari">HESAP NUMARALARI</a>
                </li>
                <li class="dropdown-item active">
                    <a href="atm-havale-eft">ATM - HAVALE - EFT</a>
                </li>
                <li class="dropdown-item">
                    <a href="banka-kredi-karti">BANKA-KREDİ KARTI</a>
                </li>
                <li class="dropdown-item">
                    <a href="oyunparasi">GOLD BAR SAT</a>
                </li>
            </ul>
        </div>
        <!-- /SIDEBAR -->

        <div class="content">
            <!-- BADGE BOXES -->
            <div class="form-box-item full">
                <?php if(isset($_POST['havaleyap'])){
                    ?>
                    <div style="width: 100%;margin: 0 auto;display: table;">

                        <?php

                        $merchant_id='135999'; // Mağaza numarası
                        $merchant_key='PsYPbW88QSJQYxG3'; // Mağaza Parolası - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                        $merchant_salt='iSEormUA8mdLKuat'; // Mağaza Gizli Anahtarı - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.

                        ## Kullanıcının IP adresi
                        if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                            $ip = $_SERVER["HTTP_CLIENT_IP"];
                        } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                        } else {
                            $ip = $_SERVER["REMOTE_ADDR"];
                        }

                        $user_ip=$ip;


                        $email=uyeCek()->kullanici_mail;
                        $payment_amount=($_POST['kusurat'].$_POST['fiyat']);
                        $kulid=uyeCek()->kullanici_id;
                        $bakiye=$payment_amount/100;

                        $islem=$db->query("insert  bakiyeislemleri set  kulid='$kulid' ,bakiye='$bakiye' ,islemturu='1',islemdurumu='0',ip='$user_ip' ");
                        $siparisid=$db->lastInsertId();
                        $merchant_oid=$siparisid;
                        $payment_type='eft';
                        if(!empty($_POST['bank'])) {
                            $bank = $_POST['bank'];
                        }
                        $debug_on=1;//hata mesajlarını ekrana bas

                        ## İşlem zaman aşımı süresi - dakika cinsinden
                        $timeout_limit = "30";

                        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir
                        $test_mode = 1;

                        $hash_str=$merchant_id.$user_ip.$merchant_oid.$email.$payment_amount.$payment_type.$test_mode;
                        $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));

                        $post_vals=array(
                            'merchant_id'=>$merchant_id,
                            'user_ip'=>$user_ip,
                            'merchant_oid'=>$merchant_oid,
                            'bank'=>$bank,
                            'user_name'=>uyeCek()->kullanici_adsoyad,
                            'user_phone'=>uyeCek()->tel,
                            'tc_no_last5'=>substr(uyeCek()->tc,"6",6),
                            'email'=>$email,
                            'payment_amount'=>$payment_amount,
                            'payment_type'=>$payment_type,
                            'paytr_token'=>$paytr_token,
                            'debug_on'=>$debug_on,
                            'timeout_limit'=>$timeout_limit,
                            'test_mode'=>$test_mode
                        );
                        $ch=curl_init();
                        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POST, 1) ;
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                        $result = @curl_exec($ch);

                        if(curl_errno($ch))
                        {
                            die("PAYTR EFT IFRAME connection error. err:".curl_error($ch));
                        }
                        curl_close($ch);

                        $result=json_decode($result,1);

                        /*
                            Başarılı yanıt örneği: (token içerir)
                            {"status":"success","token":"28cc613c3d7633cfa4ed0956fdf901e05cf9d9cc0c2ef8db54fa"}

                            Başarısız yanıt örneği:
                            {"status":"failed","reason":"Zorunlu alan degeri gecersiz: merchant_id"}
                        */

                        if($result['status']=='success')
                        {
                            $token=$result['token'];


                        }
                        else
                        {
                            die("PAYTR EFT Hatası. Sebep:".$result['reason']);
                        }

                        ?>

                        <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                        <iframe src="https://www.paytr.com/odeme/api/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                        <script>iFrameResize({},'#paytriframe');</script>

                    </div>
                <?php } ?>

                <!-- ACCORDION ITEM -->
                <?php
                while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="accordion gold">
                    <div class="accordion-item">
                        <div class="accordion-item-header lh0" type="button" value="Show/Hide" onClick="showHideDiv('<?php echo $bankacek['divid'] ?>')"/>
                        <div class="banka-preview">
                            <div class="banka-resim">
                                <img src="<?php echo $bankacek['banka_resmi']; ?>" width="170px">
                            </div>
                            <div class="banka-724">
                                <p class=" ">7/24 Ödeme Onayı</p>
                            </div>
                            <div class="banka-atm">
                                <p class=" "><?php echo $bankacek['banka_masraf'] ?></p>
                            </div>
                            <div class="banka-havale">
                                <p class=" ">Havale Ücreti : <i class="fa fa-try" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                    <div id="<?php echo $bankacek['divid'] ?>" class="accordion-item-content" style="display: none;">
                        <div class="banka2-preview">
                            <div class="banka-right">
                                <div class="information-layout">
                                    <!-- INFORMATION LAYOUT ITEM -->
                                    <div class="information-layout-item">
                                        <p class="text-header">Alıcı</p>
                                        <p><?php echo $bankacek['banka_sahibi'] ?></p>
                                    </div>
                                    <!-- /INFORMATION LAYOUT ITEM -->

                                    <!-- INFORMATION LAYOUT ITEM -->
                                    <div class="information-layout-item">
                                        <p class="text-header">IBAN</p>
                                        <p><?php echo $bankacek['banka_iban'] ?></p>
                                    </div>
                                    <!-- /INFORMATION LAYOUT ITEM -->

                                    <!-- INFORMATION LAYOUT ITEM -->
                                    <div class="information-layout-item">
                                        <p class="text-header">Şube Kodu</p>
                                        <p><?php echo $bankacek['banka_sube'] ?></p>
                                    </div>
                                    <!-- /INFORMATION LAYOUT ITEM -->

                                    <!-- INFORMATION LAYOUT ITEM -->
                                    <div class="information-layout-item">
                                        <p class="text-header">Hesap No</p>
                                        <p><?php echo $bankacek['banka_hesap'] ?></p>
                                    </div>
                                    <!-- /INFORMATION LAYOUT ITEM -->
                                </div>
                            </div>
                            <div class="banka-left">
                                <form action="" method="post" >
                                    <div class="form-box-item" style="margin-bottom:10px;">
                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="float:right; width:30%; clear:none;">
                                            <p class="bakiye-tl"><i class="fa fa-try" aria-hidden="true"></i> Türk Lirası</p>
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- INPUT CONTAINER -->

                                        <div class="input-container" style="float:left; width:33%; clear:none">
                                            <input type="text"  name="kusurat" required="" placeholder="00" minlength=1 value="<?=@$_POST['kusurat'] ? @$_POST['kusurat'] : ''?>">
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="float:left; width:4%; clear:none">
                                            <p class="text-header" style="margin-top:24px; text-align:center;">.</p>
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="float:left; width:33%; clear:none">
                                            <input type="text"  name="fiyat" required="" placeholder="00" minlength=2 value="<?=@$_POST['fiyat'] ? @$_POST['fiyat'] : ''?>">
                                        </div>
                                        <!-- /INPUT CONTAINER -->

                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="margin-bottom:0px">
                                            <button class="button gold" name="havaleyap" type="submit">ÖDEME BİLDİRİMİ YAP</button>
                                            <input type="hidden" name="bank" value="<?php echo $bankacek['divid'] ?>">
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <div class="clearfix"></div></form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>


        </div><?php } ?>
    </div>
</div>
</div>
</div>
<!-- /ACCORDION ITEM -->


</div>
</div>
</div>
<!-- /SECTION -->
</div>
</div>
<!-- /SECTION -->

<!-- HIZMETLER -->
<?php include( "./include/hizmetler.php" );?>
<!-- /HIZMETLER -->

<!-- FOOTER -->
<?php include( "./include/footer.php" );?>
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

<!-- SVG CHECK -->
<svg style="display: none;">
    <symbol id="svg-check" viewBox="0 0 15 12" preserveAspectRatio="xMinYMin meet">
        <polygon points="12.45,0.344 5.39,7.404 2.562,4.575 0.429,6.708 3.257,9.536 3.257,9.536
            5.379,11.657 14.571,2.465 "/>
    </symbol>
</svg>
<!-- /SVG CHECK -->

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
<!-- XM Accordion -->
<script src="js/vendor/jquery.xmaccordion.min.js"></script>
<!-- Post Tab -->
<script src="js/side-menu.js"></script>
<script src="js/home.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/user-board.js"></script>
<script src="js/popup-data.js"></script>
<script src="js/alerts.js"></script>
<script type="text/javascript">
    function showHideDiv(ele) {
        var srcElement = document.getElementById(ele);
        if (srcElement != null) {
            if (srcElement.style.display == "block") {
                srcElement.style.display = 'none';
            }
            else {
                srcElement.style.display = 'block';
            }
            return false;
        }
    }
    <?php if(isset($_GET['banka'])){ ?>
    showHideDiv('<?=$_GET['banka']?>');
    <?php } ?>
</script>
</body>
</html>