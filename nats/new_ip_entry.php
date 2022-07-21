<?php
include "includes.php";
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");
?>
    <title>New Ip Entry</title>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                <div class="col-lg-">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Entry</h3>
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
                                        <form method="POST" action="ip_details.php">
                                        <div class="row">
                                        <div class="col-4">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Building Code<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="bcode" onkeyup="GetDetails(this.value)" name="bcode" type="text" class="form-control cc-name valid"  required  data-val="true" placeholder="Building Code"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                           <div class="col-4">
                                            <div class="form-group">   
                                            <strong><label for="cc-payment" class="control-label mb-1">Building Name<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="bname" name="bname"  type="text" required  class="form-control" aria-required="true" aria-invalid="false" placeholder="Building Name">
                                            </div>
                                               </div>

                                            <div class="col-4">
                                            <div class="form-group has-success">
                                        <strong><label for="cc-name" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="region" name="region" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Region"
                                                    autocomplete="cc-name" required aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                              </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-6">
                                        <div class="form-group">
                                            <strong><label for="cc-payment" class="control-label mb-1">Cluster Name</label></strong>
                                                <input id="cluster" name="cluster"  type="text" onclick="GetCode(this.value)" class="form-control" aria-required="true" aria-invalid="false" placeholder="Cluster Name">
                                            </div></div>
                                        <div class="col-6">
                                        <div class="form-group">
                                            <strong><label for="cc-payment" class="control-label mb-1">Cluster Code</label></strong>
                                                <input id="clustercode" onkeyup="GetCluster(this.value)" name="clustercode"  type="text"  class="form-control" aria-required="true" aria-invalid="false" placeholder="Cluster Code">
                                            </div></div>
                                           </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Zone<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            
                             <select placeholder="Choose a Zone..." class="standardSelect form-control" onChange="GetDetail(this.value)" tabindex="1" name="zones" required>
                            <optgroup label="">
                                <option value=""></option>
                            <option  value="Zone 1">Zone 1</option>  
                              <option value="Zone 2">Zone 2</option>
                              <option value="Zone 3">Zone 3</option>   
                              <option value="Zone 4">Zone 4</option>
                             <option value="Zone 5">Zone 5</option>
                             <option value="Zone 6">Zone 6</option>  
                             <option value="Zone 7">Zone 7</option>
                             <option  value="Zone 8">Zone 8</option>  
                              <option value="Zone 9">Zone 9</option>
                              <option value="Zone 10">Zone 10</option>   
                              <option value="Zone 11">Zone 11</option>
                             <option value="Zone 12">Zone 12</option>
                             <option value="Zone 13">Zone 13</option>  
                             <option value="Zone 14">Zone 14</option>
                             <option  value="Zone 15">Zone 15</option>  
                              <option value="Zone 16">Zone 16</option>
                              <option value="Zone 17">Zone 17</option>   
                              <option value="Zone 18">Zone 18</option>
                             <option value="Zone 19">Zone 19</option>
                             <option value="Zone 20">Zone 20</option>  
                             <option  value="Zone 21">Zone 21</option>  
                              <option value="Zone 22">Zone 22</option>
                              <option value="Zone 23">Zone 23</option>   
                              <option value="Zone 24">Zone 24</option>
                             <option value="Zone 25">Zone 25</option>
                             <option value="Zone 26">Zone 26</option>  
                             <option value="Zone 27">Zone 27</option>
                             <option  value="Zone 28">Zone 28</option>  
                              <option value="Zone 29">Zone 29</option>
                              <option value="Zone 30">Zone 30</option>   
                              <option value="Zone 31">Zone 31</option>
                             <option value="Zone 32">Zone 32</option>
                             <option value="Zone 33">Zone 33</option>  
                             <option value="Zone 34">Zone 34</option>
                             <option  value="Zone 35">Zone 35</option>  
                              <option value="Zone 36">Zone 36</option>
                              <option value="Zone 37">Zone 37</option>   
                              <option value="Zone 38">Zone 38</option>
                             <option value="Zone 39">Zone 39</option>
                             <option value="Zone 40">Zone 40</option>
                             <option  value="Zone 41">Zone 41</option>  
                              <option value="Zone 42">Zone 42</option>
                              <option value="Zone 43">Zone 43</option>   
                              <option value="Zone 44">Zone 44</option>
                             <option value="Zone 45">Zone 45</option>
                             <option value="Zone 46">Zone 46</option>  
                             <option value="Zone 47">Zone 47</option>
                             <option  value="Zone 48">Zone 48</option>  
                              <option value="Zone 49">Zone 49</option>
                              <option value="Zone 50">Zone 50</option>   
                              <option value="Zone 51">Zone 51</option>
                             <option value="Zone 52">Zone 52</option>
                             <option value="Zone 53">Zone 53</option>  
                             <option value="Zone 54">Zone 54</option>
                             <option  value="Zone 55">Zone 55</option>  
                              <option value="Zone 56">Zone 56</option>
                              <option value="Zone 57">Zone 57</option>   
                              <option value="Zone 58">Zone 58</option>
                             <option value="Zone 59">Zone 59</option>
                             <option value="Zone 60">Zone 60</option>  
                             <option  value="Zone 61">Zone 61</option>  
                              <option value="Zone 62">Zone 62</option>
                              <option value="Zone 63">Zone 63</option>   
                              <option value="Zone 64">Zone 64</option>
                             <option value="Zone 65">Zone 65</option>
                             <option value="Zone 66">Zone 66</option>  
                             <option value="Zone 67">Zone 67</option>
                             <option  value="Zone 68">Zone 68</option>  
                              <option value="Zone 69">Zone 69</option>
                              <option value="Zone 70">Zone 60</option>   
                              <option value="Zone 71">Zone 71</option>
                             <option value="Zone 72">Zone 72</option>
                             <option value="Zone 73">Zone 73</option>  
                             <option value="Zone 74">Zone 74</option>
                             <option  value="Zone 75">Zone 75</option>  
                              <option value="Zone 76">Zone 76</option>
                              <option value="Zone 77">Zone 77</option>   
                              <option value="Zone 78">Zone 78</option>
                             <option value="Zone 79">Zone 79</option>
                             <option value="Zone 80">Zone 80</option>
                            </optgroup>
                            </select>
                             </div>
                              </div>


                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Status<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Status..." class="standardSelect form-control" name="status" tabindex="1" required>
                                            <option disabled selected >Choose  Status...</option>
                                                <option value="YES">YES</option>
                                                  <option value="NO">NO</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div>
                                            <div class="row">
                                           <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">vlanid_device</label></strong>
                                                <input id="vlanid_device" name="vlanid_device" type="text" class="form-control cc-name valid"   data-val="true" placeholder="vlanid_device"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">vlanid_user</label></strong>
                                                <input id="vlanid_user" name="vlanid_user" type="text" class="form-control cc-name valid"   data-val="true" placeholder="vlanid_user"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">device_ip</label></strong>
                                                <input id="device_ip" name="device_ip" type="text" class="form-control cc-name valid"   data-val="true" placeholder="device_ip"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">user_ip</label></strong>
                                                <input id="user_ip" name="user_ip" type="text" class="form-control cc-name valid"  data-val="true" placeholder="user_ip"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                        </div>
                                           
                                            <div class="row">
                                           <div class="col-4">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">iap</label></strong>
                                                <input id="iap" name="iap" type="text" class="form-control cc-name valid"  data-val="true" placeholder="iap"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-4">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">oap</label></strong>
                                                <input id="oap" name="oap" type="text" class="form-control cc-name valid"   data-val="true" placeholder="oap"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-4">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">pap</label></strong>
                                                <input id="pap" name="pap" type="text" class="form-control cc-name valid"   data-val="true" placeholder="pap"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                        </div>
                                        <div class="row">
                                           <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">2226d</label></strong>
                                                <input id="2226d" name="2226d" type="text" value="0" class="form-control cc-name valid"   data-val="true" placeholder="2226d"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">20p_2422</label></strong>
                                                <input id="20p_2422" value="0" name="20p_2422" type="text" class="form-control cc-name valid"   data-val="true" placeholder="20p_2422"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">16p_1218</label></strong>
                                                <input id="16p_1218" value="0" name="16p_1218" type="text" class="form-control cc-name valid"   data-val="true" placeholder="16p_1218"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">16p_2218</label></strong>
                                                <input id="16p_2218" value="0" name="16p_2218" type="text" class="form-control cc-name valid"  data-val="true" placeholder="16p_2218"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                        </div>

                                        <div class="row">
                                           <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">8p_2210</label></strong>
                                                <input id="8p_2210" value="0" name="8p_2210" type="text" class="form-control cc-name valid"   data-val="true" placeholder="8p_2210"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">8p_1210</label></strong>
                                                <input id="8p_1210" name="8p_1210" value="0" type="text" class="form-control cc-name valid"   data-val="true" placeholder="8p_1210"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">8p_2008</label></strong>
                                                <input id="8p_2008" name="8p_2008" type="text" value="0" class="form-control cc-name valid"   data-val="true" placeholder="8p_2008"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">5p_2005</label></strong>
                                                <input id="5p_2005" name="5p_2005" value="0" type="text" class="form-control cc-name valid"  data-val="true" placeholder="5p_2005"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
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

