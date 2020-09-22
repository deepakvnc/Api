<?php $__env->startSection('content'); ?>
<header class="mdl-layout__header">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
<script src="http://cdn.jsdelivr.net/g/filesaver.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.1.0/jszip-utils.min.js"></script>
    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="<?php echo e(url('/quality_control')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a>
        <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
        <span id="wo-title">
            <?php if ($quality_control) {
                                echo $quality_control[0]->wo_number;
                            } else {
                                echo 'New quality control';
                            }
                            ?>
            </span>
            <span id="page-title">Dashboard Quality Control</span>
        </span>
        <div class="mdl-layout-spacer"></div>
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="#id_panel" class="mdl-layout__tab is-active">Id 
        <span class='mdl-badge' id='id_badge'></span>
        </a>

        <a href="#questions_panel" class="mdl-layout__tab">Questions
        <span class='mdl-badge' id='question_badge'></span>
      </a>
        <a href="#media_panel" class="mdl-layout__tab">Media</a>
        <a href="#complete_panel" class="mdl-layout__tab">Close</a>
    </div>
</header>

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
                                <div class="mdl-selectfield mdl-js-selectfield is-dirty" >
                                    <?php
                                           if($quality_control)
                                                $inspector= $quality_control[0]->inspector; 
                                                else 
                                                $inspector=$mechanics[0]['id']
                                                ?>
                                    <select class="fullwidth mdl-selectfield__select saveonchange id_input" id="inspector"
                                                name="inspector"  onchange="saveOnChange(value,'inspector')" value="<?php echo $inspector?>">                                     
                                                <?php
                                         
                                        for($i=0;$i<count($mechanics);$i++)
                                        {
                                           
                                          ?>
                                            <option value="<?php echo $mechanics[$i]['id']?>"><?php echo $mechanics[$i]['text']?></option>
                                           <?php
                                           }
                                           ?>

                                    
                                    </select>
                                    
                                    <label class="mdl-textfield__label" for="inspector">Inspector</label>
                                    </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                             <i id="icon-mechanic_id" class="material-icons"></i>
                                <div class="mdl-selectcontainer">
                                    <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                                    <select class="fullwidth mdl-selectfield__select saveonchange" id="employee" name="employee" value="7664">
                                            <option value="7664" class="orange" selected>Colleges Modernization</option>
                                            <option value="501" class="orange">ECOM Monteur</option>
                                            <option value="502" class="orange">ECOM Werkplaatschef</option>
                                            <option value="6909" class="orange">External 2</option>
                                            <option value="6910" class="orange">External 3</option>
                                            <option value="7641" class="orange">MBC Monteur Monteur</option>
                                            <option value="7645" class="orange">MBC Werkplaatschef</option>
                                            <option value="7612" class="orange">Rogier Schoonhoven</option>
                                        </select><label class="mdl-textfield__label" for="employee">Mechanic</label></div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-wo_input" class="material-icons"></i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input class="mdl-textfield__input saveonchange add_media id_input" type="text" name="wo_number" value="<?php if($quality_control) echo $quality_control[0]->wo_number; else echo''?>" id="wo_number" onclick=""/><label class="mdl-textfield__label" for="wo_number">WO number</label></div>
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
                            <div class="mdl-cell mdl-cell--12-col"><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab inactive" data-tab-current="id" data-tab-next="questions">Next<i class="material-icons">navigate_next</i></button></div>
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
                    $('body').ready(function() {
                        var check_value = $('#employee').val();
                        //alert(check_value)
                        if (check_value == null) {
                            $("#icon-mechanic_id").html("fiber_manual_record");
                            $("#icon-mechanic_id").addClass("error");
                            $("#icon-mechanic_id").removeClass("success");
                        } 
                        else if (check_value == 0) {
                            $("#icon-mechanic_id").html("fiber_manual_record");
                            $("#icon-mechanic_id").addClass("error");
                            $("#icon-mechanic_id").removeClass("success");
                        }
                        else {
                            $("#icon-mechanic_id").html("check");
                            $("#icon-mechanic_id").addClass("success");
                            $("#icon-mechanic_id").removeClass("error");
                        }
                    })
                    $('#employee').change(function() {
                        var check_value = $('#employee').val();
                        if (check_value == null) {
                            $("#icon-mechanic_id").html("fiber_manual_record");
                            $("#icon-mechanic_id").addClass("error");
                            $("#icon-mechanic_id").removeClass("success");
                        } else {
                            $("#icon-mechanic_id").html("check");
                            $("#icon-mechanic_id").addClass("success");
                            $("#icon-mechanic_id").removeClass("error");
                        }
                    })
                    
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
                
                var images=[];
                var fileSize=0.00;
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
                            debugger
                            var file_name = files[i].name
                            var size = files[i].size;
                                size= parseFloat(size) / 1024;
                                fileSize= parseFloat(fileSize) + size ;
                                fileSize=fileSize.toFixed(2) + " " + 'KB'
                             document.getElementById("total_file_size").value=fileSize;
                            img_names.push(file_name)
                            var file = files[i];
                            if (!file.type.match('image')) continue;
                            var picReader = new FileReader();
                            picReader.addEventListener('load', function(event) {
                            var picFile = event.target;
                            debugger;
                            images.push({
                           'Imagename':file_name,
                           'Image':picFile.result
                            })
                                media_images.push(picFile.result);
                                var html =
                                    '<div>' + '<i class="material-icons field-gallery-icon" style="color:red !important;float: right;" onclick="delete_media(this.id)" id="' + field_name + '">delete_forever</i>'+ '<span class="field-gallery-item" style="background-image: url(' + picFile.result + ')" onclick="setFieldname(this.id)" id="' + field_name + '">'+
                                    
                                    
                                    '</div>';
                                output.append(html);
                                num = num + 1;
                            });
                            picReader.readAsDataURL(file);
                         
                            console.log("myArray",images);
                            
                            setTimeout(() => {
                             
                            var text=" ";
                            
                            document.getElementById("ImageDisplay").innerHTML =" ";
                            var img = document.createElement('img')
                           for (i = 0; i < images.length; i++) {
                           
                            img.src = images[i].Image;
                            // text += images[i].Imagename + "<br>";
                            var h = document.getElementById("ImageDisplay");
                            var image="<div style='display: inline-block !important;'> <img src='" +  img.src + "' width='250' height='220'> &nbsp;  &nbsp; <figcaption style='text-align:left;margin-top:10px'> <i class='material-icons field-gallery-icon' style='color:red'  onclick='delete_media(this.id)' id=''>delete_forever</i>" + images[i].Imagename.substring(0,7) + "</figcaption>"
                           
                             h.insertAdjacentHTML("afterbegin", image);
                            }
                            
                            console.log("text",text);
                            
                          


                          
                        }, 2000);
                        
                        
                       
                        console.log('img_names', img_names)
                        console.log('media_images', media_images)
                    
                        // loacalStoreImage(images);
                      
    }
                     
                        
                        $("#add_media_btn").val('');
                    } else {
                        console.log('Browser not support');
                    }
                }
               


 function downloadzip() {
  var zip = new JSZip();
  var count = 0;
  var zipFilename = "QualityControl.zip";

  images.forEach(function (url, i) {
     var filename = url.Imagename;
    // var filename = i.toString()+'sp.png';
    filename = filename.replace(/[\/\*\|\:\<\>\?\"\\]/gi, '').replace("httpsi.imgur.com","");
    // loading a file and add it in a zip file
    JSZipUtils.getBinaryContent(url.Image, function (err, data) {
      if (err) {
        throw err; // or handle the error
      }
      zip.file(filename, data, { binary: true });
      count++;
      if (count == images.length) {
        zip.generateAsync({ type: 'blob' }).then(function (content) {
          saveAs(content, zipFilename);
        });
      }
    });
  });
 }
  </script>

            <script>
                function delete_media(deletemedia_id) { //pass ImageID
                   
                    system.confirm("Delete Media", "Are you sure you want to delete this Media file?  " ,
                        function() {
                            // alert("you have Clicked OK to Delete File: " + deletemedia_id);
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
                            <i class="material-icons error"  id="technical_id_no" data-for="49">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="technical_id_yes">check</i>
                            <i class="material-icons error" data-for="49" id="technical_id_close">close</i>
                          
                            <label>Technical inspection no ok ?</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                            <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="33_5f1ad85a13204">
                            <input value="1" class="mdl-radio__button saveonchange"   large="1" name="33" type="radio" id="33_5f1ad85a13204" onClick="technical_yes(value)">
                            <span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="33_5f1ad85a1324f">
                            <input value="2" class="mdl-radio__button saveonchange expand"    large="1" name="33" type="radio" id="33_5f1ad85a1324f" onClick="technical_yes(value)">
                            <span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="33_5f1ad85a13288">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="33" type="radio" id="33_5f1ad85a13288" onClick="technical_yes(value)" >
                            <span class="mdl-radio__label">NA</span></label></div>

                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="33">
                            <i class="material-icons error" data-for="47_description">fiber_manual_record</i>
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
                            <i class="material-icons error"  id="missing_no" data-for="49">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="missing_yes">check</i>
                            <i class="material-icons error" data-for="49" id="missing_close">close</i>
                            <label>Extra bottle of oil present</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="47_5f1ad85a133d2">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="47" type="radio" id="47_5f1ad85a133d2" onClick="extra_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="47_5f1ad85a1341b">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="47" type="radio" id="47_5f1ad85a1341b" onClick="extra_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="47_5f1ad85a1345f">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="47" type="radio" id="47_5f1ad85a1345f" onClick="extra_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="47">
                            <i class="material-icons error" data-for="47_description">fiber_manual_record</i>
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
                            <i class="material-icons error"  id="twobar_no" data-for="49">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="twobar_yes">check</i>
                            <i class="material-icons error" data-for="49" id="twobar_close">close</i>
                            <label>If tow bar, white plate, adapter and sticker with ball pressure available</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="48_5f1ad85a1354d">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="48" type="radio" id="48_5f1ad85a1354d" onClick="twobar_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="48_5f1ad85a13599">
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
                            <i class="material-icons error"  id="yellow_no" data-for="49">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="yellow_yes">check</i>
                            <i class="material-icons error" data-for="49" id="yellow_close">close</i>
                            <label>Yellow jackets present?</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="46_5f1ad85a13666">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="46" type="radio" id="46_5f1ad85a13666" onClick="yellow_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="46_5f1ad85a136ab">
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
                            <i class="material-icons error"  id="vehicle_no" data-for="49">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="vehicle_yes">check</i>
                            <i class="material-icons error" data-for="49" id="vehicle_close">close</i>
                            <label>Vehicle tracking system on and off</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="32_5f1ad85a13770">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="32" type="radio" id="32_5f1ad85a13770" onClick="vehicle_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="32_5f1ad85a137b5">
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
                            <i class="material-icons error"  id="delivery_no" data-for="49">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="delivery_yes">check</i>
                            <i class="material-icons error" data-for="49" id="delivery_close">close</i>
                            <label>Delivery forms completed in WIS</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="28_5f1ad85a13879">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="28" type="radio" id="28_5f1ad85a13879" onClick="delivery_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="28_5f1ad85a138be">
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
                            <i class="material-icons error" data-for="49" id="inspection_no">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="inspection_yes">check</i>
                            <i class="material-icons error" data-for="49" id="inspection_close">close</i>
                            
                            <label>Technical inspection not OK?</label>
                            </div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="43_5f1ad85a13a89">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="43" type="radio" id="43_5f1ad85a13a89" onClick="mbcontact_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="43_5f1ad85a13acd">
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
                            <!-- <i class="material-icons error" data-for="50">fiber_manual_record</i> -->
                            <i class="material-icons error" data-for="49" id="MB_no">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="MB_yes">check</i>
                            <i class="material-icons error" data-for="49" id="MB_close">close</i>
                            <label>MB Contact OK</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="50_5f1ad85a13b90">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="50" type="radio" id="50_5f1ad85a13b90" onClick="test_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="50_5f1ad85a13bd4">
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
                            <!-- <i class="material-icons error" data-for="183">fiber_manual_record</i> -->
                            <i class="material-icons error" data-for="49" id="Test_no">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="Test_yes">check</i>
                            <i class="material-icons error" data-for="49" id="Test_close">close</i>
                            <label>Test</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="183_5f1ad85a13c9e">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="183" type="radio" id="183_5f1ad85a13c9e" onClick="exterior_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="183_5f1ad85a13ce4">
                            <input value="2" class="mdl-radio__button saveonchange expand" large="1" name="183" type="radio" id="183_5f1ad85a13ce4" onClick="exterior_radio(value)"><span class="mdl-radio__label">No</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="183_5f1ad85a13d28">
                            <input value="3" class="mdl-radio__button saveonchange" large="1" name="183" type="radio" id="183_5f1ad85a13d28" onClick="exterior_radio(value)"><span class="mdl-radio__label">NA</span></label></div>
                            <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone" data-expand="183"><i class="material-icons error" data-for="183_description">fiber_manual_record</i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                    <textarea class="mdl-textfield__input saveonchange" type="text" name="183_description" value="" id="183_description"></textarea>
                                    <label class="mdl-textfield__label" for="183_description">Test</label>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i class="material-icons error" data-for="49" id="exterior_no">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="exterior_yes">check</i>
                            <i class="material-icons error" data-for="49" id="exterior_close">close</i>
                            <label>Is the exterior of the vehicle well polished</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="27_5f1ad85a13e03">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="27" type="radio" id="27_5f1ad85a13e03" onClick="daycount_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="27_5f1ad85a13e4a">
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
                            <!-- <i class="material-icons error" data-for="45">fiber_manual_record</i> -->
                            <i class="material-icons error" data-for="49" id="day_no">fiber_manual_record</i>
                            <i class="material-icons" data-for="49" id="day_yes">check</i>
                            <i class="material-icons error" data-for="49" id="day_close">close</i>
                            <label>Day counter set to zero</label></div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone"><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="45_5f1ad85a13f0f">
                            <input value="1" class="mdl-radio__button saveonchange" large="1" name="45" type="radio" id="45_5f1ad85a13f0f" onClick="technical_radio(value)"><span class="mdl-radio__label">Yes</span></label><label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="45_5f1ad85a13f54">
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
                            <div class="mdl-cell mdl-cell--12-col" id="question_next">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab" data-tab-next="complete">Next Question<i class="material-icons">navigate_next</i></button>
                           </div>
                        </div>
                    </div>
                </div>
                <script>
                  
                  onPageLoad()

                function onPageLoad(){
                    question_next.style.display="none";
                    technical_id_no.style.display = "block";
                    technical_id_yes.style.display = "none";
                    technical_id_close.style.display = "none";

                    missing_no.style.display = "block";
                    missing_yes.style.display = "none";
                    missing_close.style.display = "none";

                    twobar_no.style.display = "block";
                    twobar_yes.style.display = "none";
                    twobar_close.style.display = "none";

                    yellow_no.style.display = "block";
                    yellow_yes.style.display = "none";
                    yellow_close.style.display = "none";

                    vehicle_no.style.display = "block";
                    vehicle_yes.style.display = "none";
                    vehicle_close.style.display = "none";
                    
                    delivery_no.style.display = "block";
                    delivery_yes.style.display = "none";
                    delivery_close.style.display = "none";
                    
                   

                    inspection_no.style.display="block";
                    inspection_yes.style.display="none";
                    inspection_close.style.display="none";
                  
                    MB_no.style.display="block";
                    MB_yes.style.display="none";
                    MB_close.style.display="none";

                    Test_no.style.display="block";
                    Test_yes.style.display="none";
                    Test_close.style.display="none";
                    
                    exterior_no.style.display="block";
                    exterior_yes.style.display="none";
                    exterior_close.style.display="none";
                    
                    day_no.style.display="block";
                    day_yes.style.display="none";
                    day_close.style.display="none";

                }

                    var tecval=1,extra=1,twobar=1,yellow=1 ,vehicle=1,delivery=1,accssories=1,technical=1,mbcontact=1,test=1,exterior=1,daycount=1;
                    var count = tecval + extra+ twobar + yellow + vehicle + delivery + accssories + technical + mbcontact + test + exterior + daycount ;
                  
                  
             
               function technical_yes(info){
                    tecval=0;
                   questionBadge()
                   if(info==1 || info==3){
                    technical_id_no.style.display = "none";
                    technical_id_yes.style.display = "block";
                    technical_id_close.style.display = "none";
                    
                   }else{
                    technical_id_no.style.display = "none";
                    technical_id_yes.style.display = "none";
                    technical_id_close.style.display = "block";
                       
                   }
                   
               }
               function extra_radio(info){
                     extra=0;
                   questionBadge()
                   if(info==1 || info==3){
                    missing_no.style.display = "none";
                    missing_yes.style.display = "block";
                    missing_close.style.display = "none";
                   }else{
                    missing_no.style.display = "none";
                    missing_yes.style.display = "none";
                    missing_close.style.display = "block";
                }
                  
               }
               function twobar_radio(info){
                     twobar=0;
                   questionBadge()
                   if(info==1 || info==3){
                    twobar_no.style.display = "none";
                    twobar_yes.style.display = "block";
                    twobar_close.style.display = "none";
                   }else{
                    twobar_no.style.display = "none";
                    twobar_yes.style.display = "none";
                    twobar_close.style.display = "block";
                       
                   }
               }
            
               function yellow_radio(info){
                     yellow=0;
                   questionBadge()
                   if(info==1 || info==3){
                    yellow_no.style.display = "none";
                    yellow_yes.style.display = "block";
                    yellow_close.style.display = "none";
                   }else{
                    yellow_no.style.display = "none";
                    yellow_yes.style.display = "none";
                    yellow_close.style.display = "block";
                       
                   }
               }

               function vehicle_radio(info){
                  vehicle=0;
                   questionBadge()
                   if(info==1 || info==3){
                    vehicle_no.style.display = "none";
                    vehicle_yes.style.display = "block";
                    vehicle_close.style.display = "none";
                   }else{
                    vehicle_no.style.display = "none";
                    vehicle_yes.style.display = "none";
                    vehicle_close.style.display = "block";
                       
                   }
               }
               
               function delivery_radio(info){
                   delivery=0;
                   questionBadge()
                   if(info==1 || info==3){
                    delivery_no.style.display = "none";
                    delivery_yes.style.display = "block";
                    delivery_close.style.display = "none";
                   }else{
                    delivery_no.style.display = "none";
                    delivery_yes.style.display = "none";
                    delivery_close.style.display = "block";
                       
                   }
               }
               

            //    function accssories_radio(info){
            //          accssories=0;
                     
            //        questionBadge()
            //        if(info==1 || info==3){
            //         accessories_no.style.display = "none";
            //         accessories_yes.style.display = "block";
            //         accessories_close.style.display = "none";
            //        }else{
            //         accessories_no.style.display = "none";
            //         accessories_yes.style.display = "none";
            //         accessories_close.style.display = "block";
                       
            //        }
                  
            //    }
          
               function mbcontact_radio(info){
                     mbcontact=0;
                   questionBadge()

                   if(info==1 || info==3){
                    inspection_yes.style.display="block";
                    inspection_no.style.display="none";
                    inspection_close.style.display="none";
                   }else{
                    inspection_yes.style.display="none";
                    inspection_no.style.display="none";
                    inspection_close.style.display="block";
                   }
               }
               
               function test_radio(info){
                     test=0;
                   questionBadge()
                   if(info==1 || info==3){
                    MB_yes.style.display="block";
                    MB_no.style.display="none";
                    MB_close.style.display="none";
                   }else{
                    MB_yes.style.display="none";
                    MB_no.style.display="none";
                    MB_close.style.display="block";
                   }
               }
             
               function exterior_radio(info){
                    exterior=0;
                   questionBadge()
                   if(info==1 || info==3){
                    Test_no.style.display="none";
                    Test_yes.style.display="block";
                    Test_close.style.display="none";
                   }else{
                    Test_no.style.display="none";
                    Test_yes.style.display="none";
                    Test_close.style.display="block";
                   }
               }
               
               function daycount_radio(info){
                    daycount=0;
                   questionBadge()
                   if(info==1 || info==3){
                    exterior_no.style.display="none";
                    exterior_yes.style.display="block";
                    exterior_close.style.display="none";
                   }else{
                    exterior_no.style.display="none";
                    exterior_yes.style.display="none";
                    exterior_close.style.display="block";
                   }
               }
               function technical_radio(info){
                technical=0;
                accssories=0;
                questionBadge()
                if(info==1 || info==3){
                    day_no.style.display="none";
                   day_yes.style.display="block";
                   day_close.style.display="none";
                   }else{
                    day_no.style.display="none";
                    day_yes.style.display="none";
                    day_close.style.display="block";
                   }


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
                 
                  $(document).on("click", "body", function() {
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
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="total_file_size" value="0 B" id="total_file_size" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="total_file_size">Total file size</label></div>
                    <div    id="ImageDisplay" style="display:inline-block !important;">
                    
                                </div>
                                </div>
                        <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly"><input readonly="readonly" type="text" name="total_file_size" value="0 B" id="total_file_size" class="mdl-textfield__input" /><label class="mdl-textfield__label" for="total_file_size">Total file size</label></div>
                        <div class="pictureswipe_wrap tab_media">
                            <div class="pictureswipe_box upload_box">
                                <div class="pictureswipe_boxInner">
                               
                                <div class="info-container" style="margin-top:50px"><i class="material-icons field-gallery-icon" data-id="397320">delete_forever</i>Tire profile</div>
                                </div>
                                
                            </div>
                        </div>
                    </div> -->
                </div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab" data-tab-next="complete">Next<i class="material-icons">navigate_next</i></button>
           <div>
           <a title="Download"  onclick="downloadzip(event)" id="download_zip" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn spf-link" style="bottom: 10px;padding:0;" target="_blank"><i class="material-icons">file_download</i><label>Download zip</label></a>
    
           </div>
           
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
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <textarea class="mdl-textfield__input saveonchange" type="text" name="comments" value="" id="comments"></textarea>
                                <label class="mdl-textfield__label" for="comments">Comments</label></div>
                            </div>
                            <!-- Sasikala code starts here !-->


                            <div class="mdl-cell mdl-cell--12-col"><button id="completeQualityControl" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored"  onclick="window.location.href='/quality_control'">Complete quality control</button></div>
                            <!-- Sasikala code ends here !-->
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
                    $('#quality_control_id').val(success.id);
                        window.history.pushState('edit', 'Title', '/quality_control/edit/' + success.id);
                    //window.location.href = '/quality_control/edit/' + success.id;
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
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\16thsept\16thsept\resources\views/QualityControl/EditPanels.blade.php ENDPATH**/ ?>