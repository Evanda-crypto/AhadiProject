<?php 
include("includes.php");
include "session.php";
include "../config/config.php";
include_once("../includes/regions.php")
?>
    <title>New Region</title>
    <div class="card p-4">
        <div class="card-header bg-success">
            <h5 class="text-center ">New Record</h5>
            <?php if(isset($_SESSION['success'])){?>
                <div class="p-3 bg-info"><?php $_SESSION['success']?></div>
                <?php } ?>
        </div>
        <div class="card-body p-3">
             <form action="new_region_records.php" method="POST">
                <div class="d-flex p-3">
                    <div class="form-group w-50 ml-4">
                         <label for="region">Region Name</label>
                         <input type="text" class="form-control" 
                         name="region" placeholder="Region" required>
                    </div>
                    <div class="form-group w-50 ml-2 mr-4">
                         <label for="region">Provider</label>
                         <select class="form-control w-full" name="provider">
                            <option value="SEACOM">SEACOM</option>
                            <option value="CTG">CTG</option>
                         </select>
                    </div>
                </div>
                <div class="d-flex p-3">
                   <div class="form-group w-25 ml-4">
                         <label for="public ip  ">Public IP</label>
                         <input type="text" class="form-control" 
                         name="public_ip" placeholder="Public IP" required>
                    </div>
                    <div class="form-group w-25 ml-4">
                             <label for="gateway ip">Gateway IP</label>
                             <input type="gatewayip" name="gateway_ip"class="form-control" placeholder="Gateway IP address" required>
                    </div>
                    <div class="form-group w-25 ml-4">
                        <label for="regional_ip">Router IP address</label>
                        <input type="ip" class="form-control " name="regional_ip" placeholder="Regional IP address" required>
                    </div>
                </div>
                <div class="d-flex p-3">
                    <div class="form-group w-50 ml-4">
                        <label for="switch">Router Serial Number</label>
                        <input type="ip" class="form-control " name="routersn"placeholder="Switch IP address" required>
                    </div>
                    <div class="form-group w-50 ml-2 mr-2">
                         <label for="port_number">Huawei Port Number</label>
                         <input type="port" class="form-control " name="port_number"  placeholder="Port Number">
                    </div>
                </div>
                 
                
                 <div class="d-flex p-3">
                    <div class="form-group w-50 ml-4 mr-2">
                    <label for="switch">Core Switch IP</label>
                    <input type="ip" class="form-control w-full" name="switchip"placeholder="Switch IP address" required>
                    </div>
                    <div class="form-group ml-2 w-50 ml-2 mr-2">
                        <label for="switch">Switch Serial Number</label>
                        <input type="ip" class="form-control " name="switch_serial"placeholder="Switch IP address" required>
                    </div>
                         
                 </div>
                
                 <div class="d-flex p-3">
                    
                     <div class="form-group w-50 ml-4">
                         <label for="switch">AC Serial Number</label>
                         <input type="ip" class="form-control" name="acserial"placeholder="AC serial number" required>
                     </div>
                     <div class="form-group w-50 ml-2 mr-2">
                          <label for="switch">AC IP address</label>
                          <input type="ip" class="form-control " name="acip"placeholder="AC serial number" required>
                     </div>
                    
                 </div>

                 <div class="d-flex p-3 ">   
                    <div class="form-group w-25 ml-4">
                         <label for="anydesk">Main AnyDesk ID</label>
                         <input type="port" class="form-control " name="main_anydeskid"  placeholder="Main Anydesk ID" required>
                    </div>
                     <div class="form-group w-25 ml-4">
                        <label for="remote_anydeskid">Remote Anydesk ID</label>
                        <input type="id" class="form-control" name="remote_anydeskid"  placeholder="Remote Anydesk ID" required>
                     </div>
                     <div class="form-group w-25 ml-4">
                          <label for="remote_anydeskid">Management Anydesk ID</label>
                          <input type="id" class="form-control " name="mngmt_anydeskid"  placeholder="Management Anydesk ID" required>
                    </div>
                   
                 </div>

                 <div class="d-flex p-3">
                     <div class="form-group w-25 ml-4">
                         <label for="remote_anydeskid">Zones</label>
                         <input type="zones" class="form-control " name="zones"  placeholder="Number of Zones" required>
                     </div>
                     <div class="form-group w-25 ml-4">
                          <label for="remote_anydeskid">POP Name</label>
                          <input type="pop" class="form-control" name="pop"  placeholder="POP" required>
                     </div>
                     <div class="form-group w-25 ml-4">
                         <label for="Technical Support">Technical Support</label>
                         <input type="text" class="form-control " name="tsname"  placeholder="Name of Tech Support" required>
                     </div>
                 </div>

                 <div class="d-flex p-3">
                     <div class="form-group w-25 ml-4">
                         <label for="tech suport">Tech Support Contact</label>
                         <input type="phone" class="form-control " name="tscontact"  placeholder="+254">
                     </div>
                     <div class="form-group w-25 ml-4">
                         <label for="tech suport">BTO Personnel[MATON]</label>
                         <input type="btopersonell" class="form-control" name="btopersonell"  placeholder="BTO personell" required>
                     </div>
                    
                 </div>
                 <div class="d-flex p-3">
                 <div class="form-group w-25 ml-4">
                         <label for="tech suport">Sales Response Personnel</label>
                         <input type="srpersonell" class="form-control required" name="srpersonell"  placeholder="Sales Personell">
                     </div>
                     <div class="form-group w-25 ml-4">
                         <label for="tech suport">Maintenanc Personnel[MATON]</label>
                         <input type="btopersonell" class="form-control " name="mrpersonell"  placeholder="Maintenance MATTON">
                     </div>
                     <div class="form-group w-25 ml-4">
                         <label for="tech suport">Installation  Personnel[MATON]</label>
                         <input type="btopersonell" class="form-control " name="irpersonell"
                         placeholder="Installation Response Personell">
                     </div>
                 </div>
                 
                </div>
                    <button type="submit" class="btn btn-warning btn-md w-25 mb-3 ml-5" name="submit_btn">Save</button>          
            </form>
        </div>    
    </div>
</div>



    
