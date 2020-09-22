<div class="mdl-layout__tab-panel" id="activities_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <i id="icon-intake_protocol" class="material-icons radio-icon"></i>
                    <label>Intakeprotocol executed</label>
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="intake_protocol_5f19d87769cd8">
                        <input value="1" class="mdl-radio__button saveonchange" large="1" name="intake_protocol" type="radio" id="intake_protocol_5f19d87769cd8">
                        <span class="mdl-radio__label">Yes</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="intake_protocol_5f19d87769d23">
                        <input value="2" class="mdl-radio__button saveonchange" large="1" name="intake_protocol" type="radio" id="intake_protocol_5f19d87769d23">
                        <span class="mdl-radio__label">No</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="intake_protocol_5f19d87769d6a">
                        <input value="3" class="mdl-radio__button saveonchange" large="1" name="intake_protocol" type="radio" id="intake_protocol_5f19d87769d6a">
                        <span class="mdl-radio__label">NA</span>
                    </label>
                </div>
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row">
                    <i id="icon-voltage_sustain" class="material-icons radio-icon"></i>
                    <label>Voltage sustain</label>
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="voltage_sustain_5f19d87769db3">
                        <input value="1" class="mdl-radio__button saveonchange" large="1" name="voltage_sustain" type="radio" id="voltage_sustain_5f19d87769db3">
                        <span class="mdl-radio__label">Yes</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="voltage_sustain_5f19d87769df7">
                        <input value="2" class="mdl-radio__button saveonchange" large="1" name="voltage_sustain" type="radio" id="voltage_sustain_5f19d87769df7">
                        <span class="mdl-radio__label">No</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="voltage_sustain_5f19d87769e3b">
                        <input value="3" class="mdl-radio__button saveonchange" large="1" name="voltage_sustain" type="radio" id="voltage_sustain_5f19d87769e3b">
                        <span class="mdl-radio__label">NA</span>
                    </label>
                </div>
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row">
                    <i id="icon-error_present" class="material-icons radio-icon"></i>
                    <label>Error code present</label>
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="error_present_5f19d87769f7d">
                        <input class="mdl-radio__button saveonchange hascomment" large="1" name="error_present" type="radio" id="error_present_5f19d87769f7d">
                        <span class="mdl-radio__label">Yes</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="error_present_5f19d87769fc5">
                        <input class="mdl-radio__button saveonchange hascomment" large="1" name="error_present" type="radio" id="error_present_5f19d87769fc5">
                        <span class="mdl-radio__label">No</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="error_present_5f19d8776a009">
                        <input class="mdl-radio__button saveonchange hascomment" large="1" name="error_present" type="radio" id="error_present_5f19d8776a009">
                        <span class="mdl-radio__label">NA</span>
                    </label>
                </div>
                <div class="mdl-cell mdl-cell--10-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row error_present_comment comment-field-closed">
                    <i id="icon-error_description" class="material-icons radio-icon"></i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media" type="text" name="error_description" value="" id="error_description" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="error_description">Error description</label>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container error_description" data-for="error_description">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row error_present_comment comment-field-closed">
                    <button id="error_code_button_check" style="display: none; margin-top: 25px;" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Check error codes</button>
                    <a id="error_code_button_search" href="#" style="margin-top: 25px;" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Matching error codes: 0</a>
                </div>
                <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <i id="icon-tip" class="material-icons radio-icon"></i>
                    <label>TIPS present</label>
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="tip_5f19d8776a068">
                        <input value="1" class="mdl-radio__button saveonchange hascomment tip" large="1" name="tip" type="radio" id="tip_5f19d8776a068">
                        <span class="mdl-radio__label">Yes</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="tip_5f19d8776a0ac">
                        <input value="0" class="mdl-radio__button saveonchange hascomment tip" large="1" name="tip" type="radio" id="tip_5f19d8776a0ac">
                        <span class="mdl-radio__label">No</span>
                    </label>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row tip_comment comment-field-closed">
                    <i id="icon-tip_description" class="material-icons"></i>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media" type="text" name="tip_description" value="" id="tip_description" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="tip_description">TIPS-number description</label>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container tip_description" data-for="tip_description">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row tip_comment comment-field-closed">
                    <i id="icon-tip_version" class="material-icons"></i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media" type="text" name="tip_version" value="" id="tip_version" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="tip_version">Tips version</label>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container tip_version" data-for="tip_version">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <i class="material-icons" id="icon-conclusion"></i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media activities_input" type="text" name="conclusion" value="" id="conclusion" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="conclusion">Provisional conclusion</label>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container conclusion" data-for="conclusion">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "body", function() {
            var activities_input = $('.activities_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var intake_protocol = $(':radio[name="intake_protocol"]:not(:checked)').length - 2;
            var voltage_sustain = $(':radio[name="voltage_sustain"]:not(:checked)').length - 2;
            var error_present = $(':radio[name="error_present"]:not(:checked)').length - 2;
            var tip = $(':radio[name="tip"]:not(:checked)').length - 1;
            var count = activities_input + intake_protocol + voltage_sustain + error_present + tip;
            if (count > 0) {
                $("#activities_panel_badge").html("<span class='mdl-badge' id='activities_panel_badge' data-badge='" + count + "'></span>");
            } else $("#activities_panel_badge").html("<span></span>");
            
            
            if (intake_protocol==1) {
                $("#icon-intake_protocol").html("<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-intake_protocol").html("<i class='material-icons success'>check</i>");
            }
            if (voltage_sustain==1) {
                $("#icon-voltage_sustain").html("<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-voltage_sustain").html("<i class='material-icons success'>check</i>");
            }
            if (error_present==1) {
                $("#icon-error_present").html("<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-error_present").html("<i class='material-icons success'>check</i>");
            }
            if (tip==1) {
                $("#icon-tip").html("<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-tip").html("<i class='material-icons success'>check</i>");
            }
        });
    </script>
    
    <script>
     $(document).ready(function() {
            if (document.getElementById("conclusion").value == "") {
                $("#icon-conclusion").html("fiber_manual_record");$("#icon-conclusion").addClass("error");
                $("#icon-conclusion").removeClass("success");
            } else {
                $("#icon-conclusion").html("check");$("#icon-conclusion").addClass("success");
                $("#icon-conclusion").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('keyup', '#conclusion', function() {
        
            if (document.getElementById("conclusion").value == "") {
                //alert(testbal);
                $("#icon-conclusion").html("fiber_manual_record");$("#icon-conclusion").addClass("error");
                $("#icon-conclusion").removeClass("success");
            } else {
                $("#icon-conclusion").html("check");$("#icon-conclusion").addClass("success");
                $("#icon-conclusion").removeClass("error");
            }
        });
    </script>
    <script>
     $(document).ready(function() {
            if (document.getElementById("tip_description").value == "") {
                $("#icon-tip_description").html("fiber_manual_record");$("#icon-tip_description").addClass("error");
                $("#icon-tip_description").removeClass("success");
            } else {
                $("#icon-tip_description").html("check");$("#icon-tip_description").addClass("success");
                $("#icon-tip_description").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('keyup', '#tip_description', function() {
        
            if (document.getElementById("tip_description").value == "") {
                //alert(testbal);
                $("#icon-tip_description").html("fiber_manual_record");$("#icon-tip_description").addClass("error");
                $("#icon-tip_description").removeClass("success");
            } else {
                $("#icon-tip_description").html("check");$("#icon-tip_description").addClass("success");
                $("#icon-tip_description").removeClass("error");
            }
        });
    </script>
    
    <script>
     $(document).ready(function() {
            if (document.getElementById("tip_version").value == "") {
                $("#icon-tip_version").html("fiber_manual_record");$("#icon-tip_version").addClass("error");
                $("#icon-tip_version").removeClass("success");
            } else {
                $("#icon-tip_version").html("check");$("#icon-tip_version").addClass("success");
                $("#icon-tip_version").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('keyup', '#tip_version', function() {
        
            if (document.getElementById("tip_version").value == "") {
                //alert(testbal);
                $("#icon-tip_version").html("fiber_manual_record");$("#icon-tip_version").addClass("error");
                $("#icon-tip_version").removeClass("success");
            } else {
                $("#icon-tip_version").html("check");$("#icon-tip_version").addClass("success");
                $("#icon-tip_version").removeClass("error");
            }
        });
    </script>
    <script>
        $(document).on("click", "body", function() {

        });
    </script>

</div><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Diagnosis/EditTabs/Activities.blade.php ENDPATH**/ ?>