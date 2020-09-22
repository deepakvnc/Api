<div class="mdl-layout__tab-panel is-active" id="id_panel">
    <div class="box box-border">
        <!-- <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div> -->
        <div class="box-content">
            <div class="mdl-grid center-items">

                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <!-- Checked using Js -->
                    <i class="material-icons error" data-for="complaint_number" id="inputinvalid">fiber_manual_record</i>
                    <i class="material-icons" data-for="mechanic_id" id="inputvalid">check</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media id_input" type="text" name="wo_number" value="<?php if($diagnosis) echo $diagnosis[0]->wo_number; else echo''?>" id="wo_input" onBlur="setFieldname(this.name)" />
                        <input type="hidden" id="diagnosis_id" name="diagnosis_id" value="<?php if($diagnosis) echo $diagnosis[0]->id; else echo''?>">
                        <label class="mdl-textfield__label" for="wo_number">WO number</label>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container wo_number" data-for="complaint_number">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop">
                    <i class="material-icons" data-for="mechanic_id">check</i>
                    <div class="mdl-selectcontainer">
                        <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1"><select class="fullwidth mdl-selectfield__select saveonchange" id="mechanic_id" name="mechanic_id" value="7664">
                                <option value="7664" selected>Colleges Modernization</option>
                                <option value="501">ECOM Monteur</option>
                                <option value="6909">External 2</option>
                                <option value="6910">External 3</option>
                                <option value="7641">MBC Monteur Monteur</option>
                            </select>
                            <label class="mdl-textfield__label" for="mechanic_id">Mechanic</label></div>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__phone">
                    <i class="material-icons error" data-for="complaint_number" id="complaint_numberInvalid">fiber_manual_record</i>
                    <i class="material-icons" data-for="mechanic_id" id="complaint_numbervalid">check</i>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media id_input" min="1" max="99" pattern="[1-9]" maxlength="2" type="number" name="complaint_number" value="<?php if($diagnosis) echo $diagnosis[0]->complaint_number; else echo''?>" id="complaint_number" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="complaint_number">Complaint number</label>
                        <span class="mdl-textfield__error">Please select a number between 1 and 99</span>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container complaint_number" data-for="complaint_number">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mdl-cell mdl-cell--2-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row" style="position: relative;">
                    <div class="icon-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input class="mdl-textfield__input saveonchange add_media id_input" type="text" name="license_plate" value="" id="license_plate" style="text-transform:uppercase" onkeyup="checkLicensePlate(value)" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="license_plate">License plate</label>
                        <span class="helper">Dutch license plates are matched with RDW data</span>
                        <div class="license_plate_spinner" style="position: absolute; top: 10px; right: 20px; display: none;">
                            <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                        </div>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container license_plate" data-for="license_plate">

                            </div>
                        </div>
                    </div>
                    <div class="license_plate_spinner" style="position: absolute; top: 10px; right: 20px; display: none;">
                        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row">
                    <div class="mdl-grid mdl-grid--no-spacing">
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row"><i class="material-icons" data-for="vin">check</i>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input class="mdl-textfield__input saveonchange add_media uppercase id_input" type="text" name="vin" value="" id="vin" onfocus="VinMedia(value)" onkeyup="checkVin(value)" onBlur="setFieldname(this.name)" />
                                <label class="mdl-textfield__label" for="vin">VIN</label>

                                <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                                    <div class="field-gallery-container vin" data-for="vin">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row">
                            <div class="icon-spacer"></div><a id="vin_button_search" href="#" style="margin-top: 12px;" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Matches:
                                0</a>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <div class="mdl-grid mdl-grid--no-spacing center-items">
                        <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row">
                            <i class="material-icons error" data-for="repeat_repair" id="RepeatrepairInValid">fiber_manual_record</i>
                            <i class="material-icons" data-for="vin" id="RepeatrepairValid">check</i>
                            <label>Repeat repair</label></div>
                        <div class="mdl-cell mdl-cell--4-col mdl-textfield--align-right"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="repeat_repair_5f19d87768bb5">
                                <input value="1" class="mdl-radio__button saveonchange id_radio" large="1" name="repeat_repair" type="radio" id="repeat_repair_5f19d87768bb5" onClick="RepeatrepairYes()"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="repeat_repair_5f19d87768c00">
                                <input value="0" class="mdl-radio__button saveonchange id_radio" large="1" name="repeat_repair" type="radio" id="repeat_repair_5f19d87768c00" onClick="RepeatrepairNo()"><span class="mdl-radio__label">No</span></label></div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop">
                            <div class="icon-spacer"></div>
                            <div class="mdl-selectcontainer">
                                <div class="mdl-selectfield mdl-js-selectfield" tabindex="-1"><select class="fullwidth mdl-selectfield__select saveonchange" id="intake_id" name="intake_id" value="">
                                        <option value="0" selected>&nbsp;</option>
                                        <option value="4120">David Lisse</option>
                                        <option value="1">ECOM Development</option>
                                        <option value="2088">ECOM Serviceadviseur</option>
                                        <option value="4060">ECOM AS Manager</option>
                                        <option value="1599">Geert de Bock</option>
                                        <option value="4271">Harald Opsommer</option>
                                        <option value="2080">Jaap Zeefat</option>
                                        <option value="2">Jacco Floris</option>
                                        <option value="2215">Joachim Dreher</option>
                                        <option value="3">Jurgen van der Meijs</option>
                                        <option value="7644">MBC After Sales manager</option>
                                        <option value="7643">MBC Service manager</option>
                                        <option value="4212">Paul Schoukens</option>
                                        <option value="7712">Service Manager</option>
                                    </select><label class="mdl-textfield__label" for="intake_id">Intake</label></div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i class="material-icons error" data-for="complaint_customer" id="complaint_customerInValid">fiber_manual_record</i>
                            <i class="material-icons" data-for="vin" id="complaint_customerValid">check</i>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" id="complaint_customerInput">
                                <textarea class="mdl-textfield__input saveonchange add_media id_input" type="text" name="complaint_customer" value="" id="complaint_customerInput" onBlur="setFieldname(this.name)"></textarea>
                                <label class="mdl-textfield__label" for="complaint_customer">Customer complaint </label>

                                <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                                    <div class="field-gallery-container complaint_customer" data-for="complaint_customer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row">
                            <i class="material-icons error" data-for="complaint_callable" id="complaint_callableInValid">fiber_manual_record</i>
                            <i class="material-icons" data-for="complaint_callable" id="complaint_callableValid">check</i>

                            <label>Complaint reproducible</label></div>
                        <div class="mdl-cell mdl-cell--4-col mdl-textfield--align-right"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="complaint_callable_5f19d87768c62">
                                <input value="1" class="mdl-radio__button saveonchange" large="1" name="complaint_callable" type="radio" id="complaint_callable_5f19d87768c62" onClick="complaint_callableYes()"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="complaint_callable_5f19d87768ca8">
                                <input value="0" class="mdl-radio__button saveonchange" large="1" name="complaint_callable" type="radio" id="complaint_callable_5f19d87768ca8" onClick="complaint_callableNo()"><span class="mdl-radio__label">No</span></label>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row number-spinner-active mdl-zebra__desktop mdl-zebra__phone">
                            <i class="material-icons error" data-for="mileage_start" id="mileage_startInValid">fiber_manual_record</i>
                            <i class="material-icons" data-for="mileage_start" id="mileage_startValid">check</i>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input class="mdl-textfield__input saveonchange add_media id_input" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="mileage_start" value="" id="mileage_start" onBlur="setFieldname(this.name)" />
                                <label class="mdl-textfield__label" for="mileage_start">Mileage</label>
                                <i class="material-icons mdl-numberspinner mdl-numberspinner__remove" onClick="MileageValue()">remove</i>
                                <i class="material-icons mdl-numberspinner mdl-numberspinner__add" onClick="MileageValue()">add</i>

                                <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                                    <div class="field-gallery-container mileage_start" data-for="mileage_start">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <div class="mdl-grid mdl-grid--no-spacing">
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone " data-expand="brand">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly">
                                <input readonly="readonly" type="text" name="brand" value="MERCEDES-BENZ" id="brand" class="mdl-textfield__input" />
                                <label class="mdl-textfield__label" for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone " data-expand="model">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="model" value="C 180 BLUETEC" id="model" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="model">Model</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone " data-expand="power">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="power" value="85" id="power" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="power">Power</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone " data-expand="apk">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="apk" value="03/04/2020" id="apk" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="apk">APK</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone " data-expand="first_admission">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="first_admission" value="01/20/2016" id="first_admission" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="first_admission">First admission</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone " data-expand="euro_class">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="euro_class" value="6" id="euro_class" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="euro_class">Euro class</label></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <script>
        $(document).on("click", "body", function() {
            var a = $('.id_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var b = $('.id_radio:radio[name="repeat_repair"]:not(:checked)').length - 1;
            var count = a + b;
            if (count != 0) {
                $("#id_badge").html("<span class='mdl-badge' id='id_badge' data-badge='" + count + "'></span>");
            } else $("#id_badge").html("<span></span>");
        });
    </script>


    <div class="fixed-action-btn-background"></div>
    <div class="fixed-action-btn-container">
        <div class="scrollwrapper" id="wo_numbervalid">
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" href="#modal-cpydiagnosis">
                <i class="material-icons">content_copy</i>
                <label>Copy diagnosis</label>
            </a>
        </div>
        <div>

            <!-- <button id="add-media-to-field" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn active">
        <i class="material-icons">photo_camera</i>
        <label>Add media aaa</label>
        </button> -->
        </div>
    </div>

    <script type="text/javascript">
        var wo_numbervalid = document.getElementById("inputvalid");
        var wo_numberinvalid = document.getElementById("inputinvalid");

        var complaint_numbervalid = document.getElementById("complaint_numbervalid");
        var complaint_numberinvalid = document.getElementById("complaint_numberInvalid");

        var RepeatrepairValid = document.getElementById("RepeatrepairValid");
        var RepeatrepairInValid = document.getElementById("RepeatrepairInValid");

        var complaint_customerValid = document.getElementById("complaint_customerValid");
        var complaint_customerInValid = document.getElementById("complaint_customerInValid");

        var complaint_callableValid = document.getElementById("complaint_callableValid");
        var complaint_callableInValid = document.getElementById("complaint_callableInValid");

        var mileage_startValid = document.getElementById("mileage_startValid")
        var mileage_startInValid = document.getElementById("mileage_startInValid")

        var mediainfodiv = document.getElementById("mediainfodiv");



        onPageloadcall()

        function onPageloadcall() {

            wo_numberinvalid.style.display = "block";
            wo_numbervalid.style.display = "none";

            complaint_numbervalid.style.display = "none";
            complaint_numberinvalid.style.display = "block";

            RepeatrepairValid.style.display = "none";
            RepeatrepairInValid.style.display = "block";

            complaint_customerValid.style.display = "none";
            complaint_customerInValid.style.display = "block";

            complaint_callableValid.style.display = "none";
            complaint_callableInValid.style.display = "block";

            mileage_startValid.style.display = "none";
            mileage_startInValid.style.display = "block";

            // mediainfodiv.style.display = "none";
        }

        wo_input.oninput = function() {
            if (wo_input.value) {
                if (wo_input.value.length > 0) {
                    saveOnChange(wo_input.value, 'wo_number');
                    wo_numbervalid.style.display = "block";
                    wo_numberinvalid.style.display = "none";
                } else {
                    wo_numberinvalid.style.display = "block";
                    wo_numbervalid.style.display = "none";
                }
            } else {
                wo_numberinvalid.style.display = "block";
                wo_numbervalid.style.display = "none";
            }
        }

        complaint_number.oninput = function() {
            if (complaint_number.value) {
                if (complaint_number.value.length == 2) {
                    saveOnChange(complaint_number.value, 'complaint_number')
                    complaint_numbervalid.style.display = "block";
                    complaint_numberinvalid.style.display = "none";
                } else {
                    complaint_numbervalid.style.display = "none";
                    complaint_numberinvalid.style.display = "block";
                }

            } else {
                complaint_numbervalid.style.display = "none";
                complaint_numberinvalid.style.display = "block";
            }
        }

        function RepeatrepairYes() {
            RepeatrepairValid.style.display = "block";
            RepeatrepairInValid.style.display = "none";
        }

        function RepeatrepairNo() {
            RepeatrepairInValid.style.display = "block";
            RepeatrepairValid.style.display = "none";

        }

        function complaint_callableYes() {
            complaint_callableValid.style.display = "block";
            complaint_callableInValid.style.display = "none";
        }

        function complaint_callableNo() {
            complaint_callableInValid.style.display = "block";
            complaint_callableValid.style.display = "none";
        }


        function MileageValue() {
            var MileageValue = Math.sign(mileage_start.value)
            if (MileageValue == 1 || MileageValue == 0) {
                mileage_startValid.style.display = "block";
                mileage_startInValid.style.display = "none";
            } else {
                mileage_startValid.style.display = "none";
                mileage_startInValid.style.display = "block";
            }
        }

        function VinMedia(val) {}

        function checkVin(val) {
            var token = "<?php echo e(csrf_token()); ?>";
            $.get('/getVinNo/' + val, function(success) {
                // console.log(success[0].count);
                $("#vin_button_search").html("Matches: " + success[0].count);
            })
        }

        function saveOnChange(val, type) {
            var diagnosis_id = $('#diagnosis_id').val();
            console.log(val + " : " + type + " : " + diagnosis_id);
            $.post('/diagnosis/saveOnChange', {
                '_token': '<?php echo e(csrf_token()); ?>',
                'diagnosis_id': diagnosis_id,
                'value': val,
                'type': type
            }, function(success) {
                console.log(success);
                if (success.redirect) {
                    window.location.href = '/diagnosis/edit/' + success.id;
                }
            });
        }
    </script>
    <style>
        div[data-expand] {
            flex-wrap: wrap;
        }

        div[data-expand]:not(.expand) {
            display: none;
        }

        div[data-expand].field-gallery-upgraded {
            min-height: 90px;
        }
    </style>


</div><?php /**PATH C:\xampp\htdocs\VNC\test\Mbdiag_demo\Mbdiag_demo_v4_bal\resources\views/Diagnosis/EditTabs/Id.blade.php ENDPATH**/ ?>