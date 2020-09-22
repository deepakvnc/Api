<div class="mdl-layout__tab-panel" id="complete_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col field-row number-spinner-active">
                    <i class="material-icons" id="icon-mileage_end"></i>
                    <div id="mileage_end_div"class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media complete_input" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="mileage_end" value="10000" id="mileage_end" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="mileage_end">Mileage</label>
                        <span class="mdl-textfield__error">Please enter a numeric value</span>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container mileage_end" data-for="mileage_end">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <canvas class="hidden" data-type="mechanic"></canvas>
                    <h2 style="margin-left: 24px;">Closing mechanic</h2>
                    <i class="material-icons error" data-for="signature_mechanic">fiber_manual_record</i>
                    <button id="signature_mechanic_button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored signature_blocker active">Select mechanic</button>
                    <button class="mdl-button mdl-js-button mdl-button--icon clearCanvas clearMechanic" style="color: #00ADEF;"><i class="material-icons">delete</i></button>
                    <div style="margin-top: 15px;margin-left: 24px;" class="signatureMechanicDate"></div>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <h2 style="margin-left: 24px;">Signature manager</h2><i class="material-icons error" data-for="signature_manager">fiber_manual_record</i>
                    <div style="position: relative; display: inline-block">
                        <canvas class="signature" data-type="manager"></canvas>
                        <button class="mdl-button mdl-js-button mdl-button--icon clearCanvas" style="position:absolute; top:0; right:0; color: #00ADEF;"><i class="material-icons">delete</i></button>
                        <div class="canvas_signature signature_blocker active mechanic_set"><i class="material-icons">lock_outline</i></div>
                    </div>
                    <div style="margin-top: 15px;margin-left: 24px;" class="signatureManagerDate"></div>
                </div>
                <div class="mdl-cell mdl-cell--12-col" id="completeDiagnosis">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--4-col-phone"></div>
                        <div class="mdl-cell mdl-cell--2-col mdl-cell--3-col-tablet mdl-cell--4-col-phone">
                            <button id="completeDiagnosisButton" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Close diagnosis</button>
                        </div>
                        <div class="mdl-cell mdl-cell--2-col mdl-cell--3-col-tablet mdl-cell--4-col-phone">
                            <button id="completeDiagnosisStartQualityControlButton" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Start Quality Control</button>
                            <div class="complete_repeat_repair">*Please note that this has been a repeat repair</div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--1-col-tablet mdl-cell--4-col-phone"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            canvas.signature {
                border: 1px solid black;
            }

            #completeDiagnosis {
                display: none;
            }

            #completeDiagnosis button {
                left: 50%;
                transform: translateX(-50%);
                margin-top: 40px;
            }

            #completeDiagnosis .complete_repeat_repair {
                display: none;
                color: red;
                margin-top: 30px;
                width: 100%;
                text-align: center;
            }

            #completeDiagnosis.repeat_repair .complete_repeat_repair {
                display: block;
            }

            #completeDiagnosis.fields_complete.complete {
                display: block;
            }

            .canvas_signature.signature_blocker {
                display: none;
                position: absolute;
                background-color: #00ADEF;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }

            .canvas_signature.signature_blocker>i {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: black;
                cursor: default;
            }

            .canvas_signature.signature_blocker.active,
            .canvas_signature.signature_blocker.mechanic_set {
                display: inline-block;
            }

            #signature_mechanic_button.signature_blocker.active,
            #signature_mechanic_button.signature_blocker.mechanic_set {
                cursor: not-allowed;
                background: #BBBBBB;
                background-color: #BBBBBB;
                border-color: #BBBBBB;
            }

            .clearMechanic {
                display: none;
            }

            .clearMechanic.mechanic_set {
                display: inline-block;
            }
        </style>
        <!-- Sign -->
        <script type="application/javascript" src="/Application/Javascript/signature-pad.js"></script>
    </div>

    <div style="display:none;">

        <a class="btn btn-upload" title="Accepts: gif,jpeg,png,bmp,doc,xls,ppt,pdf,mpg,wmv,avi,mkv,mp4,mp3,zip,rar" href="javascript:void(0);" id="upload_file_all">
            <i class="fa fa-upload"></i>
            Upload
            <div class="upload-form button-upload button">
                <input type="file" name="file" multiple>
            </div>
        </a>

    </div>
</div>
    
    <script>
     $(document).ready(function() {
            if (document.getElementById("mileage_end").value == "") {
                $("#icon-mileage_end").html("fiber_manual_record");$("#icon-mileage_end").addClass("error");
                $("#icon-mileage_end").removeClass("success");
            } else {
                $("#icon-mileage_end").html("check");$("#icon-mileage_end").addClass("success");
                $("#icon-mileage_end").removeClass("error");
            }
     });
        
        //function Value Chnage
        $(document).on('click keyup', '#mileage_end_div', function() {
        
            if (document.getElementById("mileage_end").value == "") {
                //alert(testbal);
                $("#icon-mileage_end").html("fiber_manual_record");$("#icon-mileage_end").addClass("error");
                $("#icon-mileage_end").removeClass("success");
            } else {
                $("#icon-mileage_end").html("check");$("#icon-mileage_end").addClass("success");
                $("#icon-mileage_end").removeClass("error");
            }
        });
    
</script>
    <script>
        $(document).on("click", "body", function() {
            var a = $('.complete_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var count = a;
            if (count > 0) {
                $("#complete_panel_badge").html("<span class='mdl-badge' id='complete_panel_badge' data-badge='" + count + "'></span>");
            } else $("#complete_panel_badge").html("<span></span>");
        });
    </script>
<?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Deepak\Mdiag_Demo\7thsept\resources\views/Diagnosis/EditTabs/Complete.blade.php ENDPATH**/ ?>