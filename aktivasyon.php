<?php
include "admins/netting/baglan.php";

$eposta = $_GET["eposta"];
$kod    = $_GET["kod"];

if(!$eposta || !$kod){
    Header("Location: index.php?aktivasyon=bos");
}else {

    $query = $db->prepare("select * from musteri where kullanici_mail=? and kod=? and kullanici_durum=?");
    $query->execute(array($eposta,$kod,0));
    $query->fetch(PDO::FETCH_ASSOC);
    $kontrol = $query->rowCount();

    if($kontrol){

        $update = $db->prepare("update musteri set  
			
			        kullanici_durum=? where kullanici_mail=? and kod=? and kullanici_durum=?
			
			");

        $ok =  $update->execute(array(1,$eposta,$kod,0));

        if($ok == true){
            Header("Location: index.php?aktivasyon=basarili");
        }else	{
            Header("Location: index.php?aktivasyon=basarisiz");
        }


    }else {
        Header("Location: index.php?aktivasyon=kullanilmiskod");

        }


    }



?>