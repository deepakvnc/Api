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
                        <th style="width: 25px !important;"></th>
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
                        <th></th>
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

                    <tr>
                        <?php if($item->completed == null): ?>
                        <td class="table-warning"></td>                                        
                    <?php else: ?>
                        <td class="table-success"></td>
                    <?php endif; ?>
                        <td><?php echo e($item->wo_number); ?></td>
                        <td><?php echo e($item->inspector_first_name); ?> <?php echo e($item->inspector_surname_prefix); ?> <?php echo e($item->inspector_surname); ?></td>
                        <td><?php echo e($item->employee_first_name); ?> <?php echo e($item->employee_surname_prefix); ?> <?php echo e($item->employee_surname); ?></td>
                        <td class="hidemobile"><?php echo e($item->license_plate); ?></td>
                        <td class="hidemobile"><?php echo date('d/m/Y', strtotime($item->creationdate))?></td>
                        <td class="hidemobile"><?php echo date('d/m/Y H:i:s', strtotime($item->on_hand))?></td>
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
<?php /**PATH C:\xampp\htdocs\VNC\test\Mbdiag_demo\Mbdiag_demo_v4_bal\resources\views/inc/QualityControl/history.blade.php ENDPATH**/ ?>