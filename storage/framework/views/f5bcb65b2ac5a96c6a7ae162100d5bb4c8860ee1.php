<div class="mdl-layout__tab-panel" id="media_panel">
    <div class="box box-border">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  fullwidth  form-group" readonly="readonly">
                <input readonly="readonly" type="text" name="total_file_size" value="0 B" id="total_file_size" class="mdl-textfield__input" />
                <label class="mdl-textfield__label" for="total_file_size">Total file size</label>
            </div>
            <a title="Download" href="/json/file/downloadall/diagnosis/70734" onclick="downloadzip(event, this.getAttribute(&#039;href&#039;))" id="download_zip" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn spf-link" style="bottom: 100px; display: none;padding:0;" target="_blank">
                <i class="material-icons">file_download</i>
                <label>Download zip</label>
            </a>
            
            <!-- Start of DEMO Gallery -->
            <!-- <div class="pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery">
              
                <div class="pictureswipe_box">
                    <div class="pictureswipe_boxInner">
                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://mbdiag.cloud.ecom.nl/Application/Images/mb-emblem.jpg" itemprop="contentUrl" data-size="964x1024">
                                <img class="pictureswipe_thumbnail" src="https://mbdiag.cloud.ecom.nl/Application/Images/mb-emblem.jpg" itemprop="thumbnail" alt="Image description" />
                            </a>
                            <div class="info-container"><i class="material-icons field-gallery-icon">delete_forever</i>Error code</div>
                        </figure>
                    </div>
                </div>
                <div class="pictureswipe_box">
                    <div class="pictureswipe_boxInner">
                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://mbdiag.cloud.ecom.nl/Application/Images/mb-emblem.jpg" itemprop="contentUrl" data-size="964x1024">
                                <img class="pictureswipe_thumbnail" src="https://mbdiag.cloud.ecom.nl/Application/Images/mb-emblem.jpg" itemprop="thumbnail" alt="Image description" />
                            </a>
                            <div class="info-container"><i class="material-icons field-gallery-icon">delete_forever</i>Error code</div>
                        </figure>
                    </div>
                </div>
                <div class="pictureswipe_box">
                    <div class="pictureswipe_boxInner">
                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://mbdiag.cloud.ecom.nl/Application/Images/mb-emblem.jpg" itemprop="contentUrl" data-size="964x1024">
                                <img class="pictureswipe_thumbnail" src="https://mbdiag.cloud.ecom.nl/Application/Images/mb-emblem.jpg" itemprop="thumbnail" alt="Image description" />
                            </a>
                            <div class="info-container"><i class="material-icons field-gallery-icon">delete_forever</i>Error code</div>
                        </figure>
                    </div>
                </div>
            </div> 
           <!-- End of DEMO Gallery -->

        

    </div>

    <div class="preview-images-zone pictureswipe_wrap tab_media" itemscope itemtype="http://schema.org/ImageGallery"> </div>
        </div>
    <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>
    <button id="add-media" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored fixed-action-btn " onclick="$('#pro-image').click()">
        <i class="material-icons">photo_camera</i>
        <label>Add media</label>
    </button>


    <style>
        .preview-images-zone {
            width: 100%;
            height: auto;
            padding: 5px 5px 0px 5px;
            position: relative;
        }

        .preview-images-zone>.preview-image {
            width: 210px;
            position: relative;
            margin-right: 1%;
            float: left;
            margin-bottom: 5px;
        }

        .preview-images-zone>.preview-btn>p {
            width: 180px;
        }

        .preview-images-zone>.preview-image>.image-zone {}

        .preview-images-zone>.preview-image>.image-zone>img {
            height: 200px;
            width: 200px;
            margin-right: 5px;
            margin-right: 5px;
        }

        .preview-images-zone>.preview-image>.tools-edit-image {
            position: absolute;
            z-index: 100;
            color: #fff;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            display: none;
        }

        .preview-images-zone>.preview-image>.image-cancel {
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: bold;
            margin-right: 10px;
            cursor: pointer;
            display: none;
            z-index: 100;
        }

        .preview-image:hover>.image-zone {
            cursor: pointer;
        }

        .image-delete {
            display: flex;
            cursor: pointer;
        }

        .ui-sortable-helper {
            width: 90px !important;
            height: 90px !important;
        }

        .container {
            padding-top: 50px;
        }

        .pictureswipe_thumbnail {
            width:  200px;
            height: 200px;
        }

        .pictureswipe_box {
            cursor: pointer;
            float: left;
            position: relative;
            width: calc(15% - 20px);
            margin: 4px 25px 45px 10px !important;
            padding-bottom: calc(15% - 20px);
        }

        .pictureswipe_wrap {
            overflow: unset !important;
        }

        .pswp img {
            max-width: none !important;
            object-fit: contain !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            document.getElementById('pro-image').addEventListener('change', mediaImage, false);

            $(".preview-images-zone").sortable();

            $(document).on('click', '.image-cancel', function() {
                let no = $(this).data('no');
                $(".preview-image.preview-show-" + no).remove();
            });
        });
        var num = 0;
        var media_images = [];
        var img_names = [];

        function mediaImage() {
            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");
                for (let i = 0; i < files.length; i++) {
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
                            '<div class="pictureswipe_box preview-image preview-show-' + num + '">' +
                            '<div class="pictureswipe_boxInner">' +
                            '<figure class="image-zone" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">' +
                            ' <a href="' + picFile.result + '" itemprop="contentUrl" data-size="1024x720">' +
                            '<img class="pictureswipe_thumbnail" src="' + picFile.result + '" itemprop="thumbnail" alt="Image description" />' +
                            '</a>' +
                            '<p>' + img_names[num] + '</p>' +
                            '</figure>' +
                            '</div>' +
                            '</div>';
                        output.append(html);
                        num = num + 1;
                    });
                    picReader.readAsDataURL(file);
                }
                console.log('img_names', img_names)
                console.log('media_images', media_images)
                $("#pro-image").val('');
            } else {
                console.log('Browser not support');
            }
        }
    </script>

</div>
<?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/Diagnosis/EditTabs/Media.blade.php ENDPATH**/ ?>