<?php
function uyeCek($id=false){
    global $db;
    if($id==false){
        $id=$_SESSION['userkullanici_mail'];
    }
    $uyebilgi=$db->query("Select * from musteri where kullanici_id='$id' || kullanici_mail='$id' ")->fetch(PDO::FETCH_OBJ);
    if($uyebilgi){
        return $uyebilgi;
    }else{
        return false;
    }
}



function uyeBilgiCek($mail){
    global $db;
    if($mail==null){
        $id=$_SESSION['userkullanici_mail'];
    }
    $uyebilgi=$db->query("Select * from musteri where  kullanici_mail='$mail' ")->fetch(PDO::FETCH_OBJ);
    if($uyebilgi){
        return $uyebilgi;
    }else{
        return false;
    }
}


?>