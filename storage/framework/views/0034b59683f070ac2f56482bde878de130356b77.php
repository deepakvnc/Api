<div class="mdl-layout__tab-panel <?php if (isset($_GET['tab']) && $_GET['tab'] === 'quality_control') {
    echo 'is-active';
} elseif (!isset($_GET['tab'])) {
    echo 'is-active';
} ?>" id="quality_control_panel">

    <div class="box">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <table id="quality_control_overview" class="datatable stripe">
                <thead>
                    <tr>
                    <th style="width:25px !important;"><i class="material-icons">filter_list</i></th>
                        <th data-priority="1">WO/No</th>
                        <th>Mechanic</th>
                        <th>Inspector</th>
                        <th class="hidemobile">License Plate</th>
                        <th class="hidemobile">Creation Date</th>
                        <th class="hidemobile">On hand</th>
                        <th class="text-center disable_sorting" data-priority="2"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td></td>
                        <th data-priority="1">WO/No</th>
                        <th>Mechanic</th>
                        <th>Inspector</th>
                        <th class="hidemobile">License Plate</th>
                        <th class="hidemobile">Creation Date</th>
                        <th class="hidemobile">On hand</th>
                        <th style="display:none;" class="text-center" data-priority="2"></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $quality_control; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        $mydate = strtotime($item->creationdate);
                        $newformat = date('d-m-Y',$mydate);
                        $onclick= "window.location='".url('/quality_control/edit', $item->id)."'";
                         if($item->on_hand!="")
                         {
                        $onhanddate = strtotime($item->on_hand);
                        $handformat = date('d-m-Y',$onhanddate);
                        $onclick_hand= "window.location='".url('/quality_control/edit', $item->id)."'";
                         }
                         else
                         {
                            $onhanddate="";
                            $handformat="";
                            $onclick_hand="";


                         }
                        $query_inspector=DB::select('select first_name,surname from mdiag.mdiag_users where id='.$item->inspector);
                            if(count($query_inspector)>0)
                            $inspector =  $query_inspector[0]->first_name." ".$query_inspector[0]->surname;
                            else
                                $inspector="";
                        
                        $query_employee=DB::select('select first_name,surname from mdiag.mdiag_users where id='.$item->employee);
                        if(count($query_employee)>0)
                        $employee =  $query_employee[0]->first_name." ".$query_employee[0]->surname;
                        else
                            $employee="";
                        
                        ?>
                  
                  <tr>
                      <?php
                    if ($item->completed == null && $item->questions!="")
                    {
                      
                    ?>
                        <td class="table-warning"><span class="colorcode">0</span></td>   
                    <?php     
                    }                                
                    else if (($item->license_plate == "") && ($item->inspector=="") && ($item->employee=="") && ($item->wo_number!=""))
                    {
                        
                        ?>
                        <td class="table-new"><span class="colorcode">0</span></td>
                    <?php
                    }
                    
                    else if ($item->license_plate != "" && $item->inspector !="" && $item->employee !="" && $item->questions !="")
                       {
                           ?>
                    <td class="table-success"><span class="colorcode">1</span></td>
                    <?php
                       }
                    
                       else
                       {
                       ?>
                        <td class="table-new"><span class="colorcode">1</span></td>
                        <?php
                       }
                    ?>
                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'">
                                <?php echo e($item->wo_number); ?></td>
                            <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'"><?php echo $employee?>

                                </td>
                                <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'"><?php echo $inspector?>
                                    </td>
                                <td onclick="window.location='<?php echo e(url('/quality_control/edit', $item->id)); ?>'"
                                class="hidemobile"><?php echo e($item->license_plate); ?></td>
                        <?php echo '  <td class="hidemobile" data-sort="'. $mydate .'" onclick="'.$onclick.'">'.$newformat .'</td>';?>
                        <?php echo '  <td class="hidemobile" data-sort="'. $onhanddate .'" onclick="'.$onclick_hand.'">'.$handformat .'</td>';?>   
                
                            <td class="text-center" style="float:right">
                                <i class="material-icons" style="font-size: 24px; color: red;cursor:pointer"
                                onclick="delete_quality('<?php echo e($item->id); ?>')">delete_forever</i>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="quality_control_overview_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>
    </div>
    <a href="#modal-qualitycontrol"
        class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--fab fixed-action-btn">
        <i class="material-icons">add</i>
    </a>
    <div id="modal-qualitycontrol" class="modal-window">
        <div class="modal-content" style="width:400px">
            <h1>Add Quality Control</h1>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <a style="padding:0;"
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored spf-link fullwidth"
                        href="<?php echo e(url('/quality_control/new/1')); ?>">Maintenance / Repair</a> </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <a style="padding:0;"
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored spf-link fullwidth"
                        href="<?php echo e(url('/quality_control/new/2')); ?>">Warranty / Diagnosis</a> </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <a style="padding:0;"
                        class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored spf-link fullwidth"
                        href="<?php echo e(url('/quality_control/new/3')); ?>">Delivery</a> </div>
            </div>
            <div class="modal-footer">
                <a href="#" style="float:right" class="mdl-button mdl-js-button mdl-js-ripple-effect cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
<dialog id="modal__confirm" class="mdl-dialog">
    <h4 class="mdl-dialog__title">{title}</h4>
    <div class="mdl-dialog__content"></div>
    <div class="mdl-dialog__actions"></div>
    <div class="mdl-dialog__loading">
        <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
    </div>
</dialog>
<script>
    function delete_quality(id) {

        system.confirm('Delete File', 'Are you sure you want to delete this file?',
            function() {
                //alert(id);
                location.href = 'quality_control/delete/' + id;
            }
        )
    }

</script>
<?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Sasikala\latest_code\Latest_code\resources\views/inc/QualityControl/quality_control.blade.php ENDPATH**/ ?>