<div class="mdl-layout__tab-panel  <?php if(isset($_GET['tab']) && $_GET['tab'] === 'quality_control_history') echo 'is-active'?>" id="quality_control_history_panel">

    <div class="box">
        <div class="box-header" data-original-title>
            <div class="box-icon">
            </div>
        </div>
        <div class="box-content">
            <table id="quality_control_overview_history" class="datatable2 stripe">
                <thead>
                    <tr>
                    <th style="width:25px !important;"><i class="material-icons">filter_list</i></th>
                        <th data-priority="1">WO/No</th>
                        <th>Mechanic</th>
                        <th>Inspector</th>
                        <th class="hidemobile">License Plate</th>
                        <th class="hidemobile">Creation Date</th>
                        <th class="hidemobile">On hand</th>
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
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $quality_control; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $mydate = strtotime($item->creationdate);
                        $newformat = date('d-m-Y',$mydate);
                        $onclick= "window.location='".url('/quality_control/edit', $item->id)."'";

                        $onhanddate = strtotime($item->on_hand);
                        $handformat = date('d-m-Y',$onhanddate);
                        $onclick_hand= "window.location='".url('/quality_control/edit', $item->id)."'";


                    foreach ($users as $user) {
                    if ($item->inspector = $user->id) {
                    $inspector = $user->first_name . ' ' . $user->surname_prefix . ' ' . $user->surname;
                    } else {
                    $inspector = '';
                    }
                    if ($item->employee = $user->id) {
                    $employee = $user->first_name . ' ' . $user->surname_prefix . ' ' . $user->surname;
                    }
                    else{
                        $employee = '';
                    }
                    } ?>
                    <tr>
                        <?php if($item->completed == null): ?>
                        <td class="table-warning"><span class="colorcode">0</span></td>                                        
                    <?php else: ?>
                        <td class="table-success"><span class="colorcode">1</span></td>
                    <?php endif; ?>
                        <td><?php echo e($item->wo_number); ?></td>
                        <td><?php echo e($inspector); ?></td>
                        <td><?php echo e($employee); ?></td>
                        <td class="hidemobile"><?php echo e($item->license_plate); ?></td>
                        <?php echo '  <td class="hidemobile" data-sort="'. $mydate .'" onclick="'.$onclick.'">'.$newformat .'</td>';?>
                        <?php echo '  <td class="hidemobile" data-sort="'. $onhanddate .'" onclick="'.$onclick_hand.'">'.$handformat .'</td>';?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div id="quality_control_overview_history_pager"></div>
            <div class="spacer spacer-height-60"></div>
        </div>
    </div>
</div>

<dialog id="modal__confirm" class="mdl-dialog">
    <h4 class="mdl-dialog__title">{title}</h4>
    <div class="mdl-dialog__content"></div>
    <div class="mdl-dialog__actions"></div>
    <div class="mdl-dialog__loading"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div></div>
</dialog>
<script>
function delete_quality(id) {
           
            system.confirm('Delete File', 'Are you sure you want to delete this file?',
                function() {
                //alert(id);
                location.href = 'quality_control/delete/'+id;
            }
            )
        }

</script>
<?php /**PATH D:\12thsept\resources\views/inc/QualityControl/history.blade.php ENDPATH**/ ?>