<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?><title>Region Details</title>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <?php 
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM region_description WHERE id = $id";
                    $region_data = $connection->query($sql)->fetch_array();
                    ?>
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title text-center">Region:<?php echo $region_data['region_name']?></strong></center>
                        </div>
                        <div class="card-body">
                            <div class="mt-2 p-3 row">
                                  <h5 class="text-dark">Internet Provider</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['provider']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Public IP address</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['public_ip']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Gateway IP address</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['gateway_ip']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Router IP address</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['regional_ip']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Router Serial Number</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['routersn']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Switch IP address</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['coreswitch_ip']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Switch Serial Number</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['coreswitch_sn']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">AC IP address</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['acipadress']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">AC Serial Number</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['acsn']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Huawei Port Number</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['portnumber']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Management Anydesk ID</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['mngmtanydeskId']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Remote Anydesk ID</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['remoteanydeskId']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Number of zones</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['zonesnumber']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">POP</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['pop']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">TL Support</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['tsname']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">TL contact</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['tscontact']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Building Turn On Personnel[MATON]</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['btopersonnel']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Manintenance Response Personnel</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['mrpersonell']?></p> 
                            </div>
                            <div class="mt-2 p-2 row">
                                  <h5 class="text-dark">Installation Response Personnel</h5> &nbsp;:&nbsp;
                                  <p class="text-success font-bold"><?php echo $region_data['irpersonnel']?></p> 
                            </div>

                        </div>
                          
                           
                        </div>
                    </div>
                </div>

</div><!-- .content -->

<div class="clearfix"></div>

</div><!-- /#right-panel -->
