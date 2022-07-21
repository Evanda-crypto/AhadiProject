<?php
include("includes.php");
include "session.php";
include "../config/config.php";
?>
    <title>Developers Report</title>
        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Developers Report</h3>
                                        </div>
                                        <hr>
                                        <?php
            if(isset($_SESSION['status'])){
                ?>
               <center><span> <div class="alert alert-danger" role="alert">
                   <?php echo $_SESSION['status'];
                unset($_SESSION['status']);?>
                 </div></span></center>
                <?php
                
            }
            elseif(isset($_SESSION['success'])){
                ?>
                <center><span><div class="alert alert-success" role="alert">
                   <?php echo $_SESSION['success'];
                unset($_SESSION['success']);?>
                 </div></span></center>
                <?php
                
            }
            ?>
                       <form  method="post" autocomplete="off" action="devreport.php">
                                  
                              <div class="form-group">
                                                <strong><label for="cc-number" class="control-label mb-1">Project Name<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select placeholder="Choose a Project..." class="standardSelect form-control" required name="project_name" tabindex="1" required>
                                            <option disabled selected >Choose Project...</option>
                                            <option value="Konnect Mart">Konnect Mart</option>
                                            <option value="Konnect Wallet">Konnect Wallet</option>
                                            <option value="LandingPage">LandingPage</option>
                                            <option value="KOMP">KOMP</option>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    <strong><label for="cc-exp" class="control-label mb-1">Start Date<span style="color: #FF0000" >*</span></label></strong>
                                                        <input id="start" onchange="dateDiff()" placeholder="Start Date" value="<?php echo date("Y-m-d", strtotime("-3 days")); ?>"  name="report_start_date" type="date" class="form-control cc-exp">
                                                        <span class="help-block"  data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                <strong><label for="x_card_code" class="control-label mb-1">End Date<span style="color: #FF0000" >*</span></label></strong>
                                                    <div class="input-group">
                                                        <input id="end" name="report_end_date" value="<?php echo date("Y-m-d"); ?>" onchange="dateDiff()" type="date" class="form-control cc-cvc"  placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Evaluation Period</label></strong>
                                                <input id="diff" name="evaluation_period" onkeyup="dateDiff()"  type="text" class="form-control cc-number identified visa" required placeholder="Duration">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                        <div class="form-group has-success">
                                        <strong><label for="cc-name" class="control-label mb-1">Milestones<span style="color: #FF0000" >*</span></label></strong>
                                        <textarea id="milestones" name="key_milestone" type="text" class="form-control cc-name valid" data-val="true" placeholder="Key Milestone" required ></textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <strong><div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Completed Tasks<span style="color: #FF0000" >*</span></label></strong>
                                                <textarea  id="editor1" name="completed_tasks" type="text" class="form-control cc-number identified visa"required  placeholder="Completed Tasks"></textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Ongoing Tasks<span style="color: #FF0000" >*</span></label></strong>
                                                <textarea id="editor2" required name="ongoing_tasks" required type="text" class="form-control"  placeholder="Ongoing Tasks"></textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Challenges</label></strong>
                                                <input id="challenges" name="challenges" type="text" class="form-control cc-number identified visa" placeholder="Challenges">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Comments<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-number" name="comments" type="text" class="form-control cc-number identified visa" required placeholder="Comments" required>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Reported By<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-number" name="developers" type="text" required class="form-control cc-number identified visa" Value="<?php echo $_SESSION[
                                                    "FName"
                                                ]; ?> <?php echo $_SESSION["LName"]; ?>" maxlength="40"  required placeholder="Reports By">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                          
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script>
CKEDITOR.replace("completed_tasks");
CKEDITOR.on("instanceReady", function (evt) {
  var editor = evt.editor;

  editor.on("change", function (e) {
    var contentSpace = editor.ui.space("contents");
    var ckeditorFrameCollection = contentSpace.$.getElementsByTagName("iframe");
    var ckeditorFrame = ckeditorFrameCollection[0];
    var innerDoc = ckeditorFrame.contentDocument;
    var innerDocTextAreaHeight = $(innerDoc.body).height();
    console.log(innerDocTextAreaHeight);
  });
});

</script>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate1= year +"-" + month + "-" + todate;
 document.getElementById("start").setAttribute("max",maxdate1);
 </script>
</body>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("end").setAttribute("max",maxdate);
 </script>
