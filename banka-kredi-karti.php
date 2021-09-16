<?php 
include 'head.php';

$current='bakiye';

?>




<body>
    <!-- MODAL --><!-- POP-UP-ON -->
    <?php include( "./include/gb-bize-sat-all-popup.php");?>
    <?php include( "./include/giris-yap-popup.php");?>
    <!-- MODAL / END -->
    
    <!-- HEADER -->
        <?php include "include/header.php";?>
        <!-- MOBIL-MENU -->
    <?php include "include/mobilmenu.php"; ?>
        <!-- MENU -->
        <?php include( "./include/menu.php");?>
    <!-- HEADER / END -->
    
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap v3">
        <div class="section-headline">
            <h2>PAYTR BANKA & KREDİ KARTI ÖDEME</h2>
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
                    <li class="dropdown-item">
                        <a href="atm-havale-eft">ATM - HAVALE - EFT</a>
                    </li>
                    <li class="dropdown-item active">
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
                    <?php if(isset($_POST['odemeyap'])){?>

                        <div style="width: 100%;margin: 0 auto;display: table;">

                            <?php

                            ## 1. ADIM için örnek kodlar ##

                            ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
                            #
                            ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                            $merchant_id='136867'; // Mağaza numarası
                            $merchant_key='2C3sH8JNcgrFoNYz'; // Mağaza Parolası - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                            $merchant_salt='oobGmG7Jt1gSwxdP'; // Mağaza Gizli Anahtarı - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                            #
                            ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
                            $uyebilgileri=uyeCek();
                            $email = $uyebilgileri->kullanici_mail;
                            ## Kullanıcının IP adresi
                            if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                                $ip = $_SERVER["HTTP_CLIENT_IP"];
                            } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                            } else {
                                $ip = $_SERVER["REMOTE_ADDR"];
                            }

                            $user_ip=$ip;
                            #
                            ## Tahsil edilecek tutar.
                            $payment_amount = ($_POST['kusurat'].$_POST['fiyat']);
                            $bakiye=$payment_amount/100;
                            $islem=$db->query("insert  bakiyeislemleri set  kulid='$uyebilgileri->kullanici_id' ,bakiye='$bakiye' ,islemturu='2',islemdurumu='0',ip='$user_ip' ");
                            $siparisid=$db->lastInsertId();
                            #
                            ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
                            $merchant_oid = $siparisid;
                            #
                            ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
                                $user_name = $uyebilgileri->kullanici_adsoyad;
                            #
                            ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
                            $user_address = $uyebilgileri->kullanici_adres;
                            #
                            ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
                                $user_phone = $uyebilgileri->kullanici_gsm;

                            $merchant_ok_url = "https://www.pvpgoldbar.com/odemelerim.php?odeme=1";

                            $merchant_fail_url = "https://www.pvpgoldbar.com/odemelerim.phpodeme=0";
                            #
                            ## Müşterinin sepet/sipariş içeriği
                            $user_basket = base64_encode(json_encode(array(
                                array("Bakiye",$bakiye, 1)
                            )));
                            #

                            $timeout_limit = "30";

                            $debug_on = 0;

                            $test_mode = 1;

                            $no_installment = 0;
                            $max_installment = 0;

                            $currency = "TL";

                            ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
                            $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
                            $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
                            $post_vals=array(
                                'merchant_id'=>$merchant_id,
                                'user_ip'=>$user_ip,
                                'merchant_oid'=>$merchant_oid,
                                'email'=>$email,
                                'payment_amount'=>$payment_amount,
                                'paytr_token'=>$paytr_token,
                                'user_basket'=>$user_basket,
                                'debug_on'=>$debug_on,
                                'no_installment'=>$no_installment,
                                'max_installment'=>$max_installment,
                                'user_name'=>$user_name,
                                'user_address'=>$user_address,
                                'user_phone'=>$user_phone,
                                'merchant_ok_url'=>$merchant_ok_url,
                                'merchant_fail_url'=>$merchant_fail_url,
                                'timeout_limit'=>$timeout_limit,
                                'currency'=>$currency,
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
                                die("PAYTR IFRAME connection error. err:".curl_error($ch));

                            curl_close($ch);

                            $result=json_decode($result,1);

                            if($result['status']=='success')
                                $token=$result['token'];
                            else
                                die("PAYTR Kredi Kartı Hatası. Sebep:".$result['reason']);
                            #########################################################################

                            ?>

                            <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
                            <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                            <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                            <script>iFrameResize({},'#paytriframe');</script>
                            <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->

                        </div>

                    <?php } ?>
                    <div class="form-box-item" style="margin-bottom:0px;">
                        <div class="alert-boxes-preview">
                            <div class="alert-boxes-preview-description">
                                <img src="images/paytr.jpg" style="margin-bottom:10px; width:180px">
                                <hr class="line-separator2">
                                <p style="margin-bottom:10px">PAYTR Ödeme Sistemi 7/24 Anında Onay</p>
                                <p class="tertiary">% 0 Komisyon</p>
                            </div>
                        
                            <div class="alert-boxes-preview-links">
                                <div class="form-box-item" style="margin-bottom:0px;">
                                    <form action="" method="post">
                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="float:right; width:30%; clear:none;">
                                            <p class="bakiye-tl"><i class="fa fa-try" aria-hidden="true"></i> Türk Lirası</p>
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- INPUT CONTAINER -->

                                        <div class="input-container" style="float:left; width:33%; clear:none">
                                            <input type="text" id="files_included2" name="kusurat" required="" minlength=1 placeholder="00" value="<?=@$_POST['kusurat'] ? @$_POST['kusurat']:''?>">
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="float:left; width:4%; clear:none">
                                            <p class="text-header" style="margin-top:24px; text-align:center;">.</p>
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="float:left; width:33%; clear:none">
                                            <input type="text" id="files_included" name="fiyat" placeholder="00" minlength=2 required="" value="<?=@$_POST['fiyat'] ? @$_POST['fiyat']:''?>">
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <!-- /INPUT CONTAINER -->

                                        <!-- INPUT CONTAINER -->
                                        <div class="input-container" style="margin-bottom:0px">
                                            <button class="button gold" type="submit" name="odemeyap">ÖDEME YAP</button>
                                        </div>
                                        <!-- /INPUT CONTAINER -->
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-box-item" style="margin-bottom:0px;">
                        <h4>GÜVENLİ ÖDEME</h4>
                        <p style="text-align:justify; margin-top:10px; font-size: 10px;">Yükleme yapmak istediğiniz tutarı belirleyip “kredi kartı ile ödeme yap” butonuna tıkladığınız anda, Türkiye’nin en güvenilir ödeme sistemlerinden biri olan PAYTR firmasının ödeme sayfasına yönlendirilir ve 3D Secure güvenli ödeme sistemi (bankanızdan SMS ile gönderilen onay mesajını ödeme ekranına girerek) ile ödemeni
                        zi gerçekleştirirsiniz. Ödemeyi tamamladığınız anda, yüklemiş olduğunuz bakiye hesabınızda görünecektir. Kredi kartı bilgileriniz kesinlikle Epinci.NET'de saklanmaz.</p>
                    </div>
                </div>
                <!-- /BADGE BOXES -->
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

<!-- jQuery -->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="js/vendor/jquery.tooltipster.min.js"></script>
<!-- Owl Carousel -->
<script src="js/vendor/owl.carousel.min.js"></script>
<!-- XM Tab -->
<script src="js/vendor/jquery.xmtab.min.js"></script>
<!-- Post Tab -->
<script src="js/post-tab2.js"></script>
<!-- XM Accordion -->
<script src="js/vendor/jquery.xmaccordion.min.js"></script>
<!-- Magnific Popup -->
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/popup-data.js"></script>
<!-- Alert-Data -->
<script src="js/vendor/jquery.xmalert.min.js"></script>

<!-- Social -->

<!-- Side Menu -->
<script src="js/side-menu.js"></script>
<!-- Tooltip -->
<script src="js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="js/user-board.js"></script>
</body>
</html>