<?php
include 'head.php';

include "fonksiyon.php";


$currentleft='hesabim';

if(!uyeCek()){
    header("location:index.php?durum=girisgerekli");
    exit;
}



$kckategorisor=$db->prepare("SELECT * FROM kategori WHERE itemilan='1' or karakterilan='1' or gbilan='1' or cssilan='1' order by kategori_sira ASC");
$kckategorisor->execute();



?>


<body>
<!-- HEADER-ON -->
<?php include "include/header.php"; ?>
<?php include( "./include/giris-yap-popup.php");?>
<!-- MOBIL-MENU-ON -->
<?php include( "./include/mobilmenu.php");?>

<!-- MENU-ON -->
<?php include( "./include/menu.php");?>

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
    <div class="section-headline">
        <h2>Yeni İlan Ekle</h2>
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
                    <div class="input-container">
                        <label for="category" class="rl-label required">Hangi oyunda ilan vermek istiyorsunuz ? </label>
                        <label for="category" class="select-block">

                        <form action="" method="POST">


                                    <?php if (isset($_POST['kategori_id'])) {
                                        $katagId2=$_POST['kategori_id'];
                                        $kategorisor2=$db->query("SELECT * FROM kategori WHERE kategori_id='$katagId2'");
                                        $kategoricek2=$kategorisor2->fetch(PDO::FETCH_ASSOC);
                                        ?>
                            <select disabled="" style="background-color: grey; color:white;" id="selectt" name="kategori_id">
                                        <option selected=""  value="<?php echo $kategoricek2['kategori_id']; ?>"><?php echo $kategoricek2['kategori_ad']; ?></option>

                                    <?php } else { ?>
                                <select id="selectt" name="kategori_id">
                                <option>Oyun Seçiniz</option>
<?php
                                        while ($kckategoricek = $kckategorisor->fetch(PDO::FETCH_ASSOC)) {

                                            ?> <option  value="<?php echo $kckategoricek['kategori_id']; ?>"><?php echo $kckategoricek['kategori_ad']; ?></option><?php } ?>

                                <?php } ?>
                            </select>
                            <br><br>
                                <?php if (empty($_POST['kategori_id'])) {
                                $katagId2=@$_POST['kategori_id'];
                                $kategorisor2=$db->query("SELECT * FROM kategori WHERE kategori_id='$katagId2'");
                                $kategoricek2=$kategorisor2->fetch(PDO::FETCH_ASSOC);
                                ?>
                            <button class="button secondary" type="submit" >SEÇ</button>
                                <?php } ?>
                        </form>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </label>
                    </div>
                    <!-- /INPUT CONTAINER OYUN SEÇ -->
<?php
$katagId=@$_POST['kategori_id'];
$kategorisor1=$db->query("SELECT * FROM kategori WHERE kategori_id='$katagId'");
$kategoricek1=$kategorisor1->fetch(PDO::FETCH_ASSOC);


