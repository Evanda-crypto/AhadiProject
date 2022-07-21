<?php
include "includes.php";
include "session.php";
include "../config/config.php";
?>
        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
                <div class="col-lg-">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Building Report</h3>
                                        </div>
                                        <hr>
                                        <?php if (
                                            isset($_SESSION["status"])
                                        ) { ?>
               <center><span> <div class="alert alert-danger" role="alert">
                   <?php
                   echo $_SESSION["status"];
                   unset($_SESSION["status"]);
                   ?>
                 </div></span></center>
                <?php } elseif (isset($_SESSION["success"])) { ?>
                <center><span><div class="alert alert-success" role="alert">
                   <?php
                   echo $_SESSION["success"];
                   unset($_SESSION["success"]);
                   ?>
                 </div></span></center>
                <?php } ?>
                                        <form method="POST" action="new_building_details.php">
                                        <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">   
                                            <strong><label for="cc-payment" class="control-label mb-1">Building Name<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-pament" name="bname"  type="text" required  class="form-control" aria-required="true" aria-invalid="false" placeholder="Building Name">
                                            </div>
                                               </div>
                                               <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Building Code<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-name" name="bcode" type="text" class="form-control cc-name valid" pattern="[A-Z]{5}[0-9]{5}" required  data-val="true" placeholder="Building Code Format: ABCDE12345"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>

                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label> </strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a region..." class="standardSelect form-control" name="Region" tabindex="1" required>
                                            <option disabled selected >Choose Region...</option>
                                            <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                            <option value="G45S">G45S</option>
                                            <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                            <option value="KWT">KWT</option> 
                                            <option value="HTR">HTR</option>
                                           <option value="MWK">MWK</option>
                                            </select>
                                            </div>
                                            </div>
                                            <div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Status<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Status..." class="standardSelect form-control" name="bstatus" tabindex="1" required>
                                            <option disabled selected >Choose  Status...</option>
                                            <option value="2. Signed">2. Signed</option>
                                                  <option value="3. Cabled">3. Cabled</option>
                                               <option value="4. Fully Installed">4. Fully Installed</option>
                                                <option value="6. IAP In Service">6. IAP In Service</option>
                                                  <option value="7. PAP In Service">7. PAP In Service</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div>
                                            <div class="form-group">
                                            <strong> <label for="cc-payment" class="control-label mb-1">Date Signed</label></strong>
                                                <input id="date1" name="datesigned"  type="date"  value="<?php echo date("Y-m-d"); ?>" class="form-control"  aria-required="true" aria-invalid="false" placeholder="Date Signed">
                                            </div></div>
                                            <div class="row">
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Apt</label></strong>
                                                <input id="cc-name" name="apt" type="number" class="form-control cc-name valid"   data-val="true" placeholder="Apt"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Floors</label></strong>
                                                <input id="cc-name" name="floors" type="number" class="form-control cc-name valid"   data-val="true" placeholder="Floors"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Shops</label></strong>
                                                <input id="cc-name" name="shops" type="number" class="form-control cc-name valid"  data-val="true" placeholder="Shops"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                                <strong><label for="cc-name" class="control-label mb-1">Vacant Shops</label></strong>
                                                <input id="cc-name" name="vacant" type="number" class="form-control cc-name valid"  data-val="true" placeholder="Vacant shops"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                        </div>
                                        <div class="form-group has-success">
                                        <strong><label for="cc-name" class="control-label mb-1">Comments<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-name" name="comments" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Comments"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-success">
                                                    <span id="payment-button-amount">submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!--/.col-->

                 
                    </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

</div><!-- /#right-panel -->