</body>
<script>
function dateDiff() {
  var d2 = document.getElementById("start").value;
  var d1 = document.getElementById("end").value;

  var t2 = new Date(d2);
  var t1 = new Date(d1);

  var diff = ((t1 - t2) / (24 * 3600 * 1000));

  setInterval(function(){document.getElementById("diff").value = diff});
}
</script>
<script>
    // Helper function to display messages below CKEditor 4.
    function ShowMessage(msg) {
      document.getElementById('eMessage').innerHTML = msg;
    }

    function InsertHTML() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      var value = document.getElementById('htmlArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert HTML code.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertHtml
        editor.insertHtml(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function InsertText() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      var value = document.getElementById('txtArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert as plain text.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertText
        editor.insertText(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function SetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Execute the command.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-execCommand
        editor.execCommand(commandName);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function CheckDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      // Focuses the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-focus
      editor.focus();
    }
  </script>


  <script>
    // Attaching event listeners to the global CKEDITOR object.
    // The instanceReady event is fired when an instance of CKEditor 4 has finished its initialization.
    CKEDITOR.on('instanceReady', function(ev) {
      ShowMessage('Editor instance <em>' + ev.editor.name + '</em> was loaded.');

      // The editor is ready, so sample buttons can be displayed.
      document.getElementById('eButtons').style.display = 'block';
    });

    // Replace the <textarea id="editor1"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('editor2', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });

    // Attaching event listeners to CKEditor 4 instances.
    // Refer to https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html for a list of all available events.
    editor.on('focus', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>is focused</b>.');
    });
    editor.on('blur', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>lost focus</b>.');
    });
    // Helper variable to count the number of detected changes in CKEditor 4.
    var changesNum = 0;
    editor.on('change', function(evt) {
      ShowMessage('The number of changes in <em>' + this.name + '</em>: <b>' + ++changesNum + '</b>.');
    });
  </script>
  <script>
    // Helper function to display messages below CKEditor 4.
    function ShowMessage(msg) {
      document.getElementById('eMessage').innerHTML = msg;
    }

    function InsertHTML() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('htmlArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert HTML code.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertHtml
        editor.insertHtml(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function InsertText() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('txtArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert as plain text.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertText
        editor.insertText(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function SetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Execute the command.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-execCommand
        editor.execCommand(commandName);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function CheckDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      // Focuses the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-focus
      editor.focus();
    }
  </script>
  <script>
    // Attaching event listeners to the global CKEDITOR object.
    // The instanceReady event is fired when an instance of CKEditor 4 has finished its initialization.
    CKEDITOR.on('instanceReady', function(ev) {
      ShowMessage('Editor instance <em>' + ev.editor.name + '</em> was loaded.');

      // The editor is ready, so sample buttons can be displayed.
      document.getElementById('eButtons').style.display = 'block';
    });

    // Replace the <textarea id="editor2"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('editor2', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });

    // Attaching event listeners to CKEditor 4 instances.
    // Refer to https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html for a list of all available events.
    editor.on('focus', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>is focused</b>.');
    });
    editor.on('blur', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>lost focus</b>.');
    });
    // Helper variable to count the number of detected changes in CKEditor 4.
    var changesNum = 0;
    editor.on('change', function(evt) {
      ShowMessage('The number of changes in <em>' + this.name + '</em>: <b>' + ++changesNum + '</b>.');
    });
  </script>
<script>
    // Helper function to display messages below CKEditor 4.
    function ShowMessage(msg) {
      document.getElementById('eMessage').innerHTML = msg;
    }

    function InsertHTML() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('htmlArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert HTML code.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertHtml
        editor.insertHtml(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function InsertText() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      var value = document.getElementById('txtArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert as plain text.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertText
        editor.insertText(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function SetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Execute the command.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-execCommand
        editor.execCommand(commandName);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function CheckDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      // Focuses the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-focus
      editor.focus();
    }
  </script>
  <script>
    // Attaching event listeners to the global CKEDITOR object.
    // The instanceReady event is fired when an instance of CKEditor 4 has finished its initialization.
    CKEDITOR.on('instanceReady', function(ev) {
      ShowMessage('Editor instance <em>' + ev.editor.name + '</em> was loaded.');

      // The editor is ready, so sample buttons can be displayed.
      document.getElementById('eButtons').style.display = 'block';
    });

    // Replace the <textarea id="milestones"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('milestones', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });

    // Attaching event listeners to CKEditor 4 instances.
    // Refer to https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html for a list of all available events.
    editor.on('focus', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>is focused</b>.');
    });
    editor.on('blur', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>lost focus</b>.');
    });
    // Helper variable to count the number of detected changes in CKEditor 4.
    var changesNum = 0;
    editor.on('change', function(evt) {
      ShowMessage('The number of changes in <em>' + this.name + '</em>: <b>' + ++changesNum + '</b>.');
    });
  </script>

