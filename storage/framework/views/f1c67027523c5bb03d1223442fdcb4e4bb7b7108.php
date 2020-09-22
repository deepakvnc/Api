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
                                    <!--sasikala code starts here!-->
                                <div class="mdl-selectfield mdl-js-selectfield is-dirty" >
                                    <?php
                                           //echo $quality_control[0]->inspector;
                                           if($quality_control)
                                           {
                                           if($quality_control[0]->inspector)
                                                $inspector= $quality_control[0]->inspector; 
                                            else 
                                                $inspector="";
                                           
                                                
                                           }
                                           else
                                           {
                                            $inspector=$mechanics[0]['id'];
                                           }

                                               
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
                                    <!--sasikala code ends here!-->
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                             <i id="icon-mechanic_id" class="material-icons"></i>
                                <div class="mdl-selectcontainer">
                                    <?php
                                if($quality_control)
                                                $employee= $quality_control[0]->employee; 
                                                else 
                                                $employee="";
                                                ?>
                                    <div class="mdl-selectfield mdl-js-selectfield is-dirty" tabindex="-1">
                                    <select class="fullwidth mdl-selectfield__select saveonchange id_input" id="employee" name="employee" value="<?php echo $employee?>">
                                    <?php
                                      if($quality_control)
                                        $disabled = "disabled";
                                     else
                                          $disabled ="";
                                     ?>
                                          
                                         <?php
                                         for($i=0;$i<count($mechanics);$i++)
                                         {
                                             if($i>1)
                                               $class = "orange";
                                            else
                                                $class = "";
                                           ?>
                                             <option value="<?php echo $mechanics[$i]['id']?>" class="<?php echo $class?>"><?php echo $mechanics[$i]['text']?></option>
                                            <?php
                                            }
                                            ?>                                             
                                                                                    
                                  </select><label class="mdl-textfield__label" for="employee" id="employee" style=>Mechanic</label></div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                            <i id="icon-wo_input" class="material-icons"></i>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                                <input class="mdl-textfield__input saveonchange add_media id_input" type="text" name="wo_number" value="<?php if($quality_control) echo $quality_control[0]->wo_number; else echo''?>" id="wo_number" onchange="change_title(value)"/><label class="mdl-textfield__label" for="wo_number">WO number</label></div>
                            </div>
                            <?php
                            if($quality_control)
                            {
                            ?>
                            <input type="hidden"  id="hdn_inspector" name="hdn_inspector" value="<?php echo $mechanics[0]['id']?>">
                            <?php
                            }
                            ?>
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
                            <div class="mdl-cell mdl-cell--12-col" id="id_next">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab" data-tab-next="questions">Next<i class="material-icons">navigate_next</i></button>
                           </div>
                            <!--<div class="mdl-cell mdl-cell--12-col"><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab inactive" data-tab-current="id" data-tab-next="questions">Next<i class="material-icons">navigate_next</i></button></div>!-->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Upload Button - Class SET to Active based on Inputs where Images are Required and Image is Saved with input name -->
            <input type="file" id="add_media_btn" name="add_media_btn" style="display: none;" class="form-control" multiple>
    
        <!-- if tab validation -->
         <script  type="text/javascript">

         function change_title(wo_number)
         {
            document.getElementById('wo-title').innerHTML=wo_number;
         }
         document.getElementById("id_next").style.display = "none";
           $(document).on("click", "body", function() {
              
            var id_input = $('.id_input').filter(function(input) {
                return $(this).val() == "";
            }).length;
            var count = id_input;
            if (count != 0) {
                $("#id_badge").html("<span class='mdl-badge' id='id_badge' data-badge='" + count + "'></span>");
            } else $("#id_badge").html("<span></span>");

            if(count==0){
                document.getElementById("id_next").style.display = "block";
             }
        


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
        
        document.getElementById("id_next").style.display = "none";
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
        document.getElementById("id_next").style.display = "none";
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
    document.getElementById("id_next").style.display = "none";
    
    $("#icon-license_plate").html("fiber_manual_record");
    $("#icon-license_plate").addClass("error");
    $("#icon-license_plate").removeClass("success");
  } else {
    $("#icon-license_plate").html("check");
    $("#icon-license_plate").addClass("success");
    $("#icon-license_plate").removeClass("error");
   }
});
   $(document).ready(function() {
     //  alert(document.getElementById('inspector').value);
   // saveonchange(document.getElementById('inspector').value,'inspector');
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
                                size = parseFloat(size) / 1024;
                                fileSize = parseFloat(fileSize) + size;
                                fileSize = fileSize.toFixed(2) + " " + 'KB'
                                document.getElementById("total_file_size").value = fileSize;
                                img_names.push(file_name)
                                var file = files[i];
                                if (!file.type.match('image')) continue;
                                var picReader = new FileReader();
                                picReader.addEventListener('load', function(event) {
                                    var picFile = event.target;
                                    debugger;
                                    images.push({
                                        'Imagename': file_name,
                                        'Image': picFile.result,
                                        'Field_Name':file_fieldname 
                                    })
                                    media_images.push(picFile.result);
                                    for (i = 0; i < images.length; i++) {
                                    var imagename=images[i].Imagename ;
                                    var imageurl=images[i].Image;
                                    var fieldName=images[i].Field_Name;
                                }   
                                var html = '<div>' + '<i class="material-icons field-gallery-icon" style="color:red !important;float: right;" onclick="delete_media(this.id)" id="' + imagename +'">delete_forever</i>'+ '<span class="field-gallery-item" style="background-image: url(' + imageurl + ')" onclick="setFieldnames(this.id)" id="' + imagename + '">'+
                                    '</div>';
                                output.append(html);
                                num = num + 1;
                            });
                                picReader.readAsDataURL(file);
                                console.log("myArray", images);

                            setTimeout(() => {
                             var text=" ";
                             document.getElementById("ImageDisplay").innerHTML =" ";
                             var img = document.createElement('img')
                            for (i = 0; i < images.length; i++) {
                             img.src = images[i].Image;
                             // text += images[i].Imagename + "<br>";
                             var h = document.getElementById("ImageDisplay");
                             var image="<div style='display: inline-block !important;'> <img src='" +  img.src + "' width='250' height='220'> &nbsp;  &nbsp; <figcaption style='text-align:left;margin-top:10px'> <i class='material-icons field-gallery-icon' style='color:red'  onclick='delete_media(\""+images[i].Imagename +"\");' >delete_forever</i>" + images[i].Imagename.substring(0,7) + "</figcaption>"
                             h.insertAdjacentHTML("afterbegin", image);
                             }
                             console.log("text",text);
                           
                         }, 2000);
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
 
 function delete_media(data) { //pass ImageID
                  var field;
                  var img = document.createElement('img')
                 for( var i=0;i<images.length;i++){
                  if(images[i].Imagename==data){
                    field=images[i].Field_Name;
                  if (i > -1) {
                  images.splice(i, 1);
                 
                     }
       
                   }
                }
    
                   system.confirm("Delete Media", "Are you sure you want to delete this Media file?  " ,
                       function() {
                        var output = $(".field-gallery-container." + field);
                       output.remove();
                        document.getElementById("ImageDisplay").innerHTML =" ";
                            var img = document.createElement('img')
                           for (i = 0; i < images.length; i++) {
                           
                            img.src = images[i].Image;
                            // text += images[i].Imagename + "<br>";
                            var h = document.getElementById("ImageDisplay");
                            var image="<div style='display: inline-block !important;'> <img src='" +  img.src + "' width='250' height='220'> &nbsp;  &nbsp; <figcaption style='text-align:left;margin-top:10px'> <i class='material-icons field-gallery-icon' style='color:red'  onclick='delete_media(\""+images[i].Imagename+"\");' >delete_forever</i>" + images[i].Imagename.substring(0,7) + "</figcaption>"
                           
                             h.insertAdjacentHTML("afterbegin", image);
                            }

                         
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


                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mdl-cell mdl-cell--9-col mdl-cell--5-col-tablet mdl-cell--2-col-phone field-row mdl-zebra__desktop mdl-zebra__phone">
                    <?php if($question->answer == 1 || $question->answer == 3): ?>
                        <i class="material-icons error"   style="display: none"
                            id="radio_id_no_<?php echo e($question->type_id . '_' . $question->id); ?>"
                            data-for="">fiber_manual_record</i>
                        <i class="material-icons" style="display: block"
                            data-for=""
                            id="radio_id_yes_<?php echo e($question->type_id . '_' . $question->id); ?>">check</i>
                        <i class="material-icons error" style="display: none"
                            data-for=""
                            id="radio_id_close_<?php echo e($question->type_id . '_' . $question->id); ?>">close</i>
                    <?php elseif($question->answer == 2): ?>
                        <i class="material-icons error"   style="display: none"
                        id="radio_id_no_<?php echo e($question->type_id . '_' . $question->id); ?>"
                        data-for="">fiber_manual_record</i>
                        <i class="material-icons" style="display: none"
                            data-for=""
                            id="radio_id_yes_<?php echo e($question->type_id . '_' . $question->id); ?>">check</i>
                        <i class="material-icons error" style="display: block"
                            data-for=""
                            id="radio_id_close_<?php echo e($question->type_id . '_' . $question->id); ?>">close</i>
                        
                    <?php elseif($question->answer == null): ?>
                        <i class="material-icons error"   
                        id="radio_id_no_<?php echo e($question->type_id . '_' . $question->id); ?>"
                        data-for="">fiber_manual_record</i>
                        <i class="material-icons" style="display: none"
                            data-for=""
                            id="radio_id_yes_<?php echo e($question->type_id . '_' . $question->id); ?>">check</i>
                        <i class="material-icons error" style="display: none"
                            data-for=""
                            id="radio_id_close_<?php echo e($question->type_id . '_' . $question->id); ?>">close</i>

                    <?php endif; ?>
                
                
                
                        <label><?php echo e($question->en_question); ?></label></div>


                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-textfield--align-right mdl-zebra__desktop mdl-zebra__phone">
                                    <?php if($question->answer == 1): ?>
                                    
                                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>">
                                    <input checked value="1" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">                                
                                    <span class="mdl-radio__label">Yes</span></label>
                                    
                                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>">
                                    <input value="2" class="mdl-radio__button saveonchange expand"    large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">
                                    <span class="mdl-radio__label">No</span></label>
                                    
                                    <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>">
                                    <input  value="3" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')" >
                                    <span class="mdl-radio__label">NA</span></label>


                                    <?php elseif($question->answer == 2): ?>
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>">
                                        <input value="1" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">                                
                                        <span class="mdl-radio__label">Yes</span></label>
                                        
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>">
                                        <input checked value="2" class="mdl-radio__button saveonchange expand"    large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">
                                        <span class="mdl-radio__label">No</span></label>
                                        
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>">
                                        <input  value="3" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')" >
                                        <span class="mdl-radio__label">NA</span></label>

                                        
                                    <?php elseif($question->answer == 3): ?>
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>">
                                        <input value="1" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">                                
                                        <span class="mdl-radio__label">Yes</span></label>
                                        
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>">
                                        <input value="2" class="mdl-radio__button saveonchange expand"    large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">
                                        <span class="mdl-radio__label">No</span></label>
                                        
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>">
                                        <input checked value="3" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')" >
                                        <span class="mdl-radio__label">NA</span></label>
                                        
                                    <?php elseif($question->answer == null): ?>
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>">
                                        <input value="1" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('yes_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">                                
                                        <span class="mdl-radio__label">Yes</span></label>
                                        
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>">
                                        <input value="2" class="mdl-radio__button saveonchange expand"    large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('no_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')">
                                        <span class="mdl-radio__label">No</span></label>
                                        
                                        <label class="mdl-radio mdl-radio--large mdl-js-radio mdl-js-ripple-effect" for="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>">
                                        <input value="3" class="mdl-radio__button saveonchange" large="1" name="<?php echo e($question->id); ?>" type="radio" id="<?php echo e('na_'.$question->type_id.'_'.$question->id); ?>" onClick="checkInfo(value, '<?php echo e($question->type_id.'_'.$question->id); ?>')" >
                                        <span class="mdl-radio__label">NA</span></label>
                                    <?php endif; ?>        
                                </div>

                    <div class="mdl-cell mdl-cell--12-col field-row mdl-zebra__desktop mdl-zebra__phone"
                        data-expand="<?php echo e($question->id); ?>">
                        <i class="material-icons error"
                            data-for="<?php echo e($question->id); ?>_description">fiber_manual_record</i>
                        <div
                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group">
                            <textarea class="mdl-textfield__input saveonchange" type="text"
                                name="<?php echo e($question->id); ?>_description" value=""
                                id="<?php echo e($question->id); ?>_description"></textarea>
                            <label class="mdl-textfield__label"
                                for="<?php echo e($question->id); ?>_description"><?php echo e($question->en_description); ?></label>

                            <div class="pictureswipe_wrap tab_media" style="padding-right: 20px;" itemscope
                                itemtype="http://schema.org/ImageGallery">
                                <div class="field-gallery-container <?php echo e($question->id); ?>_description"
                                    data-for="<?php echo e($question->id); ?>_description"
                                    style="padding-right: 20px;">
                                    <!-- <span id="deleteIcon"> <i class="material-icons field-gallery-icon" style="z-index:999999999;color:red !important;float: right" onclick="delete_media(this.id)" id="' + field_name + '">delete_forever</i></span> -->
                                    <!-- <i class="material-icons" style="color:red !important;float: right;" onclick="delete_media(this.id)">delete</i> -->
                                </div>
                            </div>
                        </div>
                        <button
                            class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored add_quality_control_media"
                            data-field="<?php echo e($question->id); ?>" onBlur="setFieldname(this.name)"
                            name="<?php echo e($question->id); ?>_description"
                            onclick="$('#add_media_btn').click()">
                            <i class="material-icons">photo_camera</i></button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="mdl-cell mdl-cell--12-col" id="question_next" 
                <?php if($badge_count[0]->count == 12) echo 'style="display: block"'; else echo 'style="display: none"'; ?>>
                    <button
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored next-tab"
                        data-tab-next="complete">Next<i
                            class="material-icons">navigate_next</i></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        questionBadge(<?php echo $badge_count[0]->count?>);
                        function checkInfo(info,id){
                            if(info == 1){
                                document.getElementById('radio_id_no_'+id).style.display = 'none';
                                document.getElementById('radio_id_yes_'+id).style.display = 'block';
                                document.getElementById('radio_id_close_'+id).style.display = 'none';
                            }
                            else if(info == 3){
                                document.getElementById('radio_id_no_'+id).style.display = 'none';
                                document.getElementById('radio_id_yes_'+id).style.display = 'block';
                                document.getElementById('radio_id_close_'+id).style.display = 'none';
                            }
                            else if(info == 2){
                                document.getElementById('radio_id_no_'+id).style.display = 'none';
                                document.getElementById('radio_id_yes_'+id).style.display = 'none';
                                document.getElementById('radio_id_close_'+id).style.display = 'block';
                            }
                        }
                        function questionBadge(badge_count) {
                            var count = 12 - badge_count;
                            if (count > 0) {
                                $("#question_badge").html("<span class='mdl-badge' id='question_badge' data-badge='" +
                                    count + "'></span>");
                            } else $("#question_badge").html("<span></span>");
                        }
                        if (count > 0) {
                            $("#question_badge").html("<span class='mdl-badge' id='question_badge' data-badge='" + count +
                                "'></span>");
                        } else $("#question_badge").html("<span></span>");

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
            var technical_inspection = $(':radio[name="33_5f1ad85a13204"]:not(:checked)').length -2;
            var count = 8;
            if (technical_inspection == 1) {
                $("#technical_inspection").html(
                    "<i class='material-icons error'>fiber_manual_record</i>");
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


                            <div class="mdl-cell mdl-cell--12-col"><button id="completeQualityControl" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored"  onclick="complete_quality()">Complete quality control</button></div>
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
                        display: ;
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
            <div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
	<div class="mdl-snackbar__text" id="errordiv"></div>
	<button class="mdl-snackbar__action" type="button"></button>
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
    <?php 
        $question_arr = array();
        foreach($questions as $question){
            $temp = [];
            $temp = $question->id;

            array_push($question_arr, $temp);
        }
        $question_arr1 = implode(',', $question_arr);
    

        ?>

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

    function complete_quality()
    {
        //alert(quality_control_id);
        $.post('/quality_control/complete', {
                '_token': '<?php echo e(csrf_token()); ?>',
                'quality_control_id': quality_control_id.value
               
            }, function(success) {
                console.log(success);
                if(success.redirect){

                    window.location.href = '/quality_control?tab=quality_control_history';
                }
    }
        )}
        //var quality_control_id = 40519;
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
            var question_ids = "[<?php echo e($question_arr1); ?>]";
                // alert("someting" + question_ids);

            var el = e.target;
            var $this = $(el);
            if (e.type === 'change' && $this.attr('type') !== 'radio' && $this.attr('type') !== 'checkbox' && $this.prop('type') !== 'select-one' && $this.prop('type') !== 'select-multiple') {
                return false;
            }
            var long = ($this.attr('type') !== 'radio' && $this.attr('type') !== 'checkbox');
            var field = $this.attr('name');
            var value = $this.attr('type') !== 'checkbox' ? $this.val() : ($this.prop('checked') ? 1 : 0)
            var quality_control_id = $('#quality_control_id').val();


            console.log("FIELD : " + field);
                console.log("VALUE : " + value);


                $.post('/quality_control/saveChanges', {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'quality_control_id': quality_control_id,
                    'value': value,
                    'question_ids': question_ids,
                    'type': field
                }, function(success) {
                    console.log(success);
                    questionBadge(success.badge_count);
                    if(success.badge_count == 12){
                        document.getElementById('question_next').style.display = 'block';
                    }
                    if (success.redirect) {
                        $('#quality_control_id').val(success.id);
                        document.getElementById('wo-title').innerHTML = value;
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
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/QualityControl/EditPanels.blade.php ENDPATH**/ ?>