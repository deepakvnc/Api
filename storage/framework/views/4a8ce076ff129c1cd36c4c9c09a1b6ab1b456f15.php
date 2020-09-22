<div class="mdl-layout__tab-panel is-active" id="id_panel">
    <div class="box box-border">
        <!-- <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div> -->
        <div class="box-content">
            <div class="mdl-grid center-items">

                <div
                    class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <!-- Checked using Js -->
                    <i id="icon-wo_input" class="material-icons"></i>
                    <div readonly="readonly" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input readonly="readonly" onchange="saveOnChange(value,'wo_number')" class="mdl-textfield__input saveonchange add_media id_input" type="text" name="wo_number"
                            value="<?php if ($diagnosis) {
                                echo $diagnosis[0]->wo_number;
                            } else {
                                echo '';
                            } ?>" id="wo_input" onBlur="setFieldname(this.name)" />
                        <input readonly="readonly" type="hidden" id="diagnosis_id" name="diagnosis_id" value="<?php if ($diagnosis) {
                            echo $diagnosis[0]->id;
                        } else {
                            echo '';
                        } ?>">
                        <label class="mdl-textfield__label" for="wo_number">WO number</label>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container wo_number" data-for="complaint_number">
                            </div>
                        </div>

                    </div>
                </div>
                <div
                    class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop">
                    <i id="icon-mechanic_id" class="material-icons"></i>
                    <div class="mdl-selectcontainer">
                        <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1"><select
                                class="fullwidth mdl-selectfield__select saveonchange" id="mechanic_id"
                                name="mechanic_id" value="7664">
                                <option value="7664" selected>Colleges Modernization</option>
                                <option value="501">ECOM Monteur</option>
                                <option value="6909">External 2</option>
                                <option value="6910">External 3</option>
                                <option value="7641">MBC Monteur Monteur</option>
                            </select>
                            <label class="mdl-textfield__label" for="mechanic_id">Mechanic</label></div>
                    </div>
                </div>
                <div
                    class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__phone">
                    <i id="icon-complaint_number" class="material-icons"></i>
                    <div readonly="readonly" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input readonly="readonly" onchange="saveOnChange(value, 'complaint_number')" class="mdl-textfield__input saveonchange add_media id_input" min="1" max="99"
                            pattern="[1-9]" maxlength="2" type="number" name="complaint_number" value="<?php if ($diagnosis) {
                                echo $diagnosis[0]->complaint_number;
                            } else {
                                echo '';
                            } ?>" id="complaint_number" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="complaint_number">Complaint number</label>
                        <span class="mdl-textfield__error">Please select a number between 1 and 99</span>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container complaint_number" data-for="complaint_number">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mdl-cell mdl-cell--2-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row"
                    style="position: relative;">
                    <i id="icon-license_plate" class="material-icons" data-for="license_plate"></i>
                    <div readonly="readonly" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                        <input readonly="readonly" onchange="saveOnChange(value, 'license_plate')" class="mdl-textfield__input saveonchange add_media" type="text" name="license_plate"
                            value="<?php if ($diagnosis) {
                                echo $diagnosis[0]->license_plate;
                            } else {
                                echo '';
                            } ?>" id="license_plate" style="text-transform:uppercase"
                            onkeyup="checkLicensePlate(value)" onBlur="setFieldname(this.name)" />
                        <label class="mdl-textfield__label" for="license_plate">License plate</label>
                        <span class="helper">Dutch license plates are matched with RDW data</span>
                        <div class="license_plate_spinner"
                            style="position: absolute; top: 10px; right: 20px; display: none;">
                            <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                        </div>

                        <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="field-gallery-container license_plate" data-for="license_plate">

                            </div>
                        </div>
                    </div>
                    <div class="license_plate_spinner"
                        style="position: absolute; top: 10px; right: 20px; display: none;">
                        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row">
                    <div class="mdl-grid mdl-grid--no-spacing">
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row">
                            <i id="icon-vin" class="material-icons" data-for="vin"></i>

                            <div
                            readonly="readonly" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input readonly="readonly" onchange="saveOnChange(value, 'vin')" class="mdl-textfield__input saveonchange add_media uppercase id_input"
                                    type="text" name="vin" value="<?php if ($diagnosis) {
                                        echo $diagnosis[0]->vin;
                                    } else {
                                        echo '';
                                    } ?>" id="vin" onfocus="VinMedia(value)" onkeyup="checkVin(value)"
                                    onBlur="setFieldname(this.name)" />
                                <label class="mdl-textfield__label" for="vin">VIN</label>

                                <div class="pictureswipe_wrap tab_media" itemscope
                                    itemtype="http://schema.org/ImageGallery">
                                    <div class="field-gallery-container vin" data-for="vin">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row">
                            <div class="icon-spacer"></div><a id="vin_button_search" href="#" style="margin-top: 12px;"
                                class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Matches: <?php echo e($matches); ?></a>
                        </div>
                    </div>
                </div>
                <div
                    class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <div class="mdl-grid mdl-grid--no-spacing center-items">
                        <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row">
                            <span id="icon-repeat_repair" style="margin-top:-10px; margin-right: 0px;"
                                class="material-icons" data-for="repeat_repair"></span>

                            <label>Repeat repair</label></div>
                        <div readonly="readonly" class="mdl-cell mdl-cell--4-col mdl-textfield--align-right" id="repeat_repair">
                            <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect"
                                for="repeat_repair_5f19d87768bb5">
                                <input readonly="readonly" onchange="saveOnChange(value, 'repeat_repair')" value="1" class="mdl-radio__button saveonchange id_radio" large="1"
                                    name="repeat_repair" type="radio" id="repeat_repair_5f19d87768bb5"
                                    onClick="RepeatrepairYes()" <?php if ($diagnosis &&
                                    ($diagnosis[0]->repeat_repair !== null && $diagnosis[0]->repeat_repair == 1)) {
                                echo 'checked';
                                } else {
                                echo '';
                                } ?>
                                ><span class="mdl-radio__label">Yes</span></label>
                            <label readonly="readonly" class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect"
                                for="repeat_repair_5f19d87768c00">
                                <input readonly="readonly" onchange="saveOnChange(value, 'repeat_repair')" value="0" class="mdl-radio__button saveonchange id_radio" large="1"
                                    name="repeat_repair" type="radio" id="repeat_repair_5f19d87768c00"
                                    onClick="RepeatrepairNo()" <?php if ($diagnosis &&
                                    ($diagnosis[0]->repeat_repair !== null && $diagnosis[0]->repeat_repair == 0)) {
                                echo 'checked';
                                } else {
                                echo '';
                                } ?>
                                ><span class="mdl-radio__label">No</span></label></div>
                        <div
                            class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop">
                            <div class="icon-spacer"></div>
                            <div class="mdl-selectcontainer">
                                <div class="mdl-selectfield mdl-js-selectfield" tabindex="-1"><select
                                        class="fullwidth mdl-selectfield__select saveonchange" id="intake_id"
                                        name="intake_id" value="">
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
                        <div
                            class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-complaint_customerInput" class="material-icons"
                                data-for="complaint_customer"></i>
                            <div
                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <textarea onchange="saveOnChange(value,'complaint_customer')" class="mdl-textfield__input saveonchange add_media id_input" type="text"
                                    name="complaint_customer" value="" id="complaint_customerInput"
                                    onBlur="setFieldname(this.name)"><?php if ($diagnosis) {echo $diagnosis[0]->complaint_customer;} ?></textarea>
                                <label class="mdl-textfield__label" for="complaint_customer">Customer complaint </label>

                                <div class="pictureswipe_wrap tab_media" itemscope
                                    itemtype="http://schema.org/ImageGallery">
                                    <div class="field-gallery-container complaint_customer"
                                        data-for="complaint_customer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--2-col-phone field-row">

                            <span id="icon-complaint_reproducible" style="margin-top:-10px; margin-right: 0px;"
                                class="material-icons" data-for="complaint_callable"></span>

                            <label>Complaint reproducible</label></div>
                        <div readonly="readonly" class="mdl-cell mdl-cell--4-col mdl-textfield--align-right" id="complaint_reproducible">
                            <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect"
                                for="complaint_callable_5f19d87768c62">
                                <input readonly="readonly" onchange="saveOnChange(value, 'complaint_callable')" value="1" class="mdl-radio__button saveonchange" large="1"
                                    name="complaint_callable" type="radio" id="complaint_callable_5f19d87768c62"
                                    onClick="complaint_callableYes()" <?php if ($diagnosis && ($diagnosis[0]->complaint_callable !== null && $diagnosis[0]->complaint_callable ==1)) {
                                echo 'checked';
                                } else {
                                echo '';
                                } ?>><span class="mdl-radio__label">Yes</span></label><label
                                class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect"
                                for="complaint_callable_5f19d87768ca8">
                                <input readonly="readonly" onchange="saveOnChange(value, 'complaint_callable')" value="0" class="mdl-radio__button saveonchange" large="1"
                                    name="complaint_callable" type="radio" id="complaint_callable_5f19d87768ca8"
                                    onClick="complaint_callableNo()"<?php if ($diagnosis &&
                                    ($diagnosis[0]->complaint_callable !== null && $diagnosis[0]->complaint_callable == 0)) {
                                echo 'checked';
                                } else {
                                echo '';
                                } ?>><span class="mdl-radio__label">No</span></label>
                        </div>
                        <div
                            class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row number-spinner-active mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-mileage_start" class="material-icons" data-for="complaint_callable"></i>

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                id="mileage-test">
                                <input readonly="readonly" onchange="saveOnChange(value,'mileage_start')" class="mdl-textfield__input saveonchange add_media id_input"
                                    pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="mileage_start" value="<?php if ($diagnosis) {
                                        echo $diagnosis[0]->mileage_start;
                                    } else {
                                        echo '';
                                    } ?>"
                                    id="mileage_start" onBlur="setFieldname(this.name)" />
                                <label class="mdl-textfield__label" for="mileage_start">Mileage</label>
                                <i class="material-icons mdl-numberspinner mdl-numberspinner__remove"
                                    onClick="MileageValue()">remove</i>
                                <i class="material-icons mdl-numberspinner mdl-numberspinner__add"
                                    onClick="MileageValue()">add</i>

                                <div class="pictureswipe_wrap tab_media" itemscope
                                    itemtype="http://schema.org/ImageGallery">
                                    <div class="field-gallery-container mileage_start" data-for="mileage_start">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <div class="mdl-grid mdl-grid--no-spacing">
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone "
                            data-expand="brand">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                readonly="readonly">
                                <input onchange="saveOnChange(value, 'brand')" readonly="readonly" type="text" name="brand" value="MERCEDES-BENZ" id="brand"
                                    class="mdl-textfield__input" />
                                <label class="mdl-textfield__label" for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone "
                            data-expand="model">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                readonly="readonly"><input onchange="saveOnChange(value, 'model')" readonly="readonly" type="text" name="model"
                                    value="C 180 BLUETEC" id="model" class="mdl-textfield__input" /><label
                                    class="mdl-textfield__label" for="model">Model</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone "
                            data-expand="power">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                readonly="readonly"><input onchange="saveOnChange(value,'power')" readonly="readonly" type="text" name="power" value="85"
                                    id="power" class="mdl-textfield__input" /><label class="mdl-textfield__label"
                                    for="power">Power</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone "
                            data-expand="apk">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                readonly="readonly"><input onchange="saveOnChange(value, 'apk')" readonly="readonly" type="text" name="apk" value="03/04/2020"
                                    id="apk" class="mdl-textfield__input" /><label class="mdl-textfield__label"
                                    for="apk">APK</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone "
                            data-expand="first_admission">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                readonly="readonly"><input onchange="saveOnChange(value, 'first_admission')" readonly="readonly" type="text" name="first_admission"
                                    value="01/20/2016" id="first_admission" class="mdl-textfield__input" /><label
                                    class="mdl-textfield__label" for="first_admission">First admission</label></div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone "
                            data-expand="euro_class">
                            <div class="icon-spacer"></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"
                                readonly="readonly"><input onchange="saveOnChange(value, 'euro_class')" readonly="readonly" type="text" name="euro_class" value="6"
                                    id="euro_class" class="mdl-textfield__input" /><label class="mdl-textfield__label"
                                    for="euro_class">Euro class</label></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).on("click", "body", function() {
            var id_input = $('.id_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var repeat_repair = $('.id_radio:radio[name="repeat_repair"]:not(:checked)').length - 1;
            var complaint_callable = $(':radio[name="complaint_callable"]:not(:checked)').length - 1;
            var count = id_input + repeat_repair + complaint_callable;
            if (count != 0) {
                $("#id_badge").html("<span class='mdl-badge' id='id_badge' data-badge='" + count + "'></span>");
            } else $("#id_badge").html("<span></span>");

            if (repeat_repair == 1) {
                $("#icon-repeat_repair").html("<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-repeat_repair").html("<i class='material-icons success'>check</i>");
            }

            if (complaint_callable == 1) {
                $("#icon-complaint_reproducible").html(
                    "<i class='material-icons error'>fiber_manual_record</i>");
            } else {
                $("#icon-complaint_reproducible").html("<i class='material-icons success'>check</i>");
            }

        });

    </script>

    <script>
        $(document).ready(function() {
            if (document.getElementById("wo_input").value == "") {
                $("#icon-wo_input").html("fiber_manual_record");
                $("#icon-wo_input").addClass("error");
                $("#icon-wo_input").removeClass("success");
            } else {
                $("#icon-wo_input").html("check");
                $("#icon-wo_input").addClass("success");
                $("#icon-wo_input").removeClass("error");
            }

            if (document.getElementById("complaint_number").value == "") {
                $("#icon-complaint_number").html("fiber_manual_record");
                $("#icon-complaint_number").addClass("error");
                $("#icon-complaint_number").removeClass("success");
            } else {
                $("#icon-complaint_number").html("check");
                $("#icon-complaint_number").addClass("success");
                $("#icon-complaint_number").removeClass("error");
            }


            if (document.getElementById("mechanic_id").value == "") {
                $("#icon-mechanic_id").html("fiber_manual_record");
                $("#icon-mechanic_id").addClass("error");
                $("#icon-mechanic_id").removeClass("success");
            } else {
                $("#icon-mechanic_id").html("check");
                $("#icon-mechanic_id").addClass("success");
                $("#icon-mechanic_id").removeClass("error");
            }


            if (document.getElementById("complaint_customerInput").value == "") {
                $("#icon-complaint_customerInput").html("fiber_manual_record");
                $("#icon-complaint_customerInput").addClass("error");
                $("#icon-complaint_customerInput").removeClass("success");
            } else {
                $("#icon-complaint_customerInput").html("check");
                $("#icon-complaint_customerInput").addClass("success");
                $("#icon-complaint_customerInput").removeClass("error");
            }

            if (document.getElementById("mileage_start").value == "") {
                $("#icon-mileage_start").html("fiber_manual_record");
                $("#icon-mileage_start").addClass("error");
                $("#icon-mileage_start").removeClass("success");
            } else {
                $("#icon-mileage_start").html("check");
                $("#icon-mileage_start").addClass("success");
                $("#icon-mileage_start").removeClass("error");
            }

            if (document.getElementById("vin").value == "") {
                $("#icon-vin").html("fiber_manual_record");
                $("#icon-vin").addClass("error");
                $("#icon-vin").removeClass("success");
            } else {
                $("#icon-vin").html("check");
                $("#icon-vin").addClass("success");
                $("#icon-vin").removeClass("error");
            }

            // if (document.getElementById("rdw_countlicense_plate").value == "") {
            //     $("#icon-license_plate").html("fiber_manual_record");
            //     $("#icon-license_plate").addClass("error");
            //     $("#icon-license_plate").removeClass("success");
            // } else {
            //     $("#icon-license_plate").html("check");
            //     $("#icon-license_plate").addClass("success");
            //     $("#icon-license_plate").removeClass("error");
            // }

        });
        //function Value Chnage
        $(document).on('keyup', '#wo_input', function() {

            if (document.getElementById("wo_input").value == "") {
                //alert(testbal);
                $("#icon-wo_input").html("fiber_manual_record");
                $("#icon-wo_input").addClass("error");
                $("#icon-wo_input").removeClass("success");
            } else {
                $("#icon-wo_input").html("check");
                $("#icon-wo_input").addClass("success");
                $("#icon-wo_input").removeClass("error");
            }
        });

        //function Value Chnage
        $(document).on('keyup', '#complaint_number', function() {

            if (document.getElementById("complaint_number").value == "") {
                //alert(testbal);
                $("#icon-complaint_number").html("fiber_manual_record");
                $("#icon-complaint_number").addClass("error");
                $("#icon-complaint_number").removeClass("success");
            } else {
                $("#icon-complaint_number").html("check");
                $("#icon-complaint_number").addClass("success");
                $("#icon-complaint_number").removeClass("error");
            }
        });
        //function Value Chnage
        $(document).on('click', '#mechanic_id', function() {

            if (document.getElementById("mechanic_id").value == "") {
                //alert(testbal);
                $("#icon-mechanic_id").html("fiber_manual_record");
                $("#icon-mechanic_id").addClass("error");
                $("#icon-mechanic_id").removeClass("success");
            } else {
                $("#icon-mechanic_id").html("check");
                $("#icon-mechanic_id").addClass("success");
                $("#icon-mechanic_id").removeClass("error");
            }
        });

        //function Value Chnage
        $(document).on('keyup', '#complaint_customerInput', function() {

            if (document.getElementById("complaint_customerInput").value == "") {
                //alert(testbal);
                $("#icon-complaint_customerInput").html("fiber_manual_record");
                $("#icon-complaint_customerInput").addClass("error");
                $("#icon-complaint_customerInput").removeClass("success");
            } else {
                $("#icon-complaint_customerInput").html("check");
                $("#icon-complaint_customerInput").addClass("success");
                $("#icon-complaint_customerInput").removeClass("error");
            }
        });
        //function Value Chnage
        $(document).on('click keyup', '#mileage-test', function() {

            if (document.getElementById("mileage_start").value == "") {
                //alert(testbal);
                $("#icon-mileage_start").html("fiber_manual_record");
                $("#icon-mileage_start").addClass("error");
                $("#icon-mileage_start").removeClass("success");
            } else {
                $("#icon-mileage_start").html("check");
                $("#icon-mileage_start").addClass("success");
                $("#icon-mileage_start").removeClass("error");
            }
        });
        //function Value Chnage
        $(document).on('keyup', '#vin', function() {

            if (document.getElementById("vin").value == "") {
                //alert(testbal);
                $("#icon-vin").html("fiber_manual_record");
                $("#icon-vin").addClass("error");
                $("#icon-vin").removeClass("success");
            } else {
                $("#icon-vin").html("check");
                $("#icon-vin").addClass("success");
                $("#icon-vin").removeClass("error");
            }
        });

        //function Value Chnage
        $(document).on('keyup', '#license_plate', function() {

            if (document.getElementById("license_plate").value == "") {
                //alert(testbal);
                $("#icon-license_plate").html("fiber_manual_record");
                $("#icon-license_plate").addClass("error");
                $("#icon-license_plate").removeClass("success");
            } else {
                $("#icon-license_plate").html("check");
                $("#icon-license_plate").addClass("success");
                $("#icon-license_plate").removeClass("error");
            }
        });

    </script>

    <style>
        .success {
            font-weight: bold;
            color: #3b8e3b;
        }

        .error {
            color: #d50000;
        }

    </style>

    <div class="fixed-action-btn-background"></div>
    <div class="fixed-action-btn-container">
        <div class="scrollwrapper" id="wo_numbervalid">
            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn"
                href="#modal-cpydiagnosis">
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
        // wo_input.onchange = function() {
        //     if (wo_input.value) {
        //         if (wo_input.value.length > 0) {
        //             saveOnChange(wo_input.value, 'wo_number');
        //             wo_numbervalid.style.display = "block";
        //             wo_numberinvalid.style.display = "none";
        //         } else {
        //             wo_numberinvalid.style.display = "block";
        //             wo_numbervalid.style.display = "none";
        //         }
        //     } else {
        //         wo_numberinvalid.style.display = "block";
        //         wo_numbervalid.style.display = "none";
        //     }
        // }

        // complaint_number.onchange = function() {
        //     if (complaint_number.value) {
        //         if (complaint_number.value.length == 2) {
        //             saveOnChange(complaint_number.value, 'complaint_number')
        //             complaint_numbervalid.style.display = "block";
        //             complaint_numberinvalid.style.display = "none";
        //         } else {
        //             complaint_numbervalid.style.display = "none";
        //             complaint_numberinvalid.style.display = "block";
        //         }

        //     } else {
        //         complaint_numbervalid.style.display = "none";
        //         complaint_numberinvalid.style.display = "block";
        //     }
        // }


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
                    $('#diagnosis_id').val(success.id);
                   document.getElementById('wo-title').innerHTML=val;
                    window.history.pushState('edit', 'Title', '/diagnosis/edit/'+success.id);
                    
                    // window.location.href = '/diagnosis/edit/' + success.id;
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


</div>
<?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Diagnosis/ViewTabs/Id.blade.php ENDPATH**/ ?>