<!-- Right Panel -->
<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetails(str) {
  if (str.length == 0) {
    document.getElementById("bname").value = "";
    document.getElementById("region").value = "";
    document.getElementById("pap").value = "";
    document.getElementById("oap").value = "";
    document.getElementById("iap").value = "";
    document.getElementById("cluster").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to bname input field
        
        document.getElementById
          ("bname").value = myObj[0];
        
        // Assign the value received to
        // region input field
        document.getElementById(
          "region").value = myObj[1];

          // Assign the value received to
        // pap input field
        document.getElementById(
          "pap").value = myObj[2];

                    // Assign the value received to
        // oap input field
        document.getElementById(
          "oap").value = myObj[3];

                    // Assign the value received to
        // iap input field
        document.getElementById(
          "iap").value = myObj[4];

                             // Assign the value received to
        // cluster input field
        document.getElementById(
          "cluster").value = myObj[5];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "getbdetails.php?bcode=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
  if (str.length == 0) {
    document.getElementById("vlanid_device").value = "";
    document.getElementById("vlanid_user ").value = "";
    document.getElementById("device_ip").value = "";
    document.getElementById("user_ip ").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to vlanid_device input field
        
        document.getElementById
          ("vlanid_device").value = myObj[0];
        
        // Assign the value received to
        // vlanid_user input field
        document.getElementById(
          "vlanid_user").value = myObj[1];

           // Assign the value received to
        // device_ip input field
        document.getElementById(
          "device_ip").value = myObj[2];
           // Assign the value received to
        // user_ip input field
        document.getElementById(
          "user_ip").value = myObj[3];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "getipdetails.php?zone=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetCode(str) {
  if (str.length == 0) {
    document.getElementById("clustercode").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("clustercode").value = myObj[0];
        
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "getcode.php?cluster=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>
<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetCluster(str) {
  if (str.length == 0) {
    document.getElementById("cluster").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("cluster").value = myObj[0];
        
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "getcluster.php?bname=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>