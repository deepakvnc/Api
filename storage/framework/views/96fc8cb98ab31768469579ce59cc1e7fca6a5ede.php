<div class="mdl-layout__tab-panel" id="activities_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <i class="material-icons error" data-for="voltage_sustain">fiber_manual_record</i>
                    <div><label>Intakeprotocol executed</label></div>
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
                    <i class="material-icons error" data-for="voltage_sustain">fiber_manual_record</i>
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
                    <div class="icon-spacer"></div>
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
                    <i class="material-icons error" data-for="error_description">fiber_manual_record</i>
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
                    <i class="material-icons error" data-for="tip">fiber_manual_record</i><label>TIPS present</label>
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
                    <i class="material-icons error" data-for="tip_description">fiber_manual_record</i>

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
                    <i class="material-icons error" data-for="tip_version">fiber_manual_record</i>
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
                    <i class="material-icons error" data-for="conclusion">fiber_manual_record</i>
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
            var a = $('.activities_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var b = $(':radio[name="intake_protocol"]:not(:checked)').length - 2;
            var c = $(':radio[name="voltage_sustain"]:not(:checked)').length - 2;
            var d = $(':radio[name="error_present"]:not(:checked)').length - 2;
            var e = $(':radio[name="tip"]:not(:checked)').length - 1;
            var count = a + b + c + d + e;
            if (count > 0) {
                $("#activities_panel_badge").html("<span class='mdl-badge' id='activities_panel_badge' data-badge='" + count + "'></span>");
            } else $("#activities_panel_badge").html("<span></span>");
        });
    </script>

</div><?php /**PATH C:\xampp\htdocs\VNC\test\Mbdiag_demo\Mbdiag_demo_v4_bal\resources\views/Diagnosis/EditTabs/Activities.blade.php ENDPATH**/ ?>