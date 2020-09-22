<?php $__env->startSection('content'); ?>


<header class="mdl-layout__header">
<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;

}
.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.imgalign{
    height:55px;
    width:55px;
    height: 55px;
    width: 55px;
    border-radius: 28px;
    margin: 3px;
    float: right;
}
.deleteicon {
    color: red !important;
    float: right;
   
    margin-top: 51px;
    margin-right: -78px;
}
</style>

    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="<?php echo e(url('/diagnosis')); ?>" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a> <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="wo-title">
            <?php if ($diagnosis) {
                                echo $diagnosis[0]->wo_number;
                            } else {
                                echo 'New Diagnosis';
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
        <a href="#findings_panel" class="mdl-layout__tab">Findings
            <span class='mdl-badge' id='Findings_badge'></span>
        </a>
        <a href="#activities_panel" class="mdl-layout__tab">Collect data
            <span class='mdl-badge' id='activities_panel_badge'></span>
        </a>
        <a href="#follow_up_panel" class="mdl-layout__tab">Diagnostic steps</a>
        <a href="#analysis_panel" class="mdl-layout__tab">Complete
            <span class='mdl-badge' id='analysis_panel_badge'></span>
        </a>
        <a href="#media_panel" class="mdl-layout__tab">Media</a>
        <a href="#extra_panel" class="mdl-layout__tab">Extra
            <span class='mdl-badge' id='extra_panel_badge'></span>
        </a>
        <a href="#complete_panel" class="mdl-layout__tab">Close
            <span class='mdl-badge' id='complete_panel_badge'></span>
        </a>
    </div>
</header>


<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
            <?php echo $__env->make('Diagnosis.EditTabs.Id', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Findings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Activities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Analysis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Follow_up', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Extra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Diagnosis.EditTabs.Complete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <input type="hidden" name="csrf_token" value="">
        <div id="toast-message" class="mdl-js-snackbar mdl-snackbar">
	<div class="mdl-snackbar_text" id="errordiv"></div>
	<button class="mdl-snackbar__action" type="button"></button>
</div>
     
    </div>
    <!-- Media Upload Button - Class SET to Active based on Inputs where Images are Required and Image is Saved with input name -->
    <input type="file" id="add_media_btn" name="add_media_btn" style="display: none;" class="form-control" multiple>
    <button id="add-media-to-field" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn" onclick="$('#add_media_btn').click()">
        <i class="material-icons">photo_camera</i>
        <label>Add media</label>
    </button>

    <div style="display: none;">

        <a class="btn btn-upload" title="Accepts: gif,jpeg,png,bmp,doc,xls,ppt,pdf,mpg,wmv,avi,mkv,mp4,mp3,zip,rar" href="javascript:void(0);" id="upload_file_bug">
            <i class="fa fa-upload"></i>
            Upload
            <div class="upload-form button-upload button">
                <input type="file" name="file" multiple onchange="readURL(this);">
            </div>
        </a>
    </div>
    

    <script>
        $("document").ready(function() {
            $("body").trigger('click');
        });
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

    <script>
        //script for finding current field name
        var file_fieldname;

        function setFieldname(id) {
            file_fieldname = id;
            //alert("Selected Field : " + file_fieldname);
            readImage();
        }
    </script>

    <style>
        .radio-icon {
            margin-top: -10px !important;
            margin-right: 0px !important;
        }
    </style>

    <script>
        //script for previewing image for Current Seclected Field
        $(document).ready(function() {
            document.getElementById('add_media_btn').addEventListener('change', readImage, false);

            $(".field-gallery-container").sortable();

            $(document).on('click', '.image-cancel', function() {
                let no = $(this).data('no');
                $(".preview-image.preview-show-" + no).remove();
            });
        });
        var num = 0;
        var media_images = [];
        var img_names = [];


        function readImage() {

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

                    alert("Image Previewing in : " + field_name);
                    var file_name = files[i].name
                    img_names.push(file_name)
                    var file = files[i];
                    if (!file.type.match('image')) continue;
                    var picReader = new FileReader();
                    picReader.addEventListener('load', function(event) {
                        var picFile = event.target;
                        console.log('picFile.result', picFile.result)
                        media_images.push(picFile.result);
                        var html =
                            '<div class="field-gallery-item" style="background-image: url(' + picFile.result + ')" onclick="setFieldname(this.id)" id="' + field_name + '">' +
                            '<i class="material-icons field-gallery-icon" style="z-index:999999999" onclick="delete_media(this.id)" id="' + field_name + '">delete_forever</i>' +
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
        var initPhotoSwipeFromDOM = function(gallerySelector) {

            // parse slide data (url, title, size ...) from DOM elements
            // (children of gallerySelector)
            var parseThumbnailElements = function(el) {
                var thumbElements = el.childNodes,
                    numNodes = thumbElements.length,
                    items = [],
                    figureEl,
                    linkEl,
                    size,
                    item;

                for (var i = 0; i < numNodes; i++) {

                    figureEl = thumbElements[i]; // <figure> element

                    // include only element nodes
                    if (figureEl.nodeType !== 1) {
                        continue;
                    }

                    linkEl = figureEl.children[0]; // <a> element

                    size = linkEl.getAttribute('data-size').split('x');

                    // create slide object
                    item = {
                        src: linkEl.getAttribute('href'),
                        w: parseInt(size[0], 10),
                        h: parseInt(size[1], 10)
                    };



                    if (figureEl.children.length > 1) {
                        // <figcaption> content
                        item.title = figureEl.children[1].innerHTML;
                    }

                    if (linkEl.children.length > 0) {
                        // <img> thumbnail element, retrieving thumbnail url
                        item.msrc = linkEl.children[0].getAttribute('src');
                    }

                    item.el = figureEl; // save link to element for getThumbBoundsFn
                    items.push(item);
                }

                return items;
            };

            // find nearest parent element
            var closest = function closest(el, fn) {
                return el && (fn(el) ? el : closest(el.parentNode, fn));
            };

            // triggers when user clicks on thumbnail
            var onThumbnailsClick = function(e) {
                e = e || window.event;
                e.preventDefault ? e.preventDefault() : e.returnValue = false;

                var eTarget = e.target || e.srcElement;

                // find root element of slide
                var clickedListItem = closest(eTarget, function(el) {
                    return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
                });

                if (!clickedListItem) {
                    return;
                }

                // find index of clicked item by looping through all child nodes
                // alternatively, you may define index via data- attribute
                var clickedGallery = clickedListItem.parentNode,
                    childNodes = clickedListItem.parentNode.childNodes,
                    numChildNodes = childNodes.length,
                    nodeIndex = 0,
                    index;

                for (var i = 0; i < numChildNodes; i++) {
                    if (childNodes[i].nodeType !== 1) {
                        continue;
                    }

                    if (childNodes[i] === clickedListItem) {
                        index = nodeIndex;
                        break;
                    }
                    nodeIndex++;
                }



                if (index >= 0) {
                    // open PhotoSwipe if valid index found
                    openPhotoSwipe(index, clickedGallery);
                }
                return false;
            };

            // parse picture index and gallery index from URL (#&pid=1&gid=2)
            var photoswipeParseHash = function() {
                var hash = window.location.hash.substring(1),
                    params = {};

                if (hash.length < 5) {
                    return params;
                }

                var vars = hash.split('&');
                for (var i = 0; i < vars.length; i++) {
                    if (!vars[i]) {
                        continue;
                    }
                    var pair = vars[i].split('=');
                    if (pair.length < 2) {
                        continue;
                    }
                    params[pair[0]] = pair[1];
                }

                if (params.gid) {
                    params.gid = parseInt(params.gid, 10);
                }

                return params;
            };

            var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                var pswpElement = document.querySelectorAll('.pswp')[0],
                    gallery,
                    options,
                    items;

                items = parseThumbnailElements(galleryElement);

                // define options (if needed)
                options = {

                    // define gallery index (for URL)
                    galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                    getThumbBoundsFn: function(index) {
                        // See Options -> getThumbBoundsFn section of documentation for more info
                        var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                            pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                            rect = thumbnail.getBoundingClientRect();

                        return {
                            x: rect.left,
                            y: rect.top + pageYScroll,
                            w: rect.width
                        };
                    }

                };

                // PhotoSwipe opened from URL
                if (fromURL) {
                    if (options.galleryPIDs) {
                        // parse real index when custom PIDs are used
                        // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                        for (var j = 0; j < items.length; j++) {
                            if (items[j].pid == index) {
                                options.index = j;
                                break;
                            }
                        }
                    } else {
                        // in URL indexes start from 1
                        options.index = parseInt(index, 10) - 1;
                    }
                } else {
                    options.index = parseInt(index, 10);
                }

                // exit if index not found
                if (isNaN(options.index)) {
                    return;
                }

                if (disableAnimation) {
                    options.showAnimationDuration = 0;
                }

                // Pass data to PhotoSwipe and initialize it
                gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                gallery.init();
            };

            // loop through all gallery elements and bind events
            var galleryElements = document.querySelectorAll(gallerySelector);

            for (var i = 0, l = galleryElements.length; i < l; i++) {
                galleryElements[i].setAttribute('data-pswp-uid', i + 1);
                galleryElements[i].onclick = onThumbnailsClick;
            }

            // Parse URL and open gallery if it contains #&pid=3&gid=1
            var hashData = photoswipeParseHash();
            if (hashData.pid && hashData.gid) {
                openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
            }
        };

        // execute above function
        initPhotoSwipeFromDOM('.pictureswipe_wrap');
    </script>


    <script>
        $('#add-media-to-field').click(function() {
            var form = $('#upload_file_all').find('.upload-form');
            var data = form.fileupload('option', 'formData');
            data.object_type = 'diagnosis';
            data.object_id = 601;
            data.field = current_field;
            form.fileupload('option', 'formData', data).find('input[type=file]').click();
        });
    </script>
    <!-- Add media Scripts -->
    <script>
        $('body').one('TweenAnimationDone', function() {
            var diagnosis_id = 601;
            var addMediaTimer = null;

            currentContainer.find('.add_media').focus(function() {
                if (addMediaTimer) {
                    clearTimeout(addMediaTimer);
                }
                current_field = $(this).attr('name');
                $('#add-media-to-field').addClass('active');
            }).blur(function() {
                addMediaTimer = setTimeout(function() {
                    current_field = null;
                    $('#add-media-to-field').removeClass('active');
                }, 500);
            });
        });


        /* Native Code for FileUpload
        function allUploadCallback(event, data) {
            if (event === 'start') {
                system.showLoading();
            } else if (event === 'always' && typeof data.result !== 'undefined' && data.result.success) {
                system.hideLoading();
                if (typeof data.result.pictures === 'undefined') {
                    alert("Saving the file failed because the location is unknown");
                } else {
                    for (var i = 0; i < data.result.pictures.length; i++) {
                        appendToGallery(data.result.pictures[i]);
                        appendToMediaGallery(data.result.pictures[i]);
                        current_field = data.result.pictures[i]['field'];
                    }
                    if (typeof window.handlePlaceholder === 'function') {
                        handlePlaceholder();
                    }
                    $('input[name="' + current_field + '"]').focus();
                    if ((current_field === 'mileage_start' || current_field === 'mileage_end') && data.result.hasOwnProperty('check') && data.result.check) {
                        $('i[data-for="' + current_field + '"]').removeClass('error').html('check');
                    } else if ((current_field === 'mileage_start' || current_field === 'mileage_end') && data.result.hasOwnProperty('check')) {
                        $('i[data-for="' + current_field + '"]').addClass('error').html('fiber_manual_record');
                    } else if (current_field === 'followup__test-intake' && data.result.hasOwnProperty('check')) {
                        if (data.result.check) {
                            $('i[data-for="intake_protocol"]').removeClass('error').html('check');
                        } else {
                            $('i[data-for="intake_protocol"]').addClass('error').html('fiber_manual_record');
                        }
                    } else if (current_field === 'followup__test-exit' && data.result.hasOwnProperty('check')) {
                        if (data.result.check) {
                            $('i[data-for="exit_protocol"]').removeClass('error').html('check');
                        } else {
                            $('i[data-for="exit_protocol"]').addClass('error').html('fiber_manual_record');
                        }
                    } else if (current_field === 'followup__test' && data.result.hasOwnProperty('check')) {
                        if (data.result.check) {
                            $('i[data-for="exit_protocol"]').removeClass('error').html('check');
                        } else {
                            $('i[data-for="exit_protocol"]').addClass('error').html('fiber_manual_record');
                        }
                    }
                    setDiagnosisId(data.result.object_id);
                    if (data.result.hasOwnProperty('badges')) {
                        for (var tab in data.result.badges) {
                            if (data.result.badges.hasOwnProperty(tab)) {
                                if (data.result.badges[tab] > 0) {
                                    $('.next-tab[data-tab-current="' + tab + '"]').addClass('inactive');
                                    $('#' + tab + '_badge').attr('data-badge', data.result.badges[tab]);
                                } else {
                                    $('.next-tab[data-tab-current="' + tab + '"]').removeClass('inactive');
                                    $('#' + tab + '_badge').removeAttr('data-badge');
                                }
                            }
                        }
                    }
                    if (data.result.hasOwnProperty('complete') && data.result.complete) {
                        $('#completeDiagnosis').addClass('fields_complete');
                        $('.signature_blocker').removeClass('active');
                    } else {
                        $('#completeDiagnosis').removeClass('fields_complete');
                        $('.signature_blocker').addClass('active');
                    }
                    if (data.result.hasOwnProperty('size')) {
                        $('#total_file_size').val(data.result.size);
                    }
                    $('dialog').find('button.save').attr('disabled', false);
                }
            } else if (event === 'always' && typeof data.result !== 'undefined' && typeof data.result.error !== 'undefined') {
                system.hideLoading();
                alert("Saving file failed:" + ' ' + data.result.message);
            } else if (event === 'always') {
                system.hideLoading();
                alert("Something went wrong");
            }
        }  */
    </script>
<div  class="modal-window">
    <dialog id="modal__confirm" class="mdl-dialog" open="">
		<h4 class="mdl-dialog__title">Copy diagnosis</h4>
		<div class="mdl-dialog__content">The diagnosis has been copied succesfully.<br><b>Note:</b> You are now working in the newly copied diagnosis.</div>
		<div class="mdl-dialog__actions"><a aria-disabled="false" role="button" data-dismiss="ok" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored" data-upgraded=",MaterialButton">Ok</a></div>
		<div class="mdl-dialog__loading"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded" data-upgraded=",MaterialSpinner"><div class="mdl-spinner__layer mdl-spinner__layer-1"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-2"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-3"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div><div class="mdl-spinner__layer mdl-spinner__layer-4"><div class="mdl-spinner__circle-clipper mdl-spinner__left"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__gap-patch"><div class="mdl-spinner__circle"></div></div><div class="mdl-spinner__circle-clipper mdl-spinner__right"><div class="mdl-spinner__circle"></div></div></div></div></div>
	</dialog>
    </div>


    <!-- Modals Starts Here -->
    <div id="modal-cpydiagnosis" class="modal-window">
        <div>
            <h1>Copy Diagnosis</h1>
            <div>Take over test drives?
                <span style="float: right;">
                    <label for="include_drives_5f1fb099464ae">
                        <input value="1" name="include_drives" type="radio" checked="checked" class="theme-checkbox" id="include_drives_5f1fb099464ae">
                        <span class="mdl-radio__label">Yes</span>
                    </label>
                    <label for="include_drives_5f1fb099464f2">
                        <input value="0" name="include_drives" type="radio" class="theme-checkbox" id="include_drives_5f1fb099464f2">
                        <span class="mdl-radio__label">No</span>
                    </label>
                </span><br><br>
                Take over short tests?
                <span style="float: right;">
                    <label for="include_test_5f1fb09946423">
                        <input value="1" name="include_test" type="radio" checked="checked" class="theme-checkbox" id="">
                        <span>Yes</span>
                    </label>
                    <label for="include_test_5f1fb0994646a">
                        <input value="0" name="include_test" type="radio" class="theme-checkbox" id="">
                        <span>No</span>
                    </label>
                </span>
            </div>
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored"   onclick="copy_diag()">Copy</a>
            </div>
        </div>
    </div>

    <!-- Modals UIR Starts Here -->
    <div id="modal-uir" class="modal-window">
        <div>
            <div id="sliding-button-container">
                <button onclick="javascript:location.href='#modal-uir-voltage'" id="current" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">Voltage measurement</button> <br><br>
                <button onclick="javascript:location.href='#modal-uir-voltageload'" id="current_load" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">Voltage measurement with load</button> <br><br>
                <button onclick="javascript:location.href='#modal-uir-resistance'" id="resistance" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">Resistance measurement</button> <br><br>
                <button onclick="javascript:location.href='#modal-uir-current'" id="power" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">Current measurement(A)</button> <br><br>
                <button onclick="javascript:location.href='#modal-uir-scope'" id="scope" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">Scope measurement</button> <br><br>
                <button onclick="javascript:location.href='#modal-uir-battery'" id="battery" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">12v Battery test</button> <br><br>
                <button onclick="javascript:location.href='#modal-uir-xentrybattery'" id="xentry_battery" type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored fullwidth">12v Battery XENTRY test</button>
            </div>

            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Copy</a>
            </div>
        </div>
    </div>

    <div id="modal-uir-voltage" class="modal-window">
        <div>
            <div class="current_field">
                <input type="hidden" name="description[]" value="Voltage measured on/between: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Voltage measured on/between</label>
                </div>
                <div class="left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <input type="text" name="value" value="" id="value" class="mdl-textfield__input">
                        <label class="mdl-textfield__label" for="value">Voltage (V)</label>
                    </div>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input class="mdl-textfield__input time" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="time" value="" id="time">
                    <label class="mdl-textfield__label" for="time">Spent time in minutes (optional)</label>
                    <span class="mdl-textfield__error">Please enter a numeric value</span>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="VoltageloadFile(event)" />
               </div>
               <div id="Voltageimagediv">
               <img id="Voltageoutput" class="imgalign" />
            </div>
            <div id="VoltagedeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>
            </div>

            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <div id="modal-uir-voltageload" class="modal-window">
        <div>
            <div class="current_load_field">
                <input type="hidden" name="description[]" value="Loaded voltage measured on/between: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Loaded voltage measured on/between</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="value" value="" id="value" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="value">Voltage (V)</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input class="mdl-textfield__input time" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="time" value="" id="time">
                    <label class="mdl-textfield__label" for="time">Spent time in minutes (optional)</label>
                    <span class="mdl-textfield__error">Please enter a numeric value</span>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                </div>
                <div class="upload-btn-wrapper">	
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">	
                <i class="material-icons">photo_camera</i>	
                <label>Add media</label>	
                </button>	
               <input type="file" name="myfile"   onchange="VoltageMeasureloadFile(event)" />	
               </div>	
               <div id="VoltageMeasureimagediv">	
               <img id="VoltageMeasureoutput" class="imgalign" />	
            </div>	
            <div id="VoltageMeasuredeleteIcondiv">	
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>	
            </div>	
            </div>

            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <div id="modal-uir-resistance" class="modal-window">
        <div>
            <div class="resistance_field">
                <input type="hidden" name="description[]" value="Resistance measured on/between: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Resistance measured on/between</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="value" value="" id="value" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="value">Resistance (Ohm)</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input class="mdl-textfield__input time" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="time" value="" id="time">
                    <label class="mdl-textfield__label" for="time">Spent time in minutes (optional)</label>
                    <span class="mdl-textfield__error">Please enter a numeric value</span>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="ResistanceloadFile(event)" />
               </div>
               <div id="Resistanceimagediv">
               <img id="Resistanceoutput" class="imgalign" />
            </div>
            <div id="ResistancedeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>
            </div>

            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <div id="modal-uir-current" class="modal-window">
        <div>
            <div class="power_field">
                <input type="hidden" name="description[]" value="Current measured on/between: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Current measured on/between</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="value" value="" id="value" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="value">Current (A)</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input class="mdl-textfield__input time" type="number" name="time" value="" id="time">
                    <label class="mdl-textfield__label" for="time">Spent time in minutes (optional)</label>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="CurrentloadFile(event)" />
               </div>
               <div id="Currentimagediv">
               <img id="Currentoutput" class="imgalign" />
            </div>
            <div id="CurrentdeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>
            </div>

            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>


    <div id="modal-uir-scope" class="modal-window">
        <div>
            <div class="scope_field">
                <input type="hidden" name="description[]" value="Scope measured on/between: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Scope measured on/between</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="value" value="" id="value" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="value">Conclusion scope measurement</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input class="mdl-textfield__input time" type="number" name="time" value="" id="time">
                    <label class="mdl-textfield__label" for="time">Spent time in minutes (optional)</label>
                    <span class="mdl-textfield__error">Please enter a numeric value</span>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="ScopeloadFile(event)" />
               </div>
               <div id="Scopeimagediv">
               <img id="Scopeoutput" class="imgalign" />
            </div>
            <div id="ScopedeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>
            </div>
            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <div id="modal-uir-battery" class="modal-window">
        <div>
            <div class="battery_field">
                <input type="hidden" name="description[]" value="12V Battery test: Pole stamp: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Pole stamp</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="value" value="" id="value" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="value">Battery part number</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="info" value="" id="info" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="info">Testcode</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                    <input class="mdl-textfield__input time" pattern="-?[0-9]*(\.[0-9]+)?" type="number" name="time" value="" id="time">
                    <label class="mdl-textfield__label" for="time">Spent time in minutes (optional)</label>
                    <span class="mdl-textfield__error">Please enter a numeric value</span>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                    <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="PoleloadFile(event)" />
               </div>
               <div id="Poleimagediv">
               <img id="Poleoutput" class="imgalign" />
            </div>
            <div id="PoledeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>
            </div>


            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <div id="modal-uir-xentrybattery" class="modal-window">
        <div>
            <div class="xentry_battery_field">
                <input type="hidden" name="description[]" value="Battery test executed with XENTRY with result: ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded">
                    <input type="text" name="description[]" value="" id="description" class="mdl-textfield__input">
                    <label class="mdl-textfield__label" for="description">Battery test executed with XENTRY with result</label>
                </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="BatteryloadFile(event)" />
               </div>
               <div id="Batteryimagediv">
               <img id="Batteryoutput" class="imgalign" />
            </div>
            <div id="BatterydeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>
            </div>

            <div class="modal-footer">
                <a href="#modal-uir" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                    <i id="dialog-uir-back" class="material-icons" style="display: inline;">arrow_back</i>
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>


    <!-- Modals Starts Here -->
    <div id="modal-testdrive" class="modal-window full">
        <div class="modal-content">
            <h1>Test Drive</h1>
            <div class="mdl-grid mdl-grid--with-padding">
                <div class="mdl-cell mdl-cell--4-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group">
                        <label class="mdl-textfield__label" for="">Starting Mileage</label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" rows="1" type="number" name="" value="0" id="" class="mdl-textfield__input">
                        <span class="mdl-textfield__error">Please enter a numeric value</span>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="test_drive-mileage_start">Results</label>
                        <textarea rows="1" type="text" name="test_drive-description_start" value="" id="test_drive-description_start" class="mdl-textfield__input"></textarea>
                    </div>
                </div>
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125531.64654572813!2d76.15320974299863!3d10.511379921135672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7ee15ed42d1bb%3A0x82e45aa016ca7db!2sThrissur%2C%20Kerala!5e0!3m2!1sen!2sin!4v1595915608128!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" width="100%" tabindex="0"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Start Test Drive</a>
            </div>
        </div>
    </div>
    <!-- Modals Starts Here -->
    <div id="modal-visualcheck" class="modal-window">
        <div class="modal-content">
            <h1>Visual Check</h1>
            <div class="">
                <form id="visual" action="/follow_up/save" method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">The following parts have been checked visually</label>
                        <textarea rows="1" type="text" name="" value="" id="" class="mdl-textfield__input"></textarea>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group">
                        <label class="mdl-textfield__label" for="">Spend time in Minutes (optional)</label>
                        <input rows="1" type="number" name="" value="" id="" class="mdl-textfield__input">
                        <span class="mdl-textfield__error">Please enter a numeric value</span>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                    </div>
                </form>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="loadFile(event)" />
               </div>
               <div id="imagediv">
               <img id="output" class="imgalign" />
            </div>
            <div id="deleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <!-- Modals Starts Here -->
    <div id="modal-shorttest" class="modal-window">
        <div class="modal-content">
            <div class="">
                <form id="visual" action="" method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">Description</label>
                        <textarea rows="1" type="text" name="" value="" id="" class="mdl-textfield__input">Test</textarea>
                    </div>
                </form>

                <div class="upload-btn-wrapper">
               <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="DescritionloadFile(event)" />
               </div>
               <div id="Descritionimagediv">
               <img id="Descritionoutput" class="imgalign" />
              
            </div>
            <div id="DescritiondeleteIcondiv">
            
            <!-- <i class="material-icons" style="color:red !important" onClick="deleteImage()">delete</i> -->
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>

            </div>
            <div class="modal-footer">
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect cancel" href="#">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>


    <!-- Modals Starts Here -->
    <div id="modal-text" class="modal-window">
        <div class="modal-content">
            <div class="">
                <form id="visual" action="/follow_up/save" method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">Text</label>
                        <textarea rows="1" type="text" name="" value="" id="" class="mdl-textfield__input"></textarea>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group">
                        <label class="mdl-textfield__label" for="">Spend time in Minutes (optional)</label>
                        <input type="number" name="" value="" id="" class="mdl-textfield__input">
                        <span class="mdl-textfield__error">Please enter a numeric value</span>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                    </div>
                </form>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="TextloadFile(event)" />
               </div>
               <div id="Textimagediv">
               <img id="Textoutput" class="imgalign" />
            </div>
            <div id="TextdeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <!-- Modals Starts Here -->
    <div id="modal-extratips" class="modal-window">
        <div class="modal-content">
            <div class="">
                <form id="visual" action="" method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">TIPS Document Number</label>
                        <input type="text" name="" value="" id="" class="mdl-textfield__input">
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">Version</label>
                        <input type="number" name="" value="" id="" class="mdl-textfield__input">
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">Comments</label>
                        <textarea rows="1" type="text" name="" value="" id="" class="mdl-textfield__input"></textarea>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group">
                        <label class="mdl-textfield__label" for="">Spend time in Minutes (optional)</label>
                        <input type="number" name="" value="" id="" class="mdl-textfield__input">
                        <span class="mdl-textfield__error">Please enter a numeric value</span>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                    </div>
                </form>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="TipsloadFile(event)" />
               </div>
               <div id="Tipsimagediv">
               <img id="Tipsoutput" class="imgalign" />
            </div>
            <div id="TipsdeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <!-- Modals Starts Here -->
    <div id="modal-wis" class="modal-window">
        <div class="modal-content">
            <div class="">
                <form id="visual" action="" method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                        <label class="mdl-textfield__label" for="">WIS Document Number</label>
                        <input type="text" name="" value="" id="" class="mdl-textfield__input">
                    </div>
                    <div class="mdl-cell mdl-cell--8-col">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group is-upgraded is-dirty">
                            <label class="mdl-textfield__label" for="value">Document date</label>

                            <input type="date" name="value" style="background: #eee; border:none !important; padding: 10px; color: #222; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group">
                        <label class="mdl-textfield__label" for="">Spend time in Minutes (optional)</label>
                        <input rows="1" type="number" name="" value="" id="" class="mdl-textfield__input">
                        <span class="mdl-textfield__error">Please enter a numeric value</span>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__remove">remove</i>
                        <i class="material-icons mdl-numberspinner mdl-numberspinner__add">add</i>
                    </div>
                </form>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="WisloadFile(event)" />
               </div>
               <div id="Wisimagediv">
               <img id="Wisoutput" class="imgalign" />
            </div>
            <div id="WisdeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>

            </div>
            
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>

    <!-- Modals Starts Here -->
    <div id="modal-tipscase" class="modal-window">
        <div class="modal-content">
            <div class="">
                <div class="mdl-grid mdl-grid--no-spacing">
                    <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--3-col-phone">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                            <label class="mdl-textfield__label" for="">Customer Complaints</label>
                            <textarea rows="4" type="text" name="" value="" id="" class="mdl-textfield__input"></textarea>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored copy" data-copy="copy_complaint" data-upgraded=",MaterialButton">
                            <i class="material-icons">content_copy</i>
                        </button>
                    </div>
                    <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                            <label class="mdl-textfield__label" for="">Findings</label>
                            <textarea rows="4" type="text" name="" value="" id="" class="mdl-textfield__input"></textarea>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored copy" data-copy="copy_findings" data-upgraded=",MaterialButton">
                            <i class="material-icons">content_copy</i>
                        </button>
                    </div>
                    <div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fullwidth form-group">
                            <label class="mdl-textfield__label" for="">Collect Data</label>
                            <textarea rows="4" type="text" name="" value="" id="" class="mdl-textfield__input"></textarea>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored copy" data-copy="copy_activities" data-upgraded=",MaterialButton">
                            <i class="material-icons">content_copy</i>
                        </button>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group">
                        <label class="mdl-textfield__label" for="">Tips Case registered with Number</label>
                        <input type="number" name="" value="" id="" class="mdl-textfield__input">
                    </div>
                     </div>
                <div class="upload-btn-wrapper">
                 <button type="button"  class="mdl-button mdl-button--raised mdl-button--colored fullwidth"  style="margin-top:20px;">
                <i class="material-icons">photo_camera</i>
                <label>Add media</label>
                </button>
               <input type="file" name="myfile"   onchange="CustomerloadFile(event)" />
               </div>
               <div id="Customerimagediv">
               <img id="Customeroutput" class="imgalign" />
            </div>
            <div id="CustomerdeleteIcondiv">
            <span class="deleteicon" > <i class="material-icons field-gallery-icon" style="color:red !important" onClick="deleteImage()">delete_forever</i></span>
            </div>

          
            <div class="modal-footer">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">Save</a>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    document.getElementById("deleteIcondiv").style.display = "none";
document.getElementById("imagediv").style.display = "none";
document.getElementById("Descritionimagediv").style.display = "none";
document.getElementById("DescritiondeleteIcondiv").style.display = "none";
document.getElementById("TextdeleteIcondiv").style.display = "none";
document.getElementById("Textimagediv").style.display = "none";
document.getElementById("WisdeleteIcondiv").style.display = "none";
document.getElementById("Wisimagediv").style.display = "none";
document.getElementById("TipsdeleteIcondiv").style.display = "none";
document.getElementById("Tipsimagediv").style.display = "none";
document.getElementById("CustomerdeleteIcondiv").style.display = "none";
document.getElementById("Customerimagediv").style.display = "none";

document.getElementById("VoltagedeleteIcondiv").style.display = "none";
document.getElementById("Voltageimagediv").style.display = "none";

document.getElementById("VoltageMeasuredeleteIcondiv").style.display = "none";
document.getElementById("VoltageMeasureimagediv").style.display = "none";

document.getElementById("ResistancedeleteIcondiv").style.display = "none";
document.getElementById("Resistanceimagediv").style.display = "none";

document.getElementById("CurrentdeleteIcondiv").style.display = "none";
document.getElementById("Currentimagediv").style.display = "none";

document.getElementById("ScopedeleteIcondiv").style.display = "none";
document.getElementById("Scopeimagediv").style.display = "none";

document.getElementById("BatterydeleteIcondiv").style.display = "none";
document.getElementById("Batteryimagediv").style.display = "none";

document.getElementById("PoledeleteIcondiv").style.display = "none";
document.getElementById("Poleimagediv").style.display = "none";








var DescritionloadFile = function(event) {
var image = document.getElementById('Descritionoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Descritionimagediv").style.display = "block";
document.getElementById("DescritiondeleteIcondiv").style.display = "block";
}
var TextloadFile = function(event) {
var image = document.getElementById('Textoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Textimagediv").style.display = "block";
document.getElementById("TextdeleteIcondiv").style.display = "block";
}
var WisloadFile = function(event) {
var image = document.getElementById('Wisoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Wisimagediv").style.display = "block";
document.getElementById("WisdeleteIcondiv").style.display = "block";
}
var TipsloadFile = function(event) {
    
var image = document.getElementById('Tipsoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("TipsdeleteIcondiv").style.display = "block";
document.getElementById("Tipsimagediv").style.display = "block";
}

var CustomerloadFile = function(event) {
var image = document.getElementById('Customeroutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Customerimagediv").style.display = "block";
document.getElementById("CustomerdeleteIcondiv").style.display = "block";
}
var VoltageloadFile = function(event) {
var image = document.getElementById('Voltageoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Voltageimagediv").style.display = "block";
document.getElementById("VoltagedeleteIcondiv").style.display = "block";
}
var VoltageMeasureloadFile = function(event) {
var image = document.getElementById('VoltageMeasureoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("VoltageMeasureimagediv").style.display = "block";
document.getElementById("VoltageMeasuredeleteIcondiv").style.display = "block";
}

var ResistanceloadFile = function(event) {
var image = document.getElementById('Resistanceoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Resistanceimagediv").style.display = "block";
document.getElementById("ResistancedeleteIcondiv").style.display = "block";
}

var CurrentloadFile = function(event) {
var image = document.getElementById('Currentoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Currentimagediv").style.display = "block";
document.getElementById("CurrentdeleteIcondiv").style.display = "block";
}

var ScopeloadFile = function(event) {
var image = document.getElementById('Scopeoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Scopeimagediv").style.display = "block";
document.getElementById("ScopedeleteIcondiv").style.display = "block";
}
var BatteryloadFile = function(event) {
var image = document.getElementById('Batteryoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Batteryimagediv").style.display = "block";
document.getElementById("BatterydeleteIcondiv").style.display = "block";
}
var PoleloadFile = function(event) {
var image = document.getElementById('Poleoutput');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("Poleimagediv").style.display = "block";
document.getElementById("PoledeleteIcondiv").style.display = "block";
}

var loadFile = function(event) {
var image = document.getElementById('output');
image.src = URL.createObjectURL(event.target.files[0]);
document.getElementById("imagediv").style.display = "block";
document.getElementById("deleteIcondiv").style.display = "block";
}

function  deleteImage(){
document. getElementById('output'). value = null;
document.getElementById("imagediv").style.display = "none";
document.getElementById("deleteIcondiv").style.display = "none";
document.getElementById("Descritionimagediv").style.display = "none";
document.getElementById("DescritiondeleteIcondiv").style.display = "none";
document.getElementById("TextdeleteIcondiv").style.display = "none";
document.getElementById("Textimagediv").style.display = "none";
document.getElementById("WisdeleteIcondiv").style.display = "none";
document.getElementById("Wisimagediv").style.display = "none";
document.getElementById("TipsdeleteIcondiv").style.display = "none";
document.getElementById("Tipsimagediv").style.display = "none";
document.getElementById("CustomerdeleteIcondiv").style.display = "none";
document.getElementById("Customerimagediv").style.display = "none";
document.getElementById("VoltagedeleteIcondiv").style.display = "none";
document.getElementById("Voltageimagediv").style.display = "none";
document.getElementById("VoltageMeasuredeleteIcondiv").style.display = "none";
document.getElementById("VoltageMeasureimagediv").style.display = "none";

document.getElementById("ResistancedeleteIcondiv").style.display = "none";
document.getElementById("Resistanceimagediv").style.display = "none";

document.getElementById("CurrentdeleteIcondiv").style.display = "none";
document.getElementById("Currentimagediv").style.display = "none";
document.getElementById("ScopedeleteIcondiv").style.display = "none";
document.getElementById("Scopeimagediv").style.display = "none";

document.getElementById("BatterydeleteIcondiv").style.display = "none";
document.getElementById("Batteryimagediv").style.display = "none";

document.getElementById("PoledeleteIcondiv").style.display = "none";
document.getElementById("Poleimagediv").style.display = "none";
}

        $(function() {
            $("body").off("click", ".mdl-numberspinner").on("click", ".mdl-numberspinner", function(event) {
                var $this = $(this);
                var input = $this.parent().find("input");
                var value = (input.val() ? parseInt(input.val()) : 0);
                if ($this.hasClass("mdl-numberspinner__add")) {
                    input.val(value + 1);
                } else {
                    input.val(value - 1);
                }
                input.trigger("input").parent().addClass("is-dirty");
            });
        });;
    </script>

    <script type="text/javascript">

    function copy_diag()
    {
        var diagnosis_id = $('#diagnosis_id').val();
        $.post('/diagnosis/copy_diagnosis', {
                '_token': '<?php echo e(csrf_token()); ?>',
                'diagnosis_id': diagnosis_id
            }, function(success) {
                console.log(success);
                if(success.redirect){
                    //$('#quality_control_id').val(success.id);
                    var dialog = $('modal__confirm');
		           dialog.show();
                    window.location.href = '/diagnosis/edit/' + success.id
                    
                }
            });
    }
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
</main>

<!--***** PHOTOSWIPE Index *****-->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut">
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

            <div class="pswp__caption pswp__caption--fake">
                <div class="pswp__caption__center">08/19/2020 08:21:28 AM</div>

                <a onclick="deleteMedia(373532, 'VNC logo.png');" style="cursor:pointer;float:right;color:#CCCCCC;"><i class="file_delete material-icons" data-id="373532">delete</i></a>
                <a href="/file/download/373532" style="cursor:pointer;float:right;color:#CCCCCC;"><i class="material-icons">file_download</i></a>


            </div>

        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Diagnosis/EditPanels.blade.php ENDPATH**/ ?>