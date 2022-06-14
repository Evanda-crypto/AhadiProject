<?php
include("../config/config.php");
include("session.php");


if(isset($_POST["submit"])){
    $Bname = trim($_POST['bname']);
    $Bcode = trim($_POST['bcode']);
    $status = trim($_POST['status']);
    $zones = trim($_POST['zones']);
    $region = trim($_POST['region']);
    $vlanid_device = trim($_POST['vlanid_device']);
    $vlanid_user = trim($_POST['vlanid_user']);
    $device_ip = trim($_POST['device_ip']);
    $user_ip = trim($_POST['user_ip']);
    $cluster = trim($_POST['cluster']);
    $iap = trim($_POST['iap']);
    $pap = trim($_POST['pap']);
    $oap = trim($_POST['oap']);
    $p2226d = trim($_POST['2226d']);
    $p20p_2422 = trim($_POST['20p_2422']);
    $p16p_1218 = trim($_POST['16p_1218']);
    $p16p_2218 = trim($_POST['16p_2218']);
    $p8p_2210 = trim($_POST['8p_2210']);
    $p8p_1210 = trim($_POST['8p_1210']);
    $p8p_2008 = trim($_POST['8p_2008']);
    $p5p_2005 = trim($_POST['5p_2005']);

                    
                        $insert = $connection->query("INSERT INTO ip_document_reports (zones,vlanid_device,vlanid_user,device_ip,user_ip,cluster,buildings,building_codes,bstatus,iap,
        oap,pap,2226d,20p_2422,16p_1218,16p_2218,8p_2210,8p_1210,8p_2008,5p_2005,region) VALUES ('$zones','$vlanid_device','$vlanid_user','$device_ip','$user_ip','$cluster','$Bname','$Bcode','$status','$iap',
        '$oap','$pap','$p2226d','$p20p_2422','$p16p_1218','$p16p_2218','$p8p_2210','$p8p_1210','$p8p_2008','$p5p_2005','$region')");
                    if($insert){
                        $_SESSION["success"] = "Submitted";
                        header("Location: new_ip_entry.php");
                    }else{
                        $_SESSION["status"] = "Error.Please try again";
                    header("Location: new_ip_entry.php");
                    }
}
?>
