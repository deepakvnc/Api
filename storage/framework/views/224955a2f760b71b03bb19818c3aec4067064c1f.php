<?php $__env->startSection('content'); ?>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row primary">
        <a id="backbutton" href="/" class="mdl-navigation__link spf-link" style="display: inline;"><i class="material-icons">arrow_back</i></a> <span class="mdl-layout-title"><img class="hidemobile" src="<?php echo e(URL::asset('assets/img/logo.png')); ?>">
            <span id="page-title">Questions</span>
        </span>
        <div class="mdl-layout-spacer"></div>
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header>
<main class="mdl-layout__content allow-scroll">
    <div class="page-content">
        <div class="mdl-viewpager">
            <div class="box">
                <div class="box-header" data-original-title>
                    <h2></h2>
                    <div class="box-icon">
                    </div>
                </div>
                <div class="box-content">




                    <div class="ui-jqgrid ui-widget ui-widget-content ui-corner-all" id="gbox_question_overview" dir="ltr" style="width: 100%;">
                        <div class="ui-widget-overlay jqgrid-overlay" id="lui_question_overview"></div>
                        <div class="loading ui-state-default ui-state-active" id="load_question_overview" style="display: none;">
                            <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active is-upgraded" data-upgraded=",MaterialSpinner">
                                <div class="mdl-spinner__layer mdl-spinner__layer-1">
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__gap-patch">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                </div>
                                <div class="mdl-spinner__layer mdl-spinner__layer-2">
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__gap-patch">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                </div>
                                <div class="mdl-spinner__layer mdl-spinner__layer-3">
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__gap-patch">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                </div>
                                <div class="mdl-spinner__layer mdl-spinner__layer-4">
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__left">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__gap-patch">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                    <div class="mdl-spinner__circle-clipper mdl-spinner__right">
                                        <div class="mdl-spinner__circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-jqgrid-view" id="gview_question_overview" style="width: 100%;">
                            <div class="ui-jqgrid-titlebar ui-jqgrid-caption ui-widget-header ui-corner-top ui-helper-clearfix" style="display: none;"><a role="link" class="ui-jqgrid-titlebar-close ui-corner-all HeaderButton" style="right: 0px;"><span class="ui-icon ui-icon-circle-triangle-n"></span></a><span class="ui-jqgrid-title"></span></div>
                            <div class="ui-state-default ui-jqgrid-hdiv" style="width: 100%;">
                                <div class="ui-jqgrid-hbox">
                                    <table class="ui-jqgrid-htable" style="width: 100%;" role="grid" aria-labelledby="gbox_question_overview" cellspacing="0" cellpadding="0" border="0">
                                        <thead>
                                            <tr class="ui-jqgrid-labels" role="rowheader">
                                                <th id="question_overview_id" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 150px; display: none;"><span class="ui-jqgrid-resize ui-jqgrid-resize-ltr" style="cursor: col-resize;">&nbsp;</span>
                                                    <div id="jqgh_question_overview_id" class="ui-jqgrid-sortable">id<span class="s-ico" style=""><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_question" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 287px;">
                                                    <div id="jqgh_question_overview_question" class="ui-jqgrid-sortable">Question<span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_type_1_enabled" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 144px;">
                                                    <div id="jqgh_question_overview_type_1_enabled" class="ui-jqgrid-sortable">Maintenance / Repair<br>enabled<span id="type_1_enabled" style="margin-left: 10px; color: red;">11/12</span><span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_type_1_required" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 144px;">
                                                    <div id="jqgh_question_overview_type_1_required" class="ui-jqgrid-sortable">Maintenance / Repair<br>required<span id="type_1_required" style="margin-left: 10px; color: rgb(59, 142, 59);">4/4</span><span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_type_2_enabled" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 144px;">
                                                    <div id="jqgh_question_overview_type_2_enabled" class="ui-jqgrid-sortable">Warranty / Diagnosis<br>enabled<span id="type_2_enabled" style="margin-left: 10px; color: red;">4/12</span><span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_type_2_required" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 144px;">
                                                    <div id="jqgh_question_overview_type_2_required" class="ui-jqgrid-sortable">Warranty / Diagnosis<br>required<span id="type_2_required" style="margin-left: 10px; color: rgb(59, 142, 59);">4/4</span><span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_type_3_enabled" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 144px;">
                                                    <div id="jqgh_question_overview_type_3_enabled" class="ui-jqgrid-sortable">Delivery<br>enabled<span id="type_3_enabled" style="margin-left: 10px; color: rgb(59, 142, 59);">22/12</span><span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_type_3_required" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 142px;">
                                                    <div id="jqgh_question_overview_type_3_required" class="ui-jqgrid-sortable">Delivery<br>required<span id="type_3_required" style="margin-left: 10px; color: rgb(59, 142, 59);">4/4</span><span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                                <th id="question_overview_buttons" role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="width: 100px;">
                                                    <div id="jqgh_question_overview_buttons" class="ui-jqgrid-sortable">&nbsp;<span class="s-ico" style="display:none"><span sort="asc" class="ui-grid-ico-sort ui-icon-asc ui-state-disabled ui-icon ui-icon-triangle-1-n ui-sort-ltr"></span><span sort="desc" class="ui-grid-ico-sort ui-icon-desc ui-state-disabled ui-icon ui-icon-triangle-1-s ui-sort-ltr"></span></span></div>
                                                </th>
                                            </tr>
                                            <tr class="ui-search-toolbar" role="rowheader">
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr" style="display: none;">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;">
                                                        <table class="ui-search-table" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="ui-search-oper" colindex="0" style="display: none;"></td>
                                                                    <td class="ui-search-input"><input type="text" style="width:100%;padding:0px;" name="id" id="gs_id" value=""></td>
                                                                    <td class="ui-search-clear" style="display: none;"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                                <th role="columnheader" class="ui-state-default ui-th-column ui-th-ltr">
                                                    <div style="position:relative;height:100%;padding-right:0.3em;padding-left:0.3em;"></div>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="ui-jqgrid-bdiv" style="height: 100%; width: 100%;">
                                <div style="position:relative;">
                                    <div></div>
                                    <table id="question_overview" tabindex="0" cellspacing="0" cellpadding="0" border="0" role="grid" aria-multiselectable="false" aria-labelledby="gbox_question_overview" class="ui-jqgrid-btable" style="width: 100%;">
                                        <tbody>
                                            <tr class="jqgfirstrow" role="row" style="height:auto">
                                                <td role="gridcell" style="height:0px;width:150px;display:none;"></td>
                                                <td role="gridcell" style="height: 0px; width: 287px;"></td>
                                                <td role="gridcell" style="height: 0px; width: 144px;"></td>
                                                <td role="gridcell" style="height: 0px; width: 144px;"></td>
                                                <td role="gridcell" style="height: 0px; width: 144px;"></td>
                                                <td role="gridcell" style="height: 0px; width: 144px;"></td>
                                                <td role="gridcell" style="height: 0px; width: 144px;"></td>
                                                <td role="gridcell" style="height: 0px; width: 142px;"></td>
                                                <td role="gridcell" style="height:0px;width:100px;"></td>
                                            </tr>
                                            <?php 
                                            $enable_check1 = "";
                                            $enable_check2 = "";
                                            $enable_check3 = "";
                                            $required_check1 = "";
                                            $required_check2 = "";
                                            $required_check3 = "";
                                        ?>
                                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php 
                                        
                                        foreach ($enabled as $value) {
                                            if($value->user_id == Auth::user()->id && $value->question_id == $question->id && $value->type_id == 1){
                                                $enable_check1 = 'check';
                                            }
                                            if($value->user_id == Auth::user()->id && $value->question_id == $question->id && $value->type_id == 2){
                                                $enable_check2 = 'check';
                                            }
                                            if($value->user_id == Auth::user()->id && $value->question_id == $question->id && $value->type_id == 3){
                                                $enable_check3 = 'check';
                                            }
                                        }
                                        foreach ($required as $value) {
                                            if($value->user_id == Auth::user()->id && $value->question_id == $question->id && $value->type_id == 1){
                                                $required_check1 = 'check';
                                            }
                                            if($value->user_id == Auth::user()->id && $value->question_id == $question->id && $value->type_id == 2){
                                                $required_check2 = 'check';
                                            }
                                            if($value->user_id == Auth::user()->id && $value->question_id == $question->id && $value->type_id == 3){
                                                $required_check3 = 'check';
                                            }
                                        }
                                        
                                        // echo 
                                        //     $enable_check1 . "<br>";
                                        //     $enable_check2 . "<br>";
                                        //     $enable_check3 . "<br>";
                                        //     $required_check1 . "<br>";
                                        //     $required_check2 . "<br>";
                                        //     $required_check3 . "<br>";
                                        ?>
                                          <tr role="row" id="1" tabindex="0" class="ui-widget-content jqgrow ui-row-ltr ui-state-highlight" aria-selected="true">
                                            <td role="gridcell" style="display:none;" class="" title="1" aria-describedby="question_overview_id"><?php echo e($loop->iteration); ?></td>
                                            <td role="gridcell" style="" class="nowrap" title="Repair report complete and initialed (mechanic)" aria-describedby="question_overview_question"><?php echo e($question->en_question); ?></td>

                                            <td role="gridcell" style="" class="" title="" aria-describedby="question_overview_type_1_enabled">
                                                <i class="material-icons type_2_required_boolean" style="color:#3b8e3b;font-weight:bold;">
                                                
                                                <?php 
                                                     foreach ($enabled as $value) {
                                                           if($value->question_id == $question->id && $value->type_id == 1){
                                                                echo 'check';
                                                            }
                                                        }
                                                    ?>
                                                
                                                </i></td>
                                           
                                           
                                                <td role="gridcell" style="" class="" title="" aria-describedby="question_overview_type_1_required">
                                                <i class="material-icons type_2_required_boolean" style="color:#3b8e3b;font-weight:bold;">
                                                    <?php 
                                                    foreach ($required as $value) {
                                                          if($value->question_id == $question->id && $value->type_id == 1){
                                                               echo 'check';
                                                           }
                                                       }
                                                   ?>
                                                </i></td>


                                            <td role="gridcell" style="" class="" title="" aria-describedby="question_overview_type_2_enabled">
                                                <i class="material-icons type_2_required_boolean" style="color:#3b8e3b;font-weight:bold;">
                                                
                                                    <?php 
                                                    foreach ($enabled as $value) {
                                                          if($value->question_id == $question->id && $value->type_id == 2){
                                                               echo 'check';
                                                           }
                                                       }
                                                   ?>
                                                </i></td>
                                            <td role="gridcell" style="" class="" title="check" aria-describedby="question_overview_type_2_required">
                                                <i class="material-icons type_2_required_boolean" style="color:#3b8e3b;font-weight:bold;">
                                                
                                                    <?php 
                                                    foreach ($required as $value) {
                                                          if($value->question_id == $question->id && $value->type_id == 2){
                                                               echo 'check';
                                                           }
                                                       }
                                                   ?>
                                                </i></td>

                                            <td role="gridcell" style="" class="" title="" aria-describedby="question_overview_type_3_enabled">
                                                <i class="material-icons type_2_required_boolean" style="color:#3b8e3b;font-weight:bold;">
                                                
                                                    <?php 
                                                    foreach ($enabled as $value) {
                                                          if($value->question_id == $question->id && $value->type_id == 3){
                                                               echo 'check';
                                                           }
                                                       }
                                                   ?>
                                                   </i></td>
                                            <td role="gridcell" style="" class="" title="" aria-describedby="question_overview_type_3_required">
                                                <i class="material-icons type_2_required_boolean" style="color:#3b8e3b;font-weight:bold;">
                                                
                                                    <?php 
                                                    foreach ($required as $value) {
                                                          if($value->question_id == $question->id && $value->type_id == 3){
                                                               echo 'check';
                                                           }
                                                       }
                                                   ?>
                                                </i></td>
                                            <td></td>
                                        </tr>
                                              
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="ui-jqgrid-resize-mark" id="rs_mquestion_overview">&nbsp;</div>
                        <div id="question_overview_pager" class="ui-state-default ui-jqgrid-pager ui-corner-bottom" dir="ltr" style="width: 100%;">
                            <div id="pg_question_overview_pager" class="ui-pager-control" role="group">
                                <table cellspacing="0" cellpadding="0" border="0" class="ui-pg-table" style="width:100%;table-layout:fixed;height:100%;" role="row">
                                    <tbody>
                                        <tr>
                                            <td id="question_overview_pager_left" align="left" class="pager_text_container">
                                                <div dir="ltr" style="text-align: left;" class="ui-paging-info">Showing 1 to 53 of 53 entries</div>
                                            </td>
                                            <td id="question_overview_pager_center" align="right" style="white-space: pre; width: 80%;" class="pager_button_container">
                                                <table cellspacing="0" cellpadding="0" border="0" style="table-layout:auto;" class="ui-pg-table">
                                                    <tbody>
                                                        <tr>
                                                            <td id="first_question_overview_pager" class="ui-pg-button ui-corner-all ui-state-disabled disabled"><span class="ui-icon ui-icon-seek-first"><i class="material-icons">first_page</i></span></td>
                                                            <td id="prev_question_overview_pager" class="ui-pg-button ui-corner-all ui-state-disabled disabled"><span class="ui-icon ui-icon-seek-prev"><i class="material-icons">chevron_left</i></span></td><span class="myPager"></span><span class="myPager">
                                                                <td class="active"><a href="#">1</a></td>
                                                            </span>
                                                            <td id="next_question_overview_pager" class="ui-pg-button ui-corner-all ui-state-disabled disabled"><span class="ui-icon ui-icon-seek-next"><i class="material-icons">chevron_right</i></span></td>
                                                            <td id="last_question_overview_pager" class="ui-pg-button ui-corner-all ui-state-disabled disabled"><span class="ui-icon ui-icon-seek-end"><i class="material-icons">last_page</i></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            <a href="<?php echo e(url('/question/add')); ?>" id="add_question" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--fab fixed-action-btn"><i class="material-icons">add</i></a>
            <button onclick="javascript:location.href='<?php echo e(url('/question/edit')); ?>'" id="edit_questions" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--fab fixed-action-btn"><i class="material-icons">edit</i></button>
            <style>
                #question_overview>tbody>tr {
                    cursor: default !important;
                }

                #question_overview .mdl-checkbox.is-checked .mdl-checkbox__box-outline {
                    border-color: #3b8e3b;
                }

                #question_overview .mdl-checkbox.is-checked .mdl-checkbox__tick-outline {
                    background-color: #3b8e3b;
                }

                #edit_questions {
                    right: 100px;
                }

                #edit_questions.cancel {
                    background-color: red;
                }

                #save_questions {
                    right: 175px;
                    background-color: #3b8e3b;
                }
            </style>
        </div>
    </div>
</main>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\16thsept\resources\views/question/overview.blade.php ENDPATH**/ ?>