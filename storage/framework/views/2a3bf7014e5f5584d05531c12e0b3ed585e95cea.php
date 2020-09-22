<div class="mdl-layout__tab-panel" id="analysis_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <i id="icon-cause" class="material-icons"></i>
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
                <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row">
                    <i id="icon-solution" class="material-icons"></i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <textarea class="mdl-textfield__input saveonchange add_media analysis_input" type="text" name="solution" value="" id="solution" onBlur="setFieldname(this.name)"></textarea>
                        <label class="mdl-textfield__label" for="solution">Solution/repair advice</label>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container solution" data-for="solution">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--11-col mdl-cell--5-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <i id="icon-wis_document" class="material-icons"></i>
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
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--4-col-phone field-row">
                     <i id="icon-exit_protocol" class="material-icons radio-icon"></i>
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
            <div class="mdl-grid error_code_list" id="testlist">
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
        var analysis_input = $('.analysis_input').filter(function(input){
            return $(this).val() == "";
        }).length;
            var exit_protocol = $(':radio[name="exit_protocol"]:not(:checked)').length-2;
            var count = analysis_input+exit_protocol;
            if(count>0) { $("#analysis_panel_badge").html("<span class='mdl-badge' id='analysis_panel_badge' data-badge='"+count+"'></span>"); }
            else $("#analysis_panel_badge").html("<span></span>");
            
            if (exit_protocol==1) {
                $("#icon-exit_protocol").html("<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-exit_protocol").html("<i class='material-icons success'>check</i>");
            }
    });
    </script>
    
   <script>
     $(document).ready(function() {
            if (document.getElementById("cause").value == "") {
                $("#icon-cause").html("fiber_manual_record");$("#icon-cause").addClass("error");
                $("#icon-cause").removeClass("success");
            } else {
                $("#icon-cause").html("check");$("#icon-cause").addClass("success");
                $("#icon-cause").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('keyup', '#cause', function() {
        
            if (document.getElementById("cause").value == "") {
                //alert(testbal);
                $("#icon-cause").html("fiber_manual_record");$("#icon-cause").addClass("error");
                $("#icon-cause").removeClass("success");
            } else {
                $("#icon-cause").html("check");$("#icon-cause").addClass("success");
                $("#icon-cause").removeClass("error");
            }
        });
    </script>
    <script>
     $(document).ready(function() {
            if (document.getElementById("solution").value == "") {
                $("#icon-solution").html("fiber_manual_record");$("#icon-solution").addClass("error");
                $("#icon-solution").removeClass("success");
            } else {
                $("#icon-solution").html("check");$("#icon-solution").addClass("success");
                $("#icon-solution").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('keyup', '#solution', function() {
        
            if (document.getElementById("solution").value == "") {
                //alert(testbal);
                $("#icon-solution").html("fiber_manual_record");$("#icon-solution").addClass("error");
                $("#icon-solution").removeClass("success");
            } else {
                $("#icon-solution").html("check");$("#icon-solution").addClass("success");
                $("#icon-solution").removeClass("error");
            }
        });
    </script>
    
    <script>
     $(document).ready(function() {
            if (document.getElementById("wis_document").value == "") {
                $("#icon-wis_document").html("fiber_manual_record");$("#icon-wis_document").addClass("error");
                $("#icon-wis_document").removeClass("success");
            } else {
                $("#icon-wis_document").html("check");$("#icon-wis_document").addClass("success");
                $("#icon-wis_document").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('keyup', '#wis_document', function() {
        
            if (document.getElementById("wis_document").value == "") {
                //alert(testbal);
                $("#icon-wis_document").html("fiber_manual_record");$("#icon-wis_document").addClass("error");
                $("#icon-wis_document").removeClass("success");
            } else {
                $("#icon-wis_document").html("check");$("#icon-wis_document").addClass("success");
                $("#icon-wis_document").removeClass("error");
            }
        });
    </script>
    
    <!-- kjkdaksdjkajs -->
    <script>
    
    var maxAppend = 0;
        $(document).on('keyup', '#error_code_4', function() {
   $("#error_code_4").onkeyup(function(e){
    if (maxAppend >= 3) return;

    $("#testlist").append('<div class="mdl-cell mdl-cell--2-col">' +
				'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">' +
				'<input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[0,1]{1,1}" maxlength="1" data-maxlength="1" type="number" name="error_code_1" value="" id="error_code_1" />' +
				'<label class="mdl-textfield__label" for="error_code_1">&nbsp;</label>' +
				'<span class="mdl-textfield__error">Please select either 0 or 1</span>' +
				'</div>&nbsp;</div><div class="mdl-cell mdl-cell--2-col">' +
				'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">' +
				'<input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[A-Z,a-z,0-9]{5,5}" maxlength="5" data-maxlength="5" type="text" name="error_code_2" value="" id="error_code_2" />' +
				'<label class="mdl-textfield__label" for="error_code_2">&nbsp;</label>' +
				'<span class="mdl-textfield__error">Please use 5 numbers and letters only</span>' +
				'</div>&nbsp;</div><div class="mdl-cell mdl-cell--2-col">' +
				'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">' +
				'<input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[A-Z,a-z,0-9,*]{2,2}" maxlength="2" data-maxlength="2" type="text" name="error_code_3" value="" id="error_code_3" />' +
				'<label class="mdl-textfield__label" for="error_code_3">&nbsp;</label>' +
				'<span class="mdl-textfield__error">Please use 2 numbers and letters only</span>' +
				'</div>&nbsp;</div><div class="mdl-cell mdl-cell--2-col">' +
				'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">' +
				'<input data-id="0" required="required" class="mdl-textfield__input add_media error_codes" pattern="[1,7,8,9]{1,1}" maxlength="1" data-maxlength="1" type="number" name="error_code_4" value="" id="error_code_4" />' +
				'<label class="mdl-textfield__label" for="error_code_4">&nbsp;</label>' +
				'<span class="mdl-textfield__error">Please select 1, 7, 8 or 9</span></div>&nbsp;</div>' +
				'<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet field-row error_code_field_row" style="min-height: 70px;"><input type="hidden" data-id="0" class="error_codes"></div>');
    
    maxAppend++;
});});
    </script>
    
    <script>
	$('body').one('TweenAnimationDone', function() {
		currentContainer.find('.error_code_list').on('keyup', '.error_codes', function(e){
			e.preventDefault();
			var $this = $(this);
			var keystring = String.fromCharCode(e.keyCode);
			var max = parseInt($this.attr('data-maxlength'));
			var value = '' + $this.val();
			if(/[a-z,A-Z,0-9]/.test(keystring) && $this.attr('type') === 'number'){
				value = value + keystring;
			}
			if(value.length > max){
				value = value.slice(0, max);
				$this.val(value);
			}
			if(value.match($this.attr('pattern')) && value.length === max){
				$this.parent().removeClass('is-invalid');
				$this.trigger('input');
				if(/[a-z,A-Z,0-9]/.test(keystring)){
					$('input[data-id="' + this.dataset.id + '"][name="error_code_' + (parseInt($this.attr('name').substr(11)) + 1) + '"]').focus();
				}
			} else {
				$this.parent().addClass('is-invalid');
			}
			if(e.keyCode === 8 && $this.val() === "") {
				$('input[data-id="' + this.dataset.id + '"][name="error_code_' + (parseInt($this.attr('name').substr(11)) - 1) + '"]').focus().select();
			}
			return true;
		}).on('paste', function(e) {
			var clipboardData, pastedData, id = e.target.dataset.id;
			e.stopPropagation();
			e.preventDefault();
			clipboardData = e.clipboardData || e.originalEvent.clipboardData || window.clipboardData;
			pastedData = clipboardData.getData('Text');

			$('input[data-id="' + id + '"][name="error_code_1"]').val(pastedData.substring(0,1)).trigger('input').get(0).parentNode.MaterialTextfield.checkValidity();
			$('input[data-id="' + id + '"][name="error_code_2"]').val(pastedData.substring(1,6)).trigger('input').get(0).parentNode.MaterialTextfield.checkValidity();
			$('input[data-id="' + id + '"][name="error_code_3"]').val(pastedData.substring(6,8)).trigger('input').get(0).parentNode.MaterialTextfield.checkValidity();
			$('input[data-id="' + id + '"][name="error_code_4"]').val(pastedData.substring(8,9)).trigger('input').get(0).parentNode.MaterialTextfield.checkValidity();
		});
        });
    </script>
    
    
    
</div><?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Deepak\Mdiag_Demo\7thsept\resources\views/Diagnosis/EditTabs/Analysis.blade.php ENDPATH**/ ?>