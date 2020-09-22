<div class="mdl-layout__tab-panel" id="analysis_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone"><i class="material-icons error" data-for="cause">fiber_manual_record</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media analysis_input" type="text" name="cause" value="" id="cause" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="cause">Cause</label>
                        <span class="helper">* Please add a picture of the possible cause (not required)</span>
                    <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container cause" data-for="cause">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row"><i class="material-icons error" data-for="solution">fiber_manual_record</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media analysis_input" type="text" name="solution" value="" id="solution" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="solution">Solution/repair advice</label>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container solution" data-for="solution">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--11-col mdl-cell--5-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone"><i class="material-icons error" data-for="wis_document">fiber_manual_record</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media wis_document_input analysis_input" type="text" name="wis_document" value="" id="wis_document" onBlur="setFieldname(this.name)"/>
                        <label class="mdl-textfield__label" for="wis_document">Wis Document</label>
                    <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container wis_document" data-for="wis_document">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--1-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="wis_document_5f19d8776a8f7"><input value="0" class="mdl-radio__button saveonchange wis_document_radio" large="1" name="wis_document" type="radio" id="wis_document_5f19d8776a8f7"><span class="mdl-radio__label">NA</span></label></div>
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--4-col-phone field-row"><i class="material-icons" data-for="exit_protocol">check</i>
                    <div><label>Exit protocol</label></div>
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right">
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="exit_protocol_5f19d8776a95f">
                        <input value="1" class="mdl-radio__button saveonchange" large="1" name="exit_protocol" type="radio" id="exit_protocol_5f19d8776a95f">
                        <span class="mdl-radio__label">Yes</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="exit_protocol_5f19d8776a9a7">
                        <input value="2" class="mdl-radio__button saveonchange" large="1" name="exit_protocol" type="radio" id="exit_protocol_5f19d8776a9a7">
                        <span class="mdl-radio__label">No</span>
                    </label>
                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="exit_protocol_5f19d8776a9eb">
                        <input value="3" class="mdl-radio__button saveonchange" large="1" name="exit_protocol" type="radio" id="exit_protocol_5f19d8776a9eb">
                        <span class="mdl-radio__label">NA</span>
                    </label>
                </div>
            </div>
            <div class="mdl-grid error_code_list">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet field-row error_code_field_row" style="min-height: 70px; padding-top:25px">
                    <div class="icon-spacer"></div><label>Damage code/failure cause</label>
                </div>
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[0,1]{1,1}" maxlength="1" data-maxlength="1" type="number" name="error_code_1" value="" id="error_code_1" onBlur="setFieldname(this.name)"/>
                        <label class="mdl-textfield__label" for="error_code_1">&nbsp;</label>
                        <span class="mdl-textfield__error">Please select either 0 or 1</span>
                    <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container error_code_1" data-for="error_code_1">

                            </div>
                        </div>
                    </div>&nbsp;
                </div>
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[A-Z,a-z,0-9]{5,5}" maxlength="5" data-maxlength="5" type="text" name="error_code_2" value="" id="error_code_2" onBlur="setFieldname(this.name)"/>
                        <label class="mdl-textfield__label" for="error_code_2">&nbsp;</label>
                        <span class="mdl-textfield__error">Please use 5 numbers or letters only</span>
                    <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container error_code_2" data-for="error_code_2">

                            </div>
                        </div>
                    </div>&nbsp;
                </div>
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[A-Z,a-z,0-9,*]{2,2}" maxlength="2" data-maxlength="2" type="text" name="error_code_3" value="" id="error_code_3" onBlur="setFieldname(this.name)"/>
                        <label class="mdl-textfield__label" for="error_code_3">&nbsp;</label>
                        <span class="mdl-textfield__error">Please use 2 numbers or letters only</span>
                    <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container error_code_3" data-for="error_code_3">

                            </div>
                        </div>
                    </div>&nbsp;
                </div>
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[1,7,8,9]{1,1}" maxlength="1" data-maxlength="1" type="number" name="error_code_4" value="" id="error_code_4" onBlur="setFieldname(this.name)"/>
                        <label class="mdl-textfield__label" for="error_code_4">&nbsp;</label>
                        <span class="mdl-textfield__error">Please select 1, 7, 8 or 9</span>
                    <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container error_code_4" data-for="error_code_4">

                            </div>
                        </div>
                    </div>&nbsp;
                </div>
                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet field-row" style="min-height: 70px;"><input type="hidden" data-id="0" class="error_codes"></div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet field-row"></div>
                <div class="mdl-cell mdl-cell--2-col"><span class="helper">Warranty type:<br>0 = First Installation Warranty<br>1 = ET (part) warranty</span></div>
                <div class="mdl-cell mdl-cell--2-col"><span class="helper">Error position:<br>First 2 numbers = Part group<br>Next 3 numbers = Part</span></div>
                <div class="mdl-cell mdl-cell--2-col"><span class="helper">Defect type:<br>Leak, sounds, short circuit, etc.</span></div>
                <div class="mdl-cell mdl-cell--2-col"><span class="helper">Repair manner:<br>1 = Aggregate swap<br>7 = With material<br>8 = Without material<br>9 = Third party</span></div>
            </div>
        </div>
    </div>
    
    
    <script>
        $(document).on("click", "body", function() { 
        var a = $('.analysis_input').filter(function(input){
            return $(this).val() == "";
        }).length;
            var b = $(':radio[name="exit_protocol"]:not(:checked)').length-2;
            var count = a+b;
            if(count>0) { $("#analysis_panel_badge").html("<span class='mdl-badge' id='analysis_panel_badge' data-badge='"+count+"'></span>"); }
            else $("#analysis_panel_badge").html("<span></span>");
    });
    </script>
</div><?php /**PATH D:\6thsept\Mbdiag_demo_v4_bal\resources\views/Diagnosis/EditTabs/Analysis.blade.php ENDPATH**/ ?>