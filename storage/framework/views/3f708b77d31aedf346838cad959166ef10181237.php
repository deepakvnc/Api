<?php $__env->startSection('content'); ?>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="<?php echo e(url('/quality_control')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a>
        <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="page-title"><?php echo $quality_control[0]->wo_number?></span>
        </span>
        <div class="mdl-layout-spacer"></div>
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="#id_panel" class="mdl-layout__tab is-active">Id 
     
        </a>

        <a href="#questions_panel" class="mdl-layout__tab">Questions
      
      </a>
        <a href="#media_panel" class="mdl-layout__tab">Media</a>
        <a href="#complete_panel" class="mdl-layout__tab">Close</a>
    </div>
</header>
<style>
.good{
       border:none; 
     }</style>
<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">

            <div class="mdl-layout__tab-panel is-active" id="id_panel">
                <div class="box box-border">
                    <div class="box-header" data-original-title>
                        <div class="box-icon">
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="mdl-grid center-items">
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <!-- <i class="material-icons" data-for="inspector">check</i> -->
                            <!-- <i id="icon-mechanic_id" class="material-icons"></i> -->
                            <i id="icon-inspector" class="material-icons"></i>
                                <div class="mdl-selectcontainer">
                                    <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                                    <?php 
                                 $query_inspector=DB::select('select first_name,surname from mdiag.mdiag_users where id='.$quality_control[0]->inspector);
                                 if(count($query_inspector)>0)
                                 $inspector =  $query_inspector[0]->first_name." ".$query_inspector[0]->surname;
                                 else
                                     $inspector="";
                             
                             $query_employee=DB::select('select first_name,surname from mdiag.mdiag_users where id='.$quality_control[0]->employee);
                             if(count($query_employee)>0)
                             $employee =  $query_employee[0]->first_name." ".$query_employee[0]->surname;
                             else
                                 $employee="";
                                ?>
                             <label class="mdl-textfield__label" for="inspector">Inspector</label></div>
                               <?php echo $inspector?> 
                            </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                             <i id="icon-mechanic_id" class="material-icons"></i>
                                <div class="mdl-selectcontainer">
                                    <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                                    <label class="mdl-textfield__label" for="employee">Mechanic</label></div>
                                    <?php echo $employee?>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-wo_input" class="material-icons"></i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input class="mdl-textfield__input" style="border-none" readonly="readonly" type="text" name="wo_number" value="<?php if($quality_control) echo $quality_control[0]->wo_number; else echo''?>" id="wo_number" readonly/><label class="mdl-textfield__label" for="wo_number">WO number</label></div>
                            </div>

                            <input type="hidden" id="quality_control_id" name="quality_control_id" value="<?php if($quality_control) echo $quality_control[0]->id; else echo''?>">

                            <div class="mdl-cell mdl-cell--3-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" style="position: relative;">
                            <i id="icon-license_plate" class="material-icons" data-for="license_plate"></i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input class="mdl-textfield__input saveonchange add_media id_input" type="text" name="license_plate" value="<?php if($quality_control) echo $quality_control[0]->license_plate; else echo''?>" id="license_plate" onkeyup="checkLicensePlate(value)" /><label class="mdl-textfield__label" for="license_plate">License plate</label><span class="helper">Dutch license plates are matched with RDW data</span></div>
                                <div class="license_plate_spinner" style="position: absolute; top: 10px; right: 20px; display: none;">
                                    <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" style="position: relative;">
                                <div class="icon-spacer"></div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"><input class="mdl-textfield__input saveonchange add_media" type="text" name="vin" value="<?php if($quality_control) echo $quality_control[0]->vin; else echo''?>" id="vin" /><label class="mdl-textfield__label" for="vin">VIN</label></div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone"></div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                                <div class="mdl-grid mdl-grid--no-spacing">
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="brand">
                                        <div class="icon-spacer"></div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="brand" value="" id="brand" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="brand">Brand</label></div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="model">
                                        <div class="icon-spacer"></div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="model" value="" id="model" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="model">Model</label></div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="power">
                                        <div class="icon-spacer"></div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="power" value="" id="power" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="power">Power</label></div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="apk">
                                        <div class="icon-spacer"></div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="apk" value="" id="apk" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="apk">APK</label></div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="first_admission">
                                        <div class="icon-spacer"></div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="first_admission" value="" id="first_admission" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="first_admission">First admission</label></div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="euro_class">
                                        <div class="icon-spacer"></div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="euro_class" value="" id="euro_class" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="euro_class">Euro class</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col"><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab inactive" data-tab-current="id" data-tab-next="questions_panel" onclick=>Next<i class="material-icons">navigate_next</i></button></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Upload Button - Class SET to Active based on Inputs where Images are Required and Image is Saved with input name -->
            <input type="file" id="add_media_btn" name="add_media_btn" style="display: none;" class="form-control" multiple>
    
        <!-- if tab validation -->
         <script  type="text/javascript">
           
           $(document).on("click", "body", function() {
              
            var id_input = $('.id_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var count = id_input;
            if (count != 0) {
                $("#id_badge").html("<span class='mdl-badge' id='id_badge' data-badge='" + count + "'></span>");
            } else $("#id_badge").html("<span></span>");



            // Questions Validations
         
            
           
          

              
        });
         </script>
            <script>
          
                //script for finding current field name
                var file_fieldname;

                function setFieldname(id) {
                  
                    file_fieldname = id;
                    //alert("Selected Field : " + file_fieldname);
                    readQualityImage();
                }
            </script>


    <script>
    
   $(document).on('keyup', '#inspector', function(){
    if (document.getElementById("inspector").value == "") {
    $("#icon-inspector").html("fiber_manual_record");
    $("#icon-inspector").addClass("error");
    $("#icon-inspector").removeClass("success");
    } else {
    $("#icon-inspector").html("check");
    $("#icon-inspector").addClass("success");
    $("#icon-inspector").removeClass("error");
    }
    }); 
      $(document).on('keyup', '#wo_number', function() {
      if (document.getElementById("wo_number").value == "") {
      $("#icon-wo_input").html("fiber_manual_record");
      $("#icon-wo_input").addClass("error");
      $("#icon-wo_input").removeClass("success");
     } else {
      $("#icon-wo_input").html("check");
      $("#icon-wo_input").addClass("success");
      $("#icon-wo_input").removeClass("error");
     }
     });
     $(document).on('keyup', '#employee', function() {
      if (document.getElementById("employee").value == "") {
      $("#icon-mechanic_id").html("fiber_manual_record");
      $("#icon-mechanic_id").addClass("error");
      $("#icon-mechanic_id").removeClass("success");
     } else {
      $("#icon-mechanic_id").html("check");
      $("#icon-mechanic_id").addClass("success");
      $("#icon-mechanic_id").removeClass("error");
     }
     });
     $(document).on('keyup', '#license_plate', function() {
   if (document.getElementById("license_plate").value == "") {
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
            <script>
                //script for previewing image for Current Seclected Field
                $(document).ready(function() {
                $("#wo_number").addClass('good');
                $("#inspector").addClass('good');
                $("#license_plate").addClass('good');
                $("#vin").addClass('good');
                $("#comments").addClass('good');
                if (document.getElementById("inspector").value == "") {
                $("#icon-inspector").html("fiber_manual_record");
                $("#icon-inspector").addClass("error");
                $("#icon-inspector").removeClass("success");
                } else {
                $("#icon-inspector").html("check");
                $("#icon-inspector").addClass("success");
                $("#icon-inspector").removeClass("error");
                }
                if (document.getElementById("wo_number").value == "") {
                $("#icon-wo_input").html("fiber_manual_record");
                $("#icon-wo_input").addClass("error");
                $("#icon-wo_input").removeClass("success");
                } else {
                $("#icon-wo_input").html("check");
                $("#icon-wo_input").addClass("success");
                $("#icon-wo_input").removeClass("error");
                }
                if (document.getElementById("employee").value == "") {
                $("#icon-mechanic_id").html("fiber_manual_record");
                $("#icon-mechanic_id").addClass("error");
                $("#icon-mechanic_id").removeClass("success");
                 } else {
                $("#icon-mechanic_id").html("check");
                $("#icon-mechanic_id").addClass("success");
                $("#icon-mechanic_id").removeClass("error");
                 }
                if (document.getElementById("license_plate").value == "") {
                $("#icon-license_plate").html("fiber_manual_record");
                $("#icon-license_plate").addClass("error");
                $("#icon-license_plate").removeClass("success");
                } else {
                $("#icon-license_plate").html("check");
                $("#icon-license_plate").addClass("success");
                $("#icon-license_plate").removeClass("error");
                }

             var id_input = $('.id_input').filter(function(input) {
            return $(this).val() == "";
            }).length;
            var count = id_input;
            if (count != 0) {
                $("#id_badge").html("<span class='mdl-badge' id='id_badge' data-badge='" + count + "'></span>");
            } else $("#id_badge").html("<span></span>");

                document.getElementById('add_media_btn').addEventListener('change', readQualityImage, false);
               
                $(".field-gallery-container").sortable();
                    $(document).on('click', '.image-cancel', function() {
                       
                        let no = $(this).data('no');
                        $(".preview-image.preview-show-" + no).remove();
                    });
                });
                var num = 0;
                var media_images = [];
                var img_names = [];


                function readQualityImage() {
                   
                    var field_name = file_fieldname;
                    $(function() {
                       
                        $(".field-gallery-container").on("click", function(e) {
                            $(".field-gallery-container." + file_fieldname).addClass("active");
                            e.stopPropagation()
                        });
                        $(document).on("click", function(e) {
                            if ($(e.target).is(".field-gallery-container") === false) {
                                $(".field-gallery-container").removeClass("active");
                            }
                        });
                    });
                    if (window.File && window.FileList && window.FileReader) {
                        //var field_name = $("cur_id").attr("name");
                        
                        var files = event.target.files; //FileList object
                        var output = $(".field-gallery-container." + field_name);
                        for (let i = 0; i < files.length; i++) {

                            //alert("Image Previewing in : " + field_name);
                            var file_name = files[i].name
                            img_names.push(file_name)
                            var file = files[i];
                            if (!file.type.match('image')) continue;
                            var picReader = new FileReader();
                            picReader.addEventListener('load', function(event) {
                                // document.getElementById("deleteIcon").style.display = "block";
                             
                                
                                var picFile = event.target;
                               
                                media_images.push(picFile.result);
                                var html =
                                    '<div class="field-gallery-item" style="background-image: url(' + picFile.result + ')" onclick="setFieldname(this.id)" id="' + field_name + '">' +
                                     '<i class="material-icons field-gallery-icon" style="z-index:999999999;color:red !important;float: right" onclick="delete_media(this.id)" id="' + field_name + '">delete_forever</i>'+
                                    '</div>';
                                output.append(html);
                                num = num + 1;
                            });
                            picReader.readAsDataURL(file);
                        }
                        console.log('img_names', img_names)
                        console.log('media_images', media_images)
                        $("#add_media_btn").val('');
                    } else {
                        console.log('Browser not support');
                    }
                }
            </script>

            <script>
                function delete_media(deletemedia_id) { //pass ImageID
                    //alert("123");
                    system.confirm("Delete Media", "Are you sure you want to delete this Media file? <br>Media Field : " + deletemedia_id,
                        function() {
                            alert("you have Clicked OK to Delete File: " + deletemedia_id);
                        }
                    )
                }
            </script>



            <div class="mdl-layout__tab-panel" id="questions_panel">
                <div class="box box-border">
                    <div class="box-header" data-original-title>
                        <div class="box-icon">
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="mdl-grid center-items">
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <!--<i class="material-icons error" id="tech_inspection">fiber_manual_record</i>-->
                            <i id="icon-tech_id" class="material-icons"></i>
                            <i class="material-icons error" style="display:none" id="tech_error">clear</i>
                            <label>Technical inspection no ok ?</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                            <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="33_5f1ad85a13204">

                            <input value="1" class="mdl-radio__button" checked large="1" name="33" type="radio" id="33_5f1ad85a13204" onClick="technical_yes(value)">
                            <span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="33_5f1ad85a1324f">
                            <input value="2" class="mdl-radio__button saveonchange expand"    large="1" name="33" type="radio" id="33_5f1ad85a1324f" onClick="technical_yes(value)">
                            <span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="33_5f1ad85a13288">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="33" type="radio" id="33_5f1ad85a13288" onClick="technical_yes(value)" >
                            <span class="mdl-radio__label">NA</span></label></div>

                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="33">
                            <i class="material-icons error" data-for="33_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <textarea class="mdl-textfield__input saveonchange" type="text" name="33_description" value="" id="33_description"></textarea>
                                <label class="mdl-textfield__label" for="33_description">What's missing?</label>

                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery" >
                                        <div class="field-gallery-container 33_description" data-for="33_description" style="padding-right: 20px;">
                                        <!-- <span id="deleteIcon"> <i class="material-icons field-gallery-icon" style="z-index:999999999;color:red !important;float: right" onclick="delete_media(this.id)" id="' + field_name + '">delete_forever</i></span> -->
                                  <!-- <i class="material-icons" style="color:red !important;float: right;" onclick="delete_media(this.id)">delete</i> -->
                                        </div>
                                      
                                    </div>
                                   
                                   
                                </div>

                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="33" onBlur="setFieldname(this.name)" name="33_description" onclick="$('#add_media_btn').click()">
                                <i class="material-icons">photo_camera</i></button>

                            </div>


                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <!--<i class="material-icons error" data-for="49">fiber_manual_record</i>-->
                            <i id="icon-oil_id" class="material-icons"></i>
                            <label>Extra bottle of oil present</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="47_5f1ad85a133d2">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="47" type="radio" id="47_5f1ad85a133d2" onClick="extra_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="47_5f1ad85a1341b">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="47" type="radio" id="47_5f1ad85a1341b" onClick="extra_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="47_5f1ad85a1345f">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="47" type="radio" id="47_5f1ad85a1345f" onClick="extra_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="47"><i class="material-icons error" data-for="47_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="47_description" value="" id="47_description"></textarea>
                                    <label class="mdl-textfield__label" for="47_description">What's missing?</label>
                                    
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 47_description" data-for="47_description" style="padding-right: 20px;">
                                    
                                        </div>
                                    </div>
                                    
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="47"  onBlur="setFieldname(this.name)" name="47_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-bar_id" class="material-icons"></i>
                            <label>If tow bar, white plate, adapter and sticker with ball pressure available</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="48_5f1ad85a1354d">
                            <input value="1"  checked class="mdl-radio__button saveonchange" large="1" name="48" type="radio" id="48_5f1ad85a1354d" onClick="twobar_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="48_5f1ad85a13599">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="48" type="radio" id="48_5f1ad85a13599" onClick="twobar_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="48_5f1ad85a135dd">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="48" type="radio" id="48_5f1ad85a135dd" onClick="twobar_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="48"><i class="material-icons error" data-for="48_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="48_description" value="" id="48_description"></textarea>
                                    <label class="mdl-textfield__label" for="48_description">What's missing?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 48_description" data-for="48_description" style="padding-right: 20px;">
                                      
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="48"  onBlur="setFieldname(this.name)" name="48_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-yellow_id" class="material-icons"></i>
                            <label>Yellow jackets present?</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="46_5f1ad85a13666">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="46" type="radio" id="46_5f1ad85a13666" onClick="yellow_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="46_5f1ad85a136ab">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="46" type="radio" id="46_5f1ad85a136ab" onClick="yellow_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="46_5f1ad85a136ef">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="46" type="radio" id="46_5f1ad85a136ef" onClick="yellow_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="46"><i class="material-icons error" data-for="46_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="46_description" value="" id="46_description"></textarea>
                                    <label class="mdl-textfield__label" for="46_description">What's missing?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 46_description" data-for="46_description" style="padding-right: 20px;">
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="46" onBlur="setFieldname(this.name)" name="46_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-vehicle_id" class="material-icons"></i>
                            <label>Vehicle tracking system on and off</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="32_5f1ad85a13770">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="32" type="radio" id="32_5f1ad85a13770" onClick="vehicle_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="32_5f1ad85a137b5">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="32" type="radio" id="32_5f1ad85a137b5"  onClick="vehicle_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="32_5f1ad85a137fa">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="32" type="radio" id="32_5f1ad85a137fa"  onClick="vehicle_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="32"><i class="material-icons error" data-for="32_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="32_description" value="" id="32_description"></textarea>
                                    <label class="mdl-textfield__label" for="32_description">What's not right?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 32_description" data-for="32_description" style="padding-right: 20px;">
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="32" onBlur="setFieldname(this.name)" name="32_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-delivery_id" class="material-icons"></i>
                            <label>Delivery forms completed in WIS</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="28_5f1ad85a13879">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="28" type="radio" id="28_5f1ad85a13879" onClick="delivery_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="28_5f1ad85a138be">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="28" type="radio" id="28_5f1ad85a138be" onClick="delivery_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="28_5f1ad85a13901">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="28" type="radio" id="28_5f1ad85a13901" onClick="delivery_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="28"><i class="material-icons error" data-for="28_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="28_description" value="" id="28_description"></textarea>
                                    <label class="mdl-textfield__label" for="28_description">What's missing?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 28_description" data-for="28_description" style="padding-right: 20px;">
                                       
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="28" onBlur="setFieldname(this.name)" name="28_description" onclick="$('#add_media_btn').click()">
                                <i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-accessory_id" class="material-icons"></i>
                            <label>Accessories documented in Vedoc</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="49_5f1ad85a13980">
                            <input value="1"  checked class="mdl-radio__button saveonchange" large="1" name="49" type="radio" id="49_5f1ad85a13980" onClick="accssories_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="49_5f1ad85a139c5">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="49" type="radio" id="49_5f1ad85a139c5" onClick="accssories_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="49_5f1ad85a13a09">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="49" type="radio" id="49_5f1ad85a13a09" onClick="accssories_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="49"><i class="material-icons error" data-for="49_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="49_description" value="" id="49_description"></textarea>
                                    <label class="mdl-textfield__label" for="49_description">What's missing?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 49_description" data-for="49_description" style="padding-right: 20px;">
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="49" onBlur="setFieldname(this.name)" name="49_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-techinspec_id" class="material-icons"></i>
                            <label>Technical inspection not OK?</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="43_5f1ad85a13a89">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="43" type="radio" id="43_5f1ad85a13a89" onClick="mbcontact_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="43_5f1ad85a13acd">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="43" type="radio" id="43_5f1ad85a13acd" onClick="mbcontact_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="43_5f1ad85a13b11">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="43" type="radio" id="43_5f1ad85a13b11" onClick="mbcontact_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="43"><i class="material-icons error" data-for="43_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="43_description" value="" id="43_description"></textarea>
                                    <label class="mdl-textfield__label" for="43_description">What's not right?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 43_description" data-for="43_description" style="padding-right: 20px;">
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="43" onBlur="setFieldname(this.name)" name="43_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-contact_id" class="material-icons"></i>
                            <label>MB Contact OK</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="50_5f1ad85a13b90">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="50" type="radio" id="50_5f1ad85a13b90" onClick="test_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="50_5f1ad85a13bd4">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="50" type="radio" id="50_5f1ad85a13bd4" onClick="test_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="50_5f1ad85a13c17">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="50" type="radio" id="50_5f1ad85a13c17" onClick="test_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="50"><i class="material-icons error" data-for="50_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="50_description" value="" id="50_description"></textarea>
                                    <label class="mdl-textfield__label" for="50_description">What's not right?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 50_description" data-for="50_description" style="padding-right: 20px;">
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="50" onBlur="setFieldname(this.name)" name="50_description" onclick="$('#add_media_btn').click()"><i class="material-icons ">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-test_id" class="material-icons"></i>
                            <label>Test</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="183_5f1ad85a13c9e">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="183" type="radio" id="183_5f1ad85a13c9e" onClick="exterior_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="183_5f1ad85a13ce4">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="183" type="radio" id="183_5f1ad85a13ce4" onClick="exterior_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="183_5f1ad85a13d28">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="183" type="radio" id="183_5f1ad85a13d28" onClick="exterior_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="183"><i class="material-icons error" data-for="183_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="183_description" value="" id="183_description"></textarea>
                                    <label class="mdl-textfield__label" for="183_description">Test</label>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-exterior_id" class="material-icons"></i>
                            <label>Is the exterior of the vehicle well polished</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="27_5f1ad85a13e03">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="27" type="radio" id="27_5f1ad85a13e03" onClick="daycount_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="27_5f1ad85a13e4a">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="27" type="radio" id="27_5f1ad85a13e4a" onClick="daycount_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="27_5f1ad85a13e8d">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="27" type="radio" id="27_5f1ad85a13e8d" onClick="daycount_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="27"><i class="material-icons error" data-for="27_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="27_description" value="" id="27_description"></textarea>
                                    <label class="mdl-textfield__label" for="27_description">What's not well polished?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 27_description" data-for="27_description" style="padding-right: 20px;">
                                      
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="27" onBlur="setFieldname(this.name)" name="27_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
        
                            <i id="icon-technical_id" class="material-icons"></i>
                            <label>Day counter set to zero</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="45_5f1ad85a13f0f">
                            <input value="1" checked class="mdl-radio__button saveonchange" large="1" name="45" type="radio" id="45_5f1ad85a13f0f" onClick="technical_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="45_5f1ad85a13f54">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="45" type="radio" id="45_5f1ad85a13f54" onClick="technical_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="45_5f1ad85a13f97">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="45" type="radio" id="45_5f1ad85a13f97" onClick="technical_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="45"><i class="material-icons error" data-for="45_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">1<textarea class="mdl-textfield__input saveonchange" type="text" name="45_description" value="" id="45_description"></textarea><label class="mdl-textfield__label" for="45_description">What's not right?</label>
                                    <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope itemtype="http://schema.org/ImageGallery">
                                        <div class="field-gallery-container 45_description" data-for="45_description" style="padding-right: 20px;">
                                       
                                        </div>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media" data-field="45" onBlur="setFieldname(this.name)" name="45_description" onclick="$('#add_media_btn').click()"><i class="material-icons">photo_camera</i></button>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col"><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab inactive" data-tab-current="questions" data-tab-next="complete">Next<i class="material-icons">navigate_next</i></button></div>
                        </div>
                    </div>
                </div>
                <script>
               
                    var tecval=1,extra=1,twobar=1,yellow=1 ,vehicle=1,delivery=1,accssories=1,technical=1,mbcontact=1,test=1,exterior=1,daycount=1,technical=1;
                    var count = tecval + extra+ twobar + yellow + vehicle + delivery + accssories + technical + mbcontact + test + exterior + daycount + technical  ;
               function technical_yes(info){
                if (info == "2") {
                //alert(testbal); tech_error
                $("#icon-tech_id").html("fiber_manual_record");
                $("#icon-tech_id").addClass("error");
                $("#icon-tech_id").removeClass("success");
    

            } else {
                $("#icon-tech_id").html("check");
                $("#icon-tech_id").addClass("success");
                $("#icon-tech_id").removeClass("error");
              
            }
                    tecval=0;
                   questionBadge()
               }
               function extra_radio(info){
                if (info == "2") {
                    $("#icon-oil_id").html("fiber_manual_record");
                    $("#icon-oil_id").addClass("error");
                    $("#icon-oil_id").removeClass("success");

                } else {
                    $("#icon-oil_id").html("check");
                    $("#icon-oil_id").addClass("success");
                    $("#icon-oil_id").removeClass("error");
                }

                     extra=0;
                   questionBadge()
               }
               function twobar_radio(info) {
                if (info == "2") {
                    $("#icon-bar_id").html("fiber_manual_record");
                    $("#icon-bar_id").addClass("error");
                    $("#icon-bar_id").removeClass("success");

                } else {
                    $("#icon-bar_id").html("check");
                    $("#icon-bar_id").addClass("success");
                    $("#icon-bar_id").removeClass("error");
                }
                     twobar=0;
                   questionBadge()
               }
               function yellow_radio(info) {
                
                if (info == "2") {
                    $("#icon-yellow_id").html("fiber_manual_record");
                    $("#icon-yellow_id").addClass("error");
                    $("#icon-yellow_id").removeClass("success");

                } else {
                    $("#icon-yellow_id").html("check");
                    $("#icon-yellow_id").addClass("success");
                    $("#icon-yellow_id").removeClass("error");
                }
                
                     yellow=0;
                   questionBadge()
               }
               function vehicle_radio(info){
                
                if (info == "2") {
                    $("#icon-vehicle_id").html("fiber_manual_record");
                    $("#icon-vehicle_id").addClass("error");
                    $("#icon-vehicle_id").removeClass("success");

                } else {
                    $("#icon-vehicle_id").html("check");
                    $("#icon-vehicle_id").addClass("success");
                    $("#icon-vehicle_id").removeClass("error");
                }
                  vehicle=0;
                   questionBadge()
               }
               function delivery_radio(info) {
                if (info == "2") {
                    $("#icon-delivery_id").html("fiber_manual_record");
                    $("#icon-delivery_id").addClass("error");
                    $("#icon-delivery_id").removeClass("success");

                } else {
                    $("#icon-delivery_id").html("check");
                    $("#icon-delivery_id").addClass("success");
                    $("#icon-delivery_id").removeClass("error");
                }
                   delivery=0;
                   questionBadge()
               }
               function accssories_radio(info){
                if (info == "2") {
                    $("#icon-accessory_id").html("fiber_manual_record");
                    $("#icon-accessory_id").addClass("error");
                    $("#icon-accessory_id").removeClass("success");

                } else {
                    $("#icon-accessory_id").html("check");
                    $("#icon-accessory_id").addClass("success");
                    $("#icon-accessory_id").removeClass("error");
                }
                     accssories=0;
                   questionBadge()
               }
               function mbcontact_radio(info){
                if (info == "2") {
                    $("#icon-techinspec_id").html("fiber_manual_record");
                    $("#icon-techinspec_id").addClass("error");
                    $("#icon-techinspec_id").removeClass("success");

                } else {
                    $("#icon-techinspec_id").html("check");
                    $("#icon-techinspec_id").addClass("success");
                    $("#icon-techinspec_id").removeClass("error");
                }
                     mbcontact=0;
                   questionBadge()
               }
               function test_radio(info){
                if (info == "2") {
                    $("#icon-contact_id").html("fiber_manual_record");
                    $("#icon-contact_id").addClass("error");
                    $("#icon-contact_id").removeClass("success");

                } else {
                    $("#icon-contact_id").html("check");
                    $("#icon-contact_id").addClass("success");
                    $("#icon-contact_id").removeClass("error");
                }
                     test=0;
                   questionBadge()
               }
               function exterior_radio(info){
                if (info == "2") {
                    $("#icon-test_id").html("fiber_manual_record");
                    $("#icon-test_id").addClass("error");
                    $("#icon-test_id").removeClass("success");

                } else {
                    $("#icon-test_id").html("check");
                    $("#icon-test_id").addClass("success");
                    $("#icon-test_id").removeClass("error");
                }
                    exterior=0;
                   questionBadge()
               }
               function daycount_radio(info){
                if (info == "2") {
                    $("#icon-exterior_id").html("fiber_manual_record");
                    $("#icon-exterior_id").addClass("error");
                    $("#icon-exterior_id").removeClass("success");

                } else {
                    $("#icon-exterior_id").html("check");
                    $("#icon-exterior_id").addClass("success");
                    $("#icon-exterior_id").removeClass("error");
                }
                  
                    daycount=0;
                   questionBadge()
               }
               function technical_radio(info){
                if (info == "2") {
                    $("#icon-technical_id").html("fiber_manual_record");
                    $("#icon-technical_id").addClass("error");
                    $("#icon-technical_id").removeClass("success");

                } else {
                    $("#icon-technical_id").html("check");
                    $("#icon-technical_id").addClass("success");
                    $("#icon-technical_id").removeClass("error");
                }
                technical=0;
                questionBadge()
               }
               
              function questionBadge(){
                var count = tecval + extra+ twobar + yellow + vehicle + delivery + accssories + technical + mbcontact + test + exterior + daycount + technical ;
                if (count > 0) {
                $("#question_badge").html("<span class='mdl-badge' id='question_badge' data-badge='" + count + "'></span>");
                 } else $("#question_badge").html("<span></span>");
               }
               if (count > 0) {
                $("#question_badge").html("<span class='mdl-badge' id='question_badge' data-badge='" + count + "'></span>");
                } else $("#question_badge").html("<span></span>");

               
           
              
               
                //   });
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
                <script>
                $(document).ready(function() {
                 $("#icon-tech_id").html("fiber_manual_record");
                $("#icon-tech_id").addClass("success");
                $("#icon-tech_id").removeClass("error");

                $("#icon-oil_id").html("fiber_manual_record");
                $("#icon-oil_id").addClass("success");
                $("#icon-oil_id").removeClass("error");

                $("#icon-bar_id").html("fiber_manual_record");
                $("#icon-bar_id").addClass("success");
                $("#icon-bar_id").removeClass("error");

                $("#icon-yellow_id").html("fiber_manual_record");
                $("#icon-yellow_id").addClass("success");
                $("#icon-yellow_id").removeClass("error");
            
                $("#icon-vehicle_id").html("fiber_manual_record");
                $("#icon-vehicle_id").addClass("success");
                $("#icon-vehicle_id").removeClass("error");

                $("#icon-delivery_id").html("fiber_manual_record");
                $("#icon-delivery_id").addClass("success");
                $("#icon-delivery_id").removeClass("error");

                $("#icon-accessory_id").html("fiber_manual_record");
                $("#icon-accessory_id").addClass("success");
                $("#icon-accessory_id").removeClass("error");
                
                $("#icon-techinspec_id").html("fiber_manual_record");
                $("#icon-techinspec_id").addClass("success");
                $("#icon-techinspec_id").removeClass("error");
               
                $("#icon-contact_id").html("fiber_manual_record");
                $("#icon-contact_id").addClass("success");
                $("#icon-contact_id").removeClass("error");

                $("#icon-test_id").html("fiber_manual_record");
                $("#icon-test_id").addClass("success");
                $("#icon-test_id").removeClass("error");

                $("#icon-exterior_id").html("fiber_manual_record");
                $("#icon-exterior_id").addClass("success");
                $("#icon-exterior_id").removeClass("error");

                $("#icon-technical_id").html("fiber_manual_record");
                $("#icon-technical_id").addClass("success");
                $("#icon-technical_id").removeClass("error");

     
                });
                  $(document).on("click", "body", function() {
                 
                //$("#tech_inspection").style.display("none");
                   var technical_inspection =  $(':radio[name="33_5f1ad85a13204"]:not(:checked)').length - 2;
                 
                   var count =8 ;
                  

                   if (technical_inspection == 1) {
                    $("#technical_inspection").html("<i class='material-icons error'>fiber_manual_record</i>");
                    } else {
                    $("#technical_inspection").html("<i class='material-icons success'>check</i>");
                    }
                });
                </script>

            </div>

            <div class="mdl-layout__tab-panel" id="media_panel">
                <div class="box box-border">
                    <div class="box-header" data-original-title>
                        <div class="box-icon">
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="total_file_size" value="0 B" id="total_file_size" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="total_file_size">Total file size</label></div><a title="Download" href="/json/file/downloadall/quality_control/37273" onclick="downloadzip(event, this.getAttribute(&#039;href&#039;))" id="download_zip" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn spf-link" style="bottom: 10px; display: none;padding:0;" target="_blank"><i class="material-icons">file_download</i><label>Download zip</label></a>
                        <div class="pictureswipe_wrap tab_media">
                            <div class="pictureswipe_box upload_box">
                                <div class="pictureswipe_boxInner">
                                    <div class="pictureswipe_imgContainer upload_box" style="cursor: default;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab" data-tab-next="complete">Next<i class="material-icons">navigate_next</i></button>
            </div>
            <div class="mdl-layout__tab-panel" id="complete_panel">
                <div class="box box-border">
                    <div class="box-header" data-original-title>
                        <div class="box-icon">
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group"><textarea class="mdl-textfield__input saveonchange" type="text" name="comments" value="" id="comments"><?php echo $quality_control[0]->comments?></textarea><label class="mdl-textfield__label" for="comments">Comments</label></div>
                            </div>
                           
                            <div class="mdl-cell mdl-cell--12-col"><button id="completeQualityControl" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored ">Complete quality control</button></div>
                        </div>
                    </div>
                </div>
                <style>
               .success {
              font-weight: bold;
              color: #3b8e3b;
             }
             .error {
            color: #d50000;
             }

           </style>
                <style>
                    #completeQualityControl {
                        display: none;
                        left: 50%;
                        transform: translateX(-50%);
                        margin-top: 40px;
                    }

                    #completeQualityControl.complete {
                        display: block;
                    }

                    #incompleteQualityControl.complete {
                        display: none;
                    }
                </style>
            </div>

            <!-- <div style="display:none;">

                <a class="btn btn-upload" title="Accepts: gif,jpeg,png,bmp,doc,xls,ppt,pdf,mpg,wmv,avi,mkv,mp4,mp3,zip,rar" href="javascript:void(0);" id="upload_file_all">
                    <i class="fa fa-upload"></i>
                    Upload
                    <div class="upload-form button-upload button">
                        <input type="file" name="file" multiple>
                    </div>
                </a>
            </div> -->
            <!-- <button id="add-media-to-field" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
               
            </button> -->
        </div>

    </div>


    <script type="text/javascript">
        var currentContainer = $('.sliding-page').not('#page-fragment');
        var current_field = null;

        var googleMaps = {
            map: null,
            you: null,
            path: null,
            watch: null
        };

        $(function() {
            componentHandler.upgradeDom();
            $('body').trigger('TweenAnimationDone');

            $('#add-media-to-field').click(function() {
                var form = $('#upload_file_all').find('.upload-form');
                var data = form.fileupload('option', 'formData');
                data.object_type = 'diagnosis';
                data.object_id = diagnosis_id;
                data.field = current_field;
                form.fileupload('option', 'formData', data).find('input[type=file]').click();
            });

            document.addEventListener('keydown', function(event) {
                var prevent = false;
                if (event.keyCode === 8) {
                    prevent = true;
                    var element = $(event.srcElement || event.target);
                    if (!element.prop('readonly') && !element.prop('disabled')) {
                        if (element.get(0).isContentEditable) {
                            prevent = false;
                        } else if (element.is('input')) {
                            if (['text', 'password', 'file', 'search', 'email', 'number', 'date', 'color', 'datetime', 'datetime-local', 'month', 'range', 'search', 'tel', 'time', 'url', 'week'].indexOf(element.attr('type').toLowerCase()) > -1) {
                                prevent = false;
                            }
                        } else if (element.is('textarea')) {
                            prevent = false;
                        }
                    }
                } else if (event.keyCode === 123) {
                    prevent = true;
                }
                if (prevent) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    <script type="text/javascript">
        var quality_control_id = 40519;
        var images = [];
        var gallery = {
            close: function() {}
        };
        var canOpenGallery = true;
        var saveOnChangeTimer = [];
        var saveQueue = [];
        var processingQueue = false;
        var qualitycontrolCSRFToken = '';

        function fieldGallery(e) {
            e.stopPropagation();
            var $this = $(this);
            var container = $this.parent();
            if (container.hasClass('active')) {
                if (canOpenGallery) {
                    var id = parseInt($this.attr('data-id'));
                    var field = container.attr('data-for');
                    var index = 0;
                    for (var i = 0; i < images[field].length; i++) {
                        if (images[field][i]['id'] === id) {
                            index = i;
                            break;
                        }
                    }
                    gallery = new PhotoSwipe($(".pswp")[0], PhotoSwipeUI_Default, images[field], {
                        index: index,
                        isClickableElement: function(el) {
                            return el.tagName !== 'IMG';
                        }
                    });
                    gallery.init();
                    gallery.listen('beforeChange', function() {
                        $('video.photoswipe_video').each(function() {
                            this.pause();
                        });
                    });
                    gallery.listen('close', function() {
                        $('video.photoswipe_video').each(function() {
                            this.pause();
                        });
                    });
                    gallery.listen('destroy', function() {
                        setTimeout(function() {
                            $('.pswp').removeClass('pswp--open');
                        }, 100);
                    });
                }
            } else {
                $('.field-gallery-container:not(.only_one_child)').removeClass('active');
                container.addClass('active');
                $('body:not(.field-gallery-item, .field-gallery-container)').one('click', function() {
                    $('.field-gallery-container:not(.only_one_child)').removeClass('active');
                });
            }
        }


        function saveonchange(e) {
            var el = e.target;
            var $this = $(el);
            if (e.type === 'change' && $this.attr('type') !== 'radio' && $this.attr('type') !== 'checkbox' && $this.prop('type') !== 'select-one' && $this.prop('type') !== 'select-multiple') {
                return false;
            }
            var long = ($this.attr('type') !== 'radio' && $this.attr('type') !== 'checkbox');
            var field = $this.attr('name');
            var value = $this.attr('type') !== 'checkbox' ? $this.val() : ($this.prop('checked') ? 1 : 0)
            var quality_control_id = $('#quality_control_id').val();

            $.post('/quality_control/saveChanges', {
                '_token': '<?php echo e(csrf_token()); ?>',
                'quality_control_id': quality_control_id,
                'value': value,
                'type': field
            }, function(success) {
                console.log(success);
                if(success.redirect){
                    window.location.href = '/quality_control/edit/' + success.id;
                }
            });

            
            $('i[data-for="' + field + '"]').addClass('error').html('fiber_manual_record');

            if (field === 'license_plate') {
                $('.license_plate_spinner').show();
                var plate = formatVehiclePlate(value);
                if (plate) {
                    value = plate;
                    $this.val(value);
                }
            }

            if ($this.hasClass('expand')) {
                $('div[data-expand="' + field + '"]').addClass('expand');
                system.textAreaAutogrow();
            } else {
                $('div[data-expand="' + field + '"]').removeClass('expand');
            }

            if (saveOnChangeTimer[field]) {
                clearTimeout(saveOnChangeTimer[field]);
            }

            if ($this.attr('type') === 'number' && value === '') {
                value = 0;
            }

            saveOnChangeTimer[field] = setTimeout(function() {
                saveOnChangeTimer[field] = null;
                addToQueue({
                    field: field,
                    value: value,
                });
            }.bind(this), (long ? 1500 : 10));
        }


        $('body').one('TweenAnimationDone', function() {

            system.textAreaAutogrow();

            currentContainer.find('footer').hide();

            $.ajax('/json/file/getAllForQualityControl/40519', {
                data: {
                    ajax: true
                },
                dataType: 'json'
            }).done(function(data) {
                for (var i = 0; i < data.length; i++) {
                    appendToGallery(data[i]);
                }
            });

            currentContainer.find('.add_quality_control_media').on('click', function() {
                var form = $('#upload_file_all').find('.upload-form');
                var data = form.fileupload('option', 'formData');
                data.object_type = 'quality_control';
                data.object_id = quality_control_id;
                data.field = $(this).attr('data-field');
                form.fileupload('option', 'formData', data).find('input[type=file]').click();
            });

            currentContainer.children().on('click', '.field-gallery-item', fieldGallery);

            $('dialog').off('click', '.field-gallery-item', fieldGallery).on('click', '.field-gallery-item', fieldGallery);

            currentContainer.find('.saveonchange').on('input change', saveonchange);

            currentContainer.find('a.mdl-layout__tab').click(function() {
                var dialog = document.querySelector('dialog');
                if (!dialog.show) {
                    dialogPolyfill.registerDialog(dialog);
                }
                if (dialog.hasAttribute('open')) {
                    dialog.close();
                }
                var tab = $(this).attr('href').replace('#', '').replace('_panel', '');
                queryString.push('tab', tab, true);
                $(this).prevAll().find('.mdl-badge').show();

                // force a repaint (iphone 6 didnt render some tabs)
                var panel = $($(this).attr('href'));
                panel.hide();
                window.requestAnimationFrame(function() {
                    panel.show();

                    panel[0].style.display = 'none';
                    panel[0].offsetHeight; // no need to store this anywhere, the reference is enough
                    panel[0].style.display = '';

                    system.textAreaAutogrow();
                });

            });

            currentContainer.find('.next-tab').click(function() {
                $('.mdl-layout__tab[href="#' + $(this).data('tab-next') + '_panel"]').get(0).click();
            });
        });
    </script>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Updated_code\resources\views/QualityControl/view.blade.php ENDPATH**/ ?>