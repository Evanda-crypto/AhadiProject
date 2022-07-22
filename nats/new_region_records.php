<?php 
include("../config/config.php");
session_start();
$region_name = $_POST['region'];
$provider = $_POST['provider'];
$public_ip = $_POST['public_ip'];
$gateway_ip = $_POST['gateway_ip'];
$regional_ip = $_POST['regional_ip'];
$switch_ip = $_POST['switchip'];
$switch_serial = $_POST['switch_serial'];
$acserial = $_POST['acserial'];
$acipaddress = $_POST['acip'];
$router_serial = $_POST['routersn'];
$port_number = $_POST['port_number'];
$main_anydeskid = $_POST['main_anydeskid'];
$remote_anydeskid = $_POST['remote_anydeskid'];
$mngmt_anydeskid = $_POST['mngmt_anydeskid'];
$zones = $_POST['zones'];
$pop_name = $_POST['pop'];
$tech_support = $_POST['tsname'];
$tscontact = $_POST['tscontact'];
$btoname = $_POST['btopersonell'];
$srpersonell = $_POST['srpersonell'];
$mrpersonell = $_POST['mrpersonell'];
$irpersonell = $_POST['irpersonell'];
if(isset($_POST['submit_btn']))
{
  $sql = "INSERT INTO region_description(region_name,provider,public_ip,gateway_ip,regional_ip,coreswitch_ip,acsn,routersn,coreswitch_sn,acipadress,portnumber,mainanydeskId,mngmtanydeskId,remoteanydeskId,zonesnumber,pop,tsname,tscontact,btopersonell,srpersonell,mrpersonell,irpersonell) VALUES('$region_name','$provider','$public_ip','$gateway_ip','$regional_ip','$switch_ip','$acserial','$router_serial','$switch_serial','$acipaddress','$port_number','$main_anydeskid','$mngmt_anydeskid','$remote_anydeskid','$zones','$pop_name','$tech_support','$tscontact','$btoname','$srpersonell','$mrpersonell','$irpersonell')";
  
  $insert = $connection->query($sql);
  if($insert){
    $_SESSION['success']= "Region created successfully";
    header("Location:fill_region_report.php");
  }

}
if(isset($_POST['edit_btn'])){
  $id = $_GET['id'];
  // echo $remote_anydeskid;
  // echo $mngmt_anydeskid;
  $sql = "UPDATE `region_description`   SET `id`='$id',`region_name`='$region_name',`provider`='$provider',`public_ip`='$public_ip',`gateway_ip`='$gateway_ip',`regional_ip`='$regional_ip',`coreswitch_ip`='$switch_ip',`acsn`='$acserial',`routersn`='$router_serial',`coreswitch_sn`='$switch_serial',`acipadress`='$acipadress',`portnumber`='$port_number',`mngmtanydeskId`='$mngmt_anydeskid',`remoteanydeskId`='$remote_anydeskid',`zonesnumber`='$zones',`pop`='$pop_name',`tsname`='$tsname',`tscontact`='$tscontact',`btopersonell`='$btoname',`srpersonell`='$srpersonell',`mrpersonell`='$mrpersonell',`irpersonell`='$irpersonell' WHERE `id` = $id";
$update =  $connection->query($sql);
if($update){
  $_SESSION['success']= "Region updated successfully";
  header("Location: view_regional_report.php");
}

}
?>