if($_POST) { ?>
                    <!-- POST TAB -->
                <div  class="post-tab">
                    <!-- TAB HEADER -->
                    <div id="tb" class="tab-header primary">
                        <!-- TAB ITEM -->

                        <?php if ($kategoricek1['itemilan']==1) { ?>
                            <div id="item" class="tab-item">
                                <p class="text-header small">İtem İlanı Ekle</p>
                            </div>
                        <?php } ?>
                        <!-- /TAB ITEM -->

                        <!-- TAB ITEM -->
                        <?php if ($kategoricek1['karakterilan']==1) { ?>
                            <div id="krk" class="tab-item">
                                <p class="text-header small">Karakter İlanı Ekle</p>
                            </div>
                        <?php } ?>
                        <!-- /TAB ITEM -->

                        <!-- TAB ITEM -->
                        <?php if ($kategoricek1['cssilan']==1) { ?>
                            <div  id="css" class="tab-item">
                                <p class="text-header small">CSS İlanı Ekle</p>
                            </div>
                        <?php } ?>
                        <!-- /TAB ITEM -->

                        <!-- TAB ITEM -->
                        <?php if ($kategoricek1['gbilan']==1) { ?>
                            <div id="gb" class="tab-item">
                                <p class="text-header small">Gold Bar İlanı Ekle</p>
                            </div>
                        <?php } ?>

                        <!-- /TAB ITEM -->
                    </div>
                    <!-- /TAB HEADER -->

                    <!-- ITEM TAB CONTENT -->
                    <div id="cek" class="tab-content void">
                        </br>
                        <form action="netting/itemilanislem.php" method="POST" enctype="multipart/form-data">
                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="item_name" class="rl-label required">İlan Başlığı ( 25 Karakter ) </label>
                                <input type="text" required="" id="item_name" name="baslik"  placeholder="İLAN BAŞLIĞI">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="category" class="rl-label required">Teslimat Süresi</label>
                                <label for="category" class="select-block">
                                    <select required="" name="teslim" id="category">
                                        <option>TESLİMAT SÜRENİZ</option>
                                        <option value="1">1 Saat</option>
                                        <option value="3">3 Saat</option>
                                        <option value="5">5 Saat</option>
                                        <option value="12">12 Saat</option>

                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="item_description" class="rl-label required">Açıklama Ekle </label>
                                <textarea id="item_description" required=""  name="aciklama" placeholder=""></textarea>
                            </div>
                            <input type="hidden" name="kategori_id" value="<?php echo $kategoricek1['kategori_id']; ?>" >
                            <!-- /INPUT CONTAINER -->

                            <label for="item_name" class="rl-label required">Resim Ekle </label>
                            <div class="input-container">
                                <input required=""  type="file" name="ilanresmi">
                            </div>

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label required">Satış Fiyatı</label>
                                <input type="text" id="cekilecek" required=""  name="fiyat" placeholder="100.00">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="item_dimensions" class="rl-label">Bakiyenize Yüklenecek Miktar</label>
                                <input type="text" id="tutar" name="tutar" readonly="" value="0.00">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <div class="clearfix"></div>

                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter1" name="aVitrin">
                            <label for="filter1">
                                <span class="checkbox tertiary"><span></span></span>
                                Anasayfa Vitrin'de Göster <a class="ilan-ekle-1">1.50 ₺</a>
                            </label>
                            <!-- /CHECKBOX -->
                            <!-- CHECKBOX -->
                            <input  type="checkbox" id="filter2" name="oVitrin">
                            <label for="filter2">
                                <span class="checkbox tertiary"><span></span></span>
                                Oyuncu Pazarı Vitrin'de Göster <a class="ilan-ekle-2">1.00 ₺</a>
                            </label>

                            <input  type="checkbox" id="filter3" name="renkli">
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
                            <button type="submit" name="itemilan" class="button mid dark">KAYDET</button>
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
                    <div id="cek1" class="tab-content void">
                        </br>
                        <form action="netting/karakterilanislem.php" method="POST" enctype="multipart/form-data">
                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="item_name" class="rl-label required">İlan Başlığı ( 25 Karakter ) </label>
                                <input type="text" required=""  id="item_name" name="baslik" placeholder="İLAN BAŞLIĞI">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="category" class="rl-label required">Irk </label>
                                <label for="category" class="select-block">
                                    <select required="" name="irk" id="category">
                                        <option >IRK SEÇİN</option>
                                        <option value="1">Karus</option>
                                        <option value="2">El Morad</option>
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
                                        <option value="1">Warrior</option>
                                        <option value="2">Rogue</option>
                                        <option value="3">Magician</option>
                                        <option value="4">Priest</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <input type="hidden" name="kategori_id" value="<?php echo $kategoricek1['kategori_id']; ?>" >
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Level </label>
                                <input type="text" required=""  id="files_included" name="level" placeholder="ÖRNEK : 83">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">National Point ( NP ) </label>
                                <input type="text" required=""  id="files_included" name="np" placeholder="ÖRNEK : 150K">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Cash Miktarı </label>
                                <input type="text"  required="" id="files_included" name="cash" placeholder="ÖRNEK : 2500">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Premium Tipi </label>
                                <input type="text" required=""  id="files_included" name="preTip" placeholder="ÖRNEK : EXP">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Premium Saati </label>
                                <input type="text" required=""  id="files_included" name="preSaat" placeholder="ÖRNEK : 250">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Quest İtem</label>
                                <input type="text" required=""  id="files_included" name="quest" placeholder="ÖRNEK : +3 KALKAN">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="category" class="rl-label required">Teslimat Süresi</label>
                                <label for="category" class="select-block">
                                    <select required=""  name="teslim" id="category">
                                        <option >TESLİMAT SÜRENİZ</option>
                                        <option value="1">1 Saat</option>
                                        <option value="3">3 Saat</option>
                                        <option value="5">5 Saat</option>
                                        <option value="12">12 Saat</option>

                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="item_description" class="rl-label required">Açıklama Ekle</label>
                                <textarea required=""  id="item_description" name="aciklama" placeholder=""></textarea>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <label for="item_name" class="rl-label required">Resim Ekle </label>
                            <div class="input-container">
                                <input type="file" required=""  name="ilanresmi">
                            </div>

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label required">Satış Fiyatı</label>
                                <input type="text" required=""  id="cekilecek1" name="fiyat" placeholder="100.00">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="item_dimensions" class="rl-label">Bakiyenize Yüklenecek Miktar </label>
                                <input type="text" id="tutar1" name="tutar" value="0.00" readonly="">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <div class="clearfix"></div>

                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter5" name="aVitrin">
                            <label for="filter5">
                                <span class="checkbox tertiary"><span></span></span>
                                Anasayfa Vitrin'de Göster <a class="ilan-ekle-1">1.50 ₺</a>
                            </label>
                            <!-- /CHECKBOX -->
                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter6" name="oVitrin">
                            <label for="filter6">
                                <span class="checkbox tertiary"><span></span></span>
                                Oyuncu Pazarı Vitrin'de Göster <a class="ilan-ekle-2">1.00 ₺</a>
                            </label>
                            <input  type="checkbox" id="filter7" name="renkli">
                            <label for="filter7">
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
                            <input required=""  type="checkbox" id="filter8" name="kosul">
                            <label for="filter8"><span class="checkbox tertiary"><span></span></span>
                                <a href="#ilan-kosullari" class="promo-popup" style="color:#e61852;font-weight:bold;">İlan verme koşulları</a>'nı okuyup kabul ettim.
                            </label>
                            <!-- /CHECKBOX -->

                            </BR>
                            <button type="submit" name="karakterilan" class="button mid dark">KAYDET</button>
                        </form>


                    </div>
                    <script>
                        $( "body" ).on( "keyup", "#cek1 #cekilecek1", function(button) {

                            console.log(this);
                            var cekilecek= $("#cek1 input[name=fiyat]").val();



                            var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                            $("#cek1 input[name=tutar]").val(hesaplama);
                        });
                        $( "body" ).on( "change", "#cek1 #cekilecek1", function(button) {

                            console.log(this);
                            var cekilecek= $("#cek1 input[name=fiyat]").val();



                            var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                            $("#cek1 input[name=tutar]").val(hesaplama);
                        });



                    </script>
                    <!-- /KARAKTER TAB CONTENT -->

                    <!-- CSS TAB CONTENT -->
                    <div id="cek2" class="tab-content void">
                        </br>
                        <form action="netting/cssilanislem.php" method="POST" enctype="multipart/form-data">
                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="item_name" class="rl-label required">İlan Başlığı ( 25 Karakter ) </label>
                                <input required=""  type="text" id="item_name" name="baslik" placeholder="İLAN BAŞLIĞI">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="category" class="rl-label required">Irk </label>
                                <label for="category" class="select-block">
                                    <select required=""  name="irk" id="category">
                                        <option>IRK SEÇİN</option>
                                        <option value="1">Karus</option>
                                        <option value="2">El Morad</option>
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
                                        <option value="1">Warrior</option>
                                        <option value="2">Rogue</option>
                                        <option value="3">Magician</option>
                                        <option value="4">Priest</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <input type="hidden" name="kategori_id" value="<?php echo $kategoricek1['kategori_id']; ?>" >
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Level </label>
                                <input type="text" required=""  id="files_included" name="level" placeholder="ÖRNEK : 83">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">National Point ( NP ) </label>
                                <input type="text" required=""  id="files_included" name="np" placeholder="ÖRNEK : 150K">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="files_included" class="rl-label required">Quest İtem</label>
                                <input type="text"  required="" id="files_included" name="quest" placeholder="ÖRNEK : +3 KALKAN">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half2">
                                <label for="category" class="rl-label required">Teslimat Süresi</label>
                                <label for="category" class="select-block">
                                    <select required=""  name="teslim" id="category">
                                        <option>TESLİMAT SÜRENİZ</option>
                                        <option value="1">1 Saat</option>
                                        <option value="3">3 Saat</option>
                                        <option value="5">5 Saat</option>
                                        <option value="12">12 Saat</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="item_description" class="rl-label required">Açıklama Ekle</label>
                                <textarea required=""  id="item_description" name="aciklama" placeholder=""></textarea>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <label for="item_name" class="rl-label required">Resim Ekle </label>
                            <div class="input-container">
                                <input required=""  type="file" name="ilanresmi">
                            </div>

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label required">Satış Fiyatı</label>
                                <input type="text" required=""  id="cekilecek2" name="fiyat" placeholder="100.00">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="item_dimensions" class="rl-label">Bakiyenize Yüklenecek Miktar </label>
                                <input type="text" id="tutar" name="tutar" value="0.00" readonly="">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <div class="clearfix"></div>

                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter9" name="aVitrin">
                            <label for="filter9">
                                <span class="checkbox tertiary"><span></span></span>
                                Anasayfa Vitrin'de Göster <a class="ilan-ekle-1">1.50 ₺</a>
                            </label>
                            <!-- /CHECKBOX -->
                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter10" name="oVitrin">
                            <label for="filter10">
                                <span class="checkbox tertiary"><span></span></span>
                                Oyuncu Pazarı Vitrin'de Göster <a class="ilan-ekle-2">1.00 ₺</a>
                            </label>
                            <input  type="checkbox" id="filter11" name="renkli">
                            <label for="filter11">
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
                            <input required=""  type="checkbox" id="filter12" name="kosul">
                            <label for="filter12"><span class="checkbox tertiary"><span></span></span>
                                <a href="#ilan-kosullari" class="promo-popup" style="color:#e61852;font-weight:bold;">İlan verme koşulları</a>'nı okuyup kabul ettim.
                            </label>
                            <!-- /CHECKBOX -->

                            </BR>
                            <button type="submit" name="cssilan" class="button mid dark">KAYDET</button>
                        </form>

                    </div>
                    <script>
                        $( "body" ).on( "keyup", "#cek2 #cekilecek2", function(button) {

                            console.log(this);
                            var cekilecek= $("#cek2 input[name=fiyat]").val();



                            var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                            $("#cek2 input[name=tutar]").val(hesaplama);
                        });
                        $( "body" ).on( "change", "#cek2 #cekilecek2", function(button) {

                            console.log(this);
                            var cekilecek= $("#cek2 input[name=fiyat]").val();



                            var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                            $("#cek2 input[name=tutar]").val(hesaplama);
                        });



                    </script>
                    <!-- /CSS TAB CONTENT -->

                    <!-- GB CSS TAB CONTENT -->
                    <div id="cek3" class="tab-content void">
                        </br>
                        <form action="netting/gbilanislem.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="<?php echo $kategoricek1['kategori_id']; ?>" >
                            <div class="input-container">
                                <label for="item_name" class="rl-label required">İlan Başlığı ( 25 Karakter ) </label>
                                <input type="text" id="item_name" name="baslik" placeholder="İLAN BAŞLIĞI">
                            </div>
                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="category" class="rl-label required">Oyun Parası Seçin</label>
                                <label for="category" class="select-block">
                                    <select required=""  name="oPara" id="category">
                                        <option >OYUN PARASI TİPİ(GB-SB)</option>
                                        <option value="1">Silver Bar 10.000.000 Noah</option>
                                        <option value="2">Gold Bar 100.000.000 Noah</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>

                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="category" class="rl-label required">Teslimat Süresi </label>
                                <label for="category" class="select-block">
                                    <select required=""  name="teslim" id="category">
                                        <option value="0">TESLİMAT SÜRENİZ</option>
                                        <option value="1">1 Saat</option>
                                        <option value="3">3 Saat</option>
                                        <option value="5">5 Saat</option>
                                        <option value="12">12 Saat</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <!-- /INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="item_description" class="rl-label required">Açıklama Ekle</label>
                                <textarea required=""  id="item_description" name="aciklama" placeholder=""></textarea>
                            </div>

                            <div class="clearfix"></div>

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="files_included" class="rl-label required">Satış Fiyatı</label>
                                <input type="text" required=""  id="cekilecek3" name="fiyat" placeholder="100.00">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="item_dimensions" class="rl-label">Bakiyenize Yüklenecek Miktar </label>
                                <input type="text" id="tutar" name="tutar" value="0.00" disabled>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <div class="clearfix"></div>

                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter13" name="aVitrin">
                            <label for="filter13">
                                <span class="checkbox tertiary"><span></span></span>
                                Anasayfa Vitrin'de Göster <a class="ilan-ekle-1">1.50 ₺</a>
                            </label>
                            <!-- /CHECKBOX -->
                            <!-- CHECKBOX -->
                            <input type="checkbox" id="filter14" name="oVitrin">
                            <label for="filter14">
                                <span class="checkbox tertiary"><span></span></span>
                                Oyuncu Pazarı Vitrin'de Göster <a class="ilan-ekle-2">1.00 ₺</a>
                            </label>
                            <input  type="checkbox" id="filter15" name="renkli">
                            <label for="filter15">
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
                            <input required=""  type="checkbox" id="filter16" name="kosul">
                            <label for="filter16"><span class="checkbox tertiary"><span></span></span>
                                <a href="#ilan-kosullari" class="promo-popup" style="color:#e61852;font-weight:bold;">İlan verme koşulları</a>'nı okuyup kabul ettim.
                            </label>
                            <!-- /CHECKBOX -->

                            </BR>
                            <button type="submit" name="gbilan" class="button mid dark">KAYDET</button>
                        </form>

                    </div>
                    <script>
                        $( "body" ).on( "keyup", "#cek3 #cekilecek3", function(button) {

                            console.log(this);
                            var cekilecek= $("#cek3 input[name=fiyat]").val();



                            var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                            $("#cek3 input[name=tutar]").val(hesaplama);
                        });
                        $( "body" ).on( "change", "#cek3 #cekilecek3", function(button) {

                            console.log(this);
                            var cekilecek= $("#cek3 input[name=fiyat]").val();



                            var hesaplama=(cekilecek-(cekilecek*10/100)).toFixed(2);

                            $("#cek3 input[name=tutar]").val(hesaplama);
                        });



                    </script>
                    <!-- /GB CSS TAB CONTENT -->

                </div>
                <?php } ?>

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
<?php  if ($_GET['durum']=="itemilanbasarili" or $_GET['durum']=="karakterilanbasarili" or $_GET['durum']=="gbilanbasarili" or $_GET['durum']=="cssilanbasarili" ) {?>
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
            paragraph: 'İlan işleminiz başarılı. Yöneticilerimiz tarafından incelenip onaylanacaktır.',
        });
    </script>
<?php } ?>


</body>

</